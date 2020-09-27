<?php

namespace App\Http\Controllers;

use App\Employer;
use App\Societe;
use App\Employer_Presence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PresenceRequest;
use App\Presence;
use Illuminate\Support\Facades\Auth;
use PDF;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd('index function Presence controller');
        $presence = [];
        $employer_ids = [];
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $employers = DB::table('employers')->where('societe_id', $idsociete)->where('deleted_at', null)->get();
        foreach ($employers as $employer) {
            $presence[$employer->id] = DB::table('presences')->where('employer_id', $employer->id)->where('deleted_at', null)->where('date_pointe', date('yy-m-d'))->get();
            $employer_ids[$employer->id] = $employer->id;
        }
        // min id;
        // max id;
        if (count($employer_ids) > 0) {
            $min = min($employer_ids);
            $max = max($employer_ids);
        } else {
            $min = 0;
            $max = 0;
        }
        return view('presence.index')->with('employers', $employers)->with('tablePresence', $presence)
            ->with('min', $min)
            ->with('max', $max);
    }

    public function getEmployerPresence(Request $request)
    {

        $idsocietee = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $employers = Societe::find($idsocietee)->employers;
        if ($request->ajax()) {
            $data = '';
            $output = '';
            $query = $_GET['query'];
            if ($query != '') {
                $datepresenceFormat = date("yy-m-d", strtotime($query));
                foreach ($employers as $employer) {
                    $presences[$employer->id] = DB::table('presences')->where('employer_id', $employer->id)->where('date_pointe', $datepresenceFormat)->get();
                }
                foreach ($employers as $employer) {
                    foreach ($presences[$employer->id] as $presence) {
                        $output .= '
                  <tr>
                  <td>' . $employer->cin . '</td>
                    <td>' . $employer->nom_employer . " " . $employer->prenom . '</td>
                     <td>
                        <ul class="list-group list-group-horizontal">
                              <a data-toggle="modal" data-note="' . $presence->note . '" data-heur-sortit="' . $presence->heur_sortit . '" data-heur-entre="' . $presence->heur_entre . '" data-id_emp="' . $employer->id . '" data-id_presence="' . $presence->id . '"  data-target="#editModal" style="border-radius: 20px;" class="text-center btn btn-outline-primary"> ' . $presence->heur_entre . " " . $presence->heur_sortit .
                            '</a>

                        </ul>
                     </td>
                    </tr>
                    ';
                    }
                }
                $sourece = $output;
                // echo json_encode($data);
                if ($sourece != null) {
                    return response()->json([
                        'status' => true,
                        'sourece' => $sourece,
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                    ]);
                }
            }
        } else {
            echo "not found";
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

    public function deletePresence(Request $request)
    {
        $presence = Presence::find($request->id);

        if ($presence->forceDelete()) {
            return response()->json(['success' => 'Data Deleted  successfully.']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresenceRequest $request)
    {

        //teste si deja existe la presence

        $presence = new Presence();
        $presence->heur_entre = $request->heur_entre;
        $presence->heur_sortit = $request->heur_sortit;
        $presence->note = $request->note;
        $presence->employer_id = $request->id_emp;
        $presence->date_pointe = $request->date_pointe;
        $presence->save();
        $request->session()->flash('success', "pointage fait avec succe");
        toast(session('success'), 'success');
        return redirect(route('presenceEmp.index'));
    }

    public function saveAll(PresenceRequest $request)
    {

        if ($request->select_empl != null) {
            foreach ($request->select_empl as $id_emp) {
                $employer = Employer::find($id_emp);
                $presence = new Presence();
                $presence->heur_entre = $request->heur_entre;
                $presence->heur_sortit = $request->heur_sortit;
                $presence->note = $request->note;
                $presence->employer_id = $employer->id;
                $presence->date_pointe = date('yy-m-d');
                $presence->save();
            }
            $cmp = count($request->select_empl);
            return response()->json([
                'status' => true,
                'cmp' => $cmp,
            ]);
        } else {
            return response()->json([
                'status' => false,
                'cmp' => 0,
            ]);
        }
    }

    public function savePresence(Request $Request, $id)
    {
    }

    public function pointerEmployer()
    {
        // return view('employer.presence.historique');
        $presence = [];
        $idsociete = DB::table('societes')->where('user_id', Auth::user()->id)->value('id');
        $employers = DB::table('employers')->where('societe_id', $idsociete)->where('deleted_at', null)->get();
        foreach ($employers as $employer) {
            $presence[$employer->id] = DB::table('presences')->where('employer_id', $employer->id)->where('date_pointe', date('yy-m-d'))->get();
        }

        return view('presence.historique')->with('employers', $employers)->with('tablePresence', $presence);
        // dd('hi');
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

    public function updatePresence(PresenceRequest $request)
    {
        $presence = Presence::find($request->id_presence);
        $presence->heur_sortit = $request->heur_sortit;
        $presence->heur_entre = $request->heur_entre;
        $presence->note = $request->noteS;
        $presence->update();
        $request->session()->flash('success', "Pointage modifier avec succeé");
        toast(session('success'), 'success');
        return redirect(route('presenceEmp.index'));
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
