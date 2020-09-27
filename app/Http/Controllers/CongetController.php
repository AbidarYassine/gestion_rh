<?php

namespace App\Http\Controllers;

use App\Conget;
use App\CongetType;
use Illuminate\Http\Request;
use App\Http\Requests\CongetRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CongetController extends Controller
{

    public function index()
    {
        ###### get les demande de conget du societe courant avec status en attend #########
        $conget = Conget::where('id_societe', DB::table('societes')->where('user_id', Auth::user()->id)->value('id'))
            ->where('status', 'en attend')
            ->get();
        return view('conget.congetIndex')->with('demande_congets', $conget);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateStatus($id)
    {
        $conget = Conget::find($id);
        $conget->status = 'Accepter';
        $conget->update();
        return redirect(route('conget.index'));
    }

    public function destroyStatus(Request $request, $id)
    {
        $request->validate([
            'raison' => 'required|min:10|max:500',
        ]);
        $conget = Conget::find($id);
        $conget->status = 'Reféser';
        $conget->raison = $request->raison;
        $conget->update();
        return response()->json([
            'status' => true,
            'message' => 'conget modifier avec succeé'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CongetRequest $request)
    {

        $conget = new Conget();
        $congetType = DB::table('conget_types')->where('type', $request->type)->first();
        $employer = DB::table('employers')->where('cin', $request->input('employer_id'))->first();
        $idContraType = 0;
        if ($congetType == null) {
            $idContraType = CongetType::insertGetId([
                'type' => $request->input('type'),
            ]);
        } else {
            $idContraType = $congetType->id;
        }
        $conget->date_debut = $request->input('date_debut');
        $conget->durre = $request->input('durre');
        $conget->employer_id = $employer->id;
        $conget->id_societe = $employer->societe_id;
        $conget->conget_type_id = $idContraType;
        $conget->save();
        $request->session()->flash('success', 'Votre demande Est Envoyer avec succé');
        toast(session('success'), 'success');
        return redirect(route('espaceEmployer.index'));
    }


    public function update(Request $request, $id)
    {

        $request->validate([
            'raison' => 'required|min:10|max:500',
        ]);
        $conget = Conget::find($id);
        $conget->date_debut = $request->date_debut;
        $conget->durre = $request->durre;
        $conget->raison = $request->raison;
        $conget->status = 'Accepter';
        $conget->update();
        return response()->json([
            'status' => true,
            'message' => 'conget modifier avec succeé'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Conget $conget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conget $conget)
    {
        //
    }

    public function EmpcongetTraiter()
    {
        $tabCongetTraiter = [];
        $conget = DB::table('congets')->where('employer_id', session()->get('id'))
            ->where('raison', '!=', 'null')
            ->whereMonth('created_at', date('m'))
            ->whereYear('created_at', date('yy'))->get();
        // dd($conget,session()->get('id'));
        if ($conget == null) {
            return redirect(route('espaceEmployer.index'));
        } else {
            foreach ($conget as $con) {
                $time = Carbon::parse($con->updated_at)->diffForHumans();
                $tabCongetTraiter[] = [$con, $time];
            }
            // dd($tabCongetTraiter);
            return view('espaceEmployer.conget.traiter')->with('tabCongetTraiter', $tabCongetTraiter);
        }
    }

    public function employerConget()
    {
        ###### afficher les employer en conget ########
        $id_societe = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $employer_enconget = Conget::where('id_societe', $id_societe)
            ->where('status', 'Accepter')->get();
        return view('conget.employerConget')->with('employerEnConget', $employer_enconget);
    }
}
