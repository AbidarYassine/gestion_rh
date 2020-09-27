<?php

namespace App\Http\Controllers;

use App\Banque;
use App\Contrat;
use App\ContratType;
use App\Departement;
use App\Http\Requests\EmployerRequest;
use App\Societe;
use Illuminate\Contracts\Encryption\DecryptException;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Employer;
use Illuminate\Http\Request;
use App\Emploi;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $societe = Societe::where('user_id', Auth::user()->id)->first();
        $devise = $societe->devise;
        $employers = DB::table('employers')->where('societe_id', $societe->id)->where('deleted_at', null)->get();
        return view('employer.index')->with('employers', $employers)->with('devise', $devise);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employer.create')->with('employer', null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployerRequest $request)
    {         //save Emploi
        $emploi = new Emploi();
        $emploi->fonction = $request->fonction;
        $emploi->date_debut = $request->date_debut;
        $emploi->date_fin = $request->date_fin;
        $emploi->salaire_base = $request->salaire_base;
        $emploi->descrip = $request->descrip;
        $emploi->save();

        $departemetn = DB::table('departements')->where('nom_dep', $request->nom_dep)->first();
        if ($departemetn != null) {
            $departemetnid = $departemetn->id;
        } else {
            $dateDep = $request->only('nom_dep');
            $departemetnid=Departement::insertGetId($dateDep);
        }
        //save Banque
        $dataBanque = $request->only('nom_banque', 'adresse', 'tele');
        $dataBanque['rib'] = encrypt($request->rib);
        Banque::create($dataBanque);
        $dataEmployer = $request->only('cin', 'nom_employer', 'prenom', 'email', 'date_naissance', 'nbr_enfant', 'situationFami', 'sexe', 'Num_cnss', 'Num_Icmr', 'salaire');

        if ($image = $request->file('image')) {
            $dataEmployer['image'] = $request->image->store('images', 'public');
        } else {
            if ($request->sexe == "femme") {
                $dataEmployer['image'] = 'femme.png';
            } else if ($request->sexe == "homme")
                $dataEmployer['image'] = 'persons.png';
        }
        // dd($dataEmployer);
        $dataEmployer['emploi_id'] = DB::table('emplois')->max('id');
        $dataEmployer['banque_id'] = DB::table('banques')->max('id');
        $dataEmployer['departement_id'] = $departemetnid;
        $dataEmployer['societe_id'] = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        //save contrat type;
        $contraTypeId = 0;
        $contraType = DB::table('contrat_types')->where('type', $request->type)->first();
        if ($contraType == null) {
            $dataContratType = $request->only('type');
            ContratType::create($dataContratType);
            $contraTypeId = DB::table('contrat_types')->max('id');
        } else if ($contraType != null) {
            $contraTypeId = $contraType->id;
        }
        Employer::create($dataEmployer);
        //save contrat
        $dataContrat = $request->only('date_embauche');
        $dataContrat['employer_id'] = DB::table('employers')->max('id');
        $dataContrat['contra_type_id'] = $contraTypeId;
        Contrat::create($dataContrat);
        $request->session()->flash('success', "Nouvelle employer est ajouter avec succeé");
        toast(session('success'), 'success');
        return redirect(route('employer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function show(Employer $employer)
    {

        $contrat = DB::table('contrats')->where('employer_id', '=', $employer->id)->first();
        $departement = DB::table('departements')->where('id', $employer->departement_id)->first();
        $post = DB::table('emplois')->where('id', $employer->emploi_id)->first();
        $banque = DB::table('banques')->where('id', $employer->banque_id)->first();

        $banque->rib = $banque->rib;

        $contratType = DB::table('contrat_types')->where('id', $contrat->contra_type_id)->first();
        $devise = DB::table('societes')->where('user_id', Auth::user()->id)->value('devise');
        return view('employer.show')
            ->with('contrat', $contrat)
            ->with('departement', $departement)
            ->with('post', $post)
            ->with('banque', $banque)
            ->with('employer', $employer)
            ->with('contratType', $contratType)
            ->with('devise', $devise);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function edit(Employer $employer)
    {
        $contrat = DB::table('contrats')->where('employer_id', '=', $employer->id)->first();
        $departement = DB::table('departements')->where('id', $employer->departement_id)->first();
        $post = DB::table('emplois')->where('id', $employer->emploi_id)->first();
        $banque = DB::table('banques')->where('id', $employer->banque_id)->first();
        $contratType = DB::table('contrat_types')->where('id', $contrat->contra_type_id)->first();
        return view('employer.create')->with('employer', $employer)
            ->with('contratType', $contratType)
            ->with('departement', $departement)
            ->with('post', $post)
            ->with('banque', $banque)
            ->with('contart', $contrat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employer $employer)
    {
        $request->validate([
            'cin' => ['required', 'string', \Illuminate\Validation\Rule::unique('employers')->ignore($employer->id)],
            'nom_employer' => 'required|string|max:20,min:6',
            'prenom' => 'required|string|max:20',
            'email' => 'required|email|max:100',
            'date_naissance' => 'required|date',
            'situationFami' => 'required|string',
            'sexe' => 'required|string',
            'Num_cnss' => ['required', 'numeric', \Illuminate\Validation\Rule::unique('employers')->ignore($employer->id)],
            'nbr_enfant' => 'numeric',
            'Num_Icmr' => ['required', 'numeric', \Illuminate\Validation\Rule::unique('employers')->ignore($employer->id)],
            'salaire' => 'required|numeric',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fonction' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'date|after:date_debut',
            'salaire_base' => 'required|numeric',
            'nom_dep' => 'required|string',
            'nom_banque' => 'required|string',
            'rib' => ['required', 'numeric', 'min:16', \Illuminate\Validation\Rule::unique('banques')->ignore($employer->banque_id)],
            'tele' => ["required", "regex:/^(0|\+212)[1-9]([-.]?[0-9]{2}){4}$/"],
            'adresse' => 'string',
            'date_embauche' => 'required|date',
            'type' => 'required|string',
        ]);
        $departemet = Departement::find($employer->departement_id);
        $departemet->nom_dep = $request->nom_dep;
        $departemet->update();

        Emploi::where('id', $employer->emploi_id)->update([
            'fonction' => $request->fonction,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'salaire_base' => $request->salaire_base,
        ]);
        Banque::where('id', $employer->banque_id)->update([
            'nom_banque' => $request->nom_banque,
            'adresse' => $request->adresse,
            'tele' => $request->tele,
            'rib' => $request->rib
        ]);

        $contrat = DB::table('contrats')->where('employer_id', $employer->id)->first();
        $contrat->date_embauche = $request->date_embauche;
        // dd($contrat);
        $contratType = DB::table('contrat_types')->where('id', $contrat->contra_type_id)->update(['type' => $request->type]);
        if ($image = $request->file('image')) {
            $image = $request->image->store('images', 'public');
        } else {
            $image = 'person.png';
        }
        $nbrEnfant = 0;
        if ($request->nbr_enfant != null) {
            $nbrEnfant = $request->nbr_enfant;
        }
        $employer->update([
            'cin' => $request->cin,
            'nom_employer' => $request->nom_employer,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'date_naissance' => $request->date_naissance,
            'nbr_enfant' => $nbrEnfant,
            'situationFami' => $request->situationFami,
            'sexe' => $request->sexe,
            'Num_cnss' => $request->Num_cnss,
            'Num_Icmr' => $request->Num_Icmr,
            'salaire' => $request->salaire,
            'image' => $image,
        ]);
        $request->session()->flash('success', "l'employer modifier avec succeé");
        toast(session('success'), 'success');
        return redirect(route('employer.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Employer $employer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employer = Employer::find($id);

        $employer->delete();

        return redirect(route('employer.index'));
    }

    public function forceDelete($id)
    {
        $employer = Employer::onlyTrashed()
            ->where('id', $id)
            ->first();
        $employer->forceDelete();
        return redirect(route('para.index'));
    }

    public function InfoCalculSalire()
    {
        return view('outil.salaire');
    }

    public function infoIr()
    {
        return view('outil.ir');
    }
}
