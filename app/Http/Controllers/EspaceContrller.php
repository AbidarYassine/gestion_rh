<?php

namespace App\Http\Controllers;

use App\Employer;
use App\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DemandePaie;

### espace employer #######
class EspaceContrller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        #### Affiche info employer #########
        $id = session()->get('id');
        $employer = Employer::find($id);
        $societe = Societe::find($employer->societe_id);
        $contrat = DB::table('contrats')->where('employer_id', $employer->id)->first();
        $emploi = $employer->emploi;
        $departement = $employer->departement;
        $demande = DB::table('demande_paies')->where('employer_id', session()->get('id'))->where('id_bulltein', '!=', 0)->get();
        // dd($departement);
        return view('espaceEmployer.view.index')->with('societe', $societe)
            ->with('employer', $employer)
            ->with('contrat', $contrat)
            ->with('user', $societe->user_id)
            ->with('emploi', $emploi)
            ->with('demande', $demande)
            ->with('departement', $departement);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('name');
        $request->session()->forget('cin');
        $request->session()->forget('id');
        return redirect(route('espace.login'));
    }

    public function demandeFichePaie(Request $request)
    {
        //    $request->date_debut, $request->date_fin;
        $id = session()->get('id');
        $employer = Employer::find($id);
        $paie = DB::table('bulletin_paies')->where('employer_id', $id)
            ->where('date_paie_debut', $request->date_debut)
            ->where('date_paie_dfin', $request->date_fin)->first();
        if ($paie == null) {
            $request->session()->flash('error', 'La fiche de paie n\'est encore traiter');
            toast(session('error'), 'error');
            return redirect(route('espaceEmployer.index'));
        } elseif (DB::table('demande_paies')->where('employer_id', $id)->where('date_debut', $request->date_debut)->where('date_fin', $request->date_fin)->first() == null) {
            DemandePaie::create([
                'date_debut' => $request->date_debut,
                'date_fin' => $request->date_fin,
                'employer_id' => $id,
                'societe_id' => $employer->societe_id,
                'id_bulltein' => $paie->id,
            ]);
            $request->session()->flash('success', 'Votre demande est envoyer avec succé');
            toast(session('success'), 'success');
            return redirect(route('espaceEmployer.index'));
        } else {
            $request->session()->flash('error', 'La fiche demande est deja envoyer');
            toast(session('error'), 'error');
            return redirect(route('espaceEmployer.index'));
        }
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
        ##### login #########
        $employer = DB::table('employers')->where('cin', $request->matricule)
            ->where('nom_employer', $request->nom)->first();
        if ($employer == null) {
            $request->session()->flash('error', " Aucun employer avec ce matricule");
            return redirect(route('espace.login'));
        } else {
            $request->session()->put('name', $employer->nom_employer);
            $request->session()->put('cin', $employer->cin);
            $request->session()->put('id', $employer->id);
            return redirect(route('espaceEmployer.index'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
