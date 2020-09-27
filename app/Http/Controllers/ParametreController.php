<?php

namespace App\Http\Controllers;

use App\Avance;
use App\Employer;
use App\Parametre;
use App\Presence;
use App\Societe;
use Illuminate\Support\Facades\DB;
use App\BulletinPaie;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ParametreController extends Controller
{
    public function index()
    {
        ### get avance presence employer onlyTrashed (qui ont supprimer) ###
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $devise = DB::table('societes')->where('user_id', Auth::user()->id)->value('devise');
        $employers = Employer::onlyTrashed()
            ->where('societe_id', $idsociete)
            ->get();
        $employersTab = [];
        $employersTabNottrashed = [];
        $employersNotTrashedEmployer = DB::table('employers')
            ->where('societe_id', $idsociete)
            ->get();
        foreach ($employersNotTrashedEmployer as $employer) {
            $employersTabNottrashed[$employer->id] = $employer->id;
        }
        foreach ($employers as $employer) {
            $employersTab[$employer->id] = $employer->id;
        }
        $presence = Presence::onlyTrashed()
            ->whereIn('employer_id', $employersTab)
            ->get();
        // just les employer du meme entreprise
        $avances = [];

        $avances = Avance::onlyTrashed()
            ->whereIn('employer_id', $employersTabNottrashed)
            ->get();
        $bullpaie = BulletinPaie::onlyTrashed()
            ->where('id_societe', $idsociete)->get();
        foreach ($bullpaie as $apieB) {
            $apieB->setAttribute('employer', Employer::find($apieB->employer_id));
        }
        return view('para.index')->with([
            'employers' => $employers,
            'devise' => $devise,
            'presence' => $presence,
            'avances' => $avances,
            'bulletinPaie' => $bullpaie,
        ]);
    }

    public function restoref($id)
    {
        $employer = Employer::onlyTrashed()
            ->where('id', $id)
            ->first();
        $employer->restore();
        session()->flash('success', "l'employer est ajouter avec succes");
        toast(session('success'), 'success');
        return redirect(route('para.index'));
    }

    public function restorePaie($id)
    {
        $paie = BulletinPaie::onlyTrashed()
            ->where('id', $id)
            ->first();
        $paie->restore();
        session()->flash('success', "l'paie est ajouter avec succes");
        toast(session('success'), 'success');
        return redirect(route('para.index'));
    }

    public function forceDeltePaie($id)
    {
        $paie = BulletinPaie::onlyTrashed()
            ->where('id', $id)
            ->first();
        $paie->forceDelete();
        session()->flash('success', "l'paie est supprimer avec succes");
        toast(session('success'), 'success');
        return redirect(route('para.index'));
    }

    public function paieParamettre()
    {
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $societe = Societe::find($idsociete);
//        Parametre::where('')
        $parametre = $societe->parametre;
        return view('para.paie.index', compact('idsociete', 'parametre'));
    }

    public function storeParametre(Request $request)
    {
        try {
            DB::beginTransaction();
            $societe = Societe::find($request->id_societe);
            $parametre = $societe->parametre;
            $parametre->update([
                'tauxCnss' => $request->tauxCnss,
                'tauxAmo' => $request->tauxAmo,
                'chargeFamille' => $request->chargeFamille,
                'societe_id' => $request->id_societe,
            ]);
            DB::commit();
            session()->flash('success', "Modification faite avec succée");
            toast(session('success'), 'success');
            return redirect()->route('para-paie.index');
        } catch (\Exception $ex) {
            DB::rollBack();
            return $ex;
        }

    }
}
