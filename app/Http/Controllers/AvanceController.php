<?php

namespace App\Http\Controllers;

use App\Avance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Services\AvanceService;
use App\Http\Requests\AvanceRequest;
use App\Employer;

class AvanceController extends Controller
{

    public function index()
    {
        // $post->created_at->diffForHumans()
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $devise = DB::table('societes')->where('user_id', Auth::user()->id)->value('devise');
        ## get les employers non  supprimer (parce que j'ai fait soft delete)
        $employers = Employer::withoutTrashed()->where('societe_id', $idsociete)->get();
        $avances = [];
        foreach ($employers as $employer) {
            $avances[$employer->id] = Avance::withoutTrashed()
                ->where('employer_id', $employer->id)
                ->whereYear('created_at', date('yy'))
                ->whereMonth('created_at', date('m'))->get();
        }

        return view('avance.index')
            ->with('employers', $employers)
            ->with('devise', $devise)
            ->with('avances', $avances);
    }


    public function store(Request $request)
    {
        // creation de l'avance de mois courant si il n'esxiste pas

        $avance = Db::table('avances')->where('employer_id', $request->employer_id)
            ->whereYear('created_at', date('yy'))
            ->whereMonth('created_at', date('m'))->get();
        $employer = Employer::find($request->employer_id);
        if (count($avance) == 0) {
            $avance = new Avance();
            $avance->date_affectation = $request->date_affectation;
            $avance->montant = $request->montant;
            $avance->employer_id = $request->employer_id;
            $avance->save();
            return response()->json([
                'status' => true,
                'message' => 'Avance cree avec sucees'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Une Avance est deja cree ce mois pour l\'employer',
                'nom' => $employer->nom_employer,
                'prenom' => $employer->prenom,
            ]);
        }
    }

    ### historique des avance ##########
    public function show($id)
    {
        $employersall = Employer::all();
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $devise = DB::table('societes')->where('user_id', Auth::user()->id)->value('devise');
        $employers = [];
        foreach ($employersall as $employer) {
            if ($employer->deleted_at == null && $employer->societe_id == $idsociete && count($employer->avances) > 0) {
                array_push($employers, $employer);
            }
        }
        foreach ($employers as $employer) {
            $employer->setAttribute('avance', $employer->avances);
            $total = AvanceService::calculTotalAvane($employer->avances);
            $employer->setAttribute('total', $total);
        }
        // dd($employers);
        return view('avance.show')->with('employers', $employers)
            ->with('devise', $devise);
    }


    public function update(Request $request, $id)
    {
        $avance = Avance::find($request->id_avance);
        $avance->montant = $request->montant;
        $avance->date_affectation = $request->date_affectation;
        $avance->update();
        return response()->json([
            'status' => true,
            'message' => 'avance mis à jour avec succès',
            'montant' => $request->montant
        ]);
    }


    public function deleteAvance($id)
    {
        $avance = Avance::find($id);
        $avance->delete();
        session()->flash('success', "L'avance est supprimer avec succes");
        toast(session('success'), 'success');
        return redirect(route('avance.index'));
    }


    #### restore avance supprimer ##########
    public function restoreAvance($id)
    {
        $avance = Avance::onlyTrashed()
            ->where('id', $id)->first();
        $avance->restore();
        session()->flash('success', "L'avance est Ajouter avec succes");
        toast(session('success'), 'success');
        return redirect(route('para.index'));
    }
}
