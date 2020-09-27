<?php

namespace App\Http\Controllers;

use App\Contrat;
use App\Employer;
use App\Societe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContratController extends Controller
{
    ##### Imprimer Contrat #######
    public function index()
    {
        ## get id societe
        ## get employer
        $societe = Societe::where('user_id', Auth::user()->id)->first();
        $employers = $societe->employers;
//        Contrat::
        return view('contrat.index', compact('employers'));
    }

    public function show($id)
    {
        $contrat = Contrat::find($id);
        return $contrat->employer;
        return view('contrat.show', compact('contrat'));
    }

    public function imprimer($id)
    {
        $contrat = Contrat::find($id);
        return $contrat->employer;
    }
}
