<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Flash;
use App\DemandePaie;
use App\BulletinPaie;
use App\Employer;

class DemandePaieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        #### get  demandes paie of societe courant ##########
        $demandePaies = DemandePaie::where('societe_id', $idsociete)->get();
        $demandPaie = [];
        foreach ($demandePaies as $dpaie) {
            $buletinPaie = DB::table('bulletin_paies')->where('employer_id', $dpaie->employer_id)
                ->where('date_paie_debut', $dpaie->date_debut)
                ->where('date_paie_dfin', $dpaie->date_fin)->first();
            $employer = $dpaie->employer;
            $demandPaie[] = [$buletinPaie, $employer, $dpaie];
        }
        return view('demandePaie.index')->with('demandPaie', $demandPaie);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\DemandePaie $demandePaie
     * @return \Illuminate\Http\Response
     */
    public function show(DemandePaie $demandePaie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\DemandePaie $demandePaie
     * @return \Illuminate\Http\Response
     */
    public function edit(DemandePaie $demandePaie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\DemandePaie $demandePaie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DemandePaie $demandePaie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\DemandePaie $demandePaie
     * @return \Illuminate\Http\Response
     */
    public function destroy(DemandePaie $demandePaie)
    {
        //
    }

    public function deleteDemande($id)
    {
        $demande = DemandePaie::find($id);
        $demande->delete();
        return redirect(route('demandepaie.index'));
    }

    public function envoyerLienPaie($id_bulletin, $id_demande)
    {
        ### si la demande contient un id bulletin cad il est envoyer ###
        $affected = DB::table('demande_paies')
            ->where('id', $id_demande)
            ->update(['id_bulltein' => $id_bulletin]);
        session()->flash('success', "La fiche de paie est envoyer");
        toast(session('success'), 'success');
        return redirect(route('demandepaie.index'));
    }
}
