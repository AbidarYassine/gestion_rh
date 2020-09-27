<?php

namespace App\Http\Controllers;

use App\ContactModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Carbon;

class ContactController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $employer = DB::table('employers')->where('cin', $request->cin)->first();
        $contact = new ContactModel();
        $contact->employer_id = $employer->id;
        $contact->nom = $request->nom;
        $contact->email = $request->email;
        // 'subject', 'id_societe',
        $contact->subject = $request->subject;
        $contact->id_societe = $employer->societe_id;
        $contact->repondre=0;
        $contact->save();
        $request->session()->flash('success', 'Votre message Est Envoyer avec succé');
        toast(session('success'), 'success');
        return redirect(route('espaceEmployer.index'));
    }

    public function show($id)
    {
        $contact = ContactModel::find($id);
        $time = Carbon::parse($contact->created_at)->diffForHumans();
        return view('contact.show')->with('contact', $contact)
            ->with('employer', $contact->employer)
            ->with('time', $time);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $contact = ContactModel::find($id);
        $contact->delete();
        return response()->json([
            'status' => true,
        ]);
    }
}
