<?php

namespace App\Http\Controllers;

use App\Parametre;
use Illuminate\Http\Request;
use App\Http\Requests\SocieteRequest;
use App\Societe;
use Illuminate\Support\Facades\Auth;

class SocieteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(SocieteRequest $request)
    {
        $societe = new Societe();
        $societe->devise = $request->devise;
        $societe->nom_societe = $request->nom_societe;
        $societe->adresse = $request->adresse;
        $societe->GSM = $request->GSM;
        $societe->email = $request->email;
        $societe->pays = $request->pays;
        $societe->ville = $request->ville;
        $societe->code_postall = $request->code_postall;
        $societe->site_internet = $request->site_internet;
        $societe->user_id = Auth::user()->id;
        if ($request->description) {
            $societe->description = $request->description;
        }
        $societe->save();
        $societe = Societe::where('email', $request->email)->first();
        Parametre::create([
            'tauxCnss' => 4.48,
            'tauxAmo' => 2.80,
            'chargeFamille' => 30,
            'societe_id' => $societe->id,
        ]);
        // $data = $request->only('devise', 'nom_societe', 'adresse', 'GSM', 'email', 'pays', 'ville', 'code_postall', 'site_internet');
        // // $data = $request->all();

        // $data['user_id'] =
        // // dd($data);
        // Societe::create($data);

        return redirect('/admin/home');
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
