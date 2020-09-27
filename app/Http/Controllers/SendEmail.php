<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use App\Mail\Repondre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


class SendEmail extends Controller
{
    public function sendEmailForEmployer(Request $request)
    {
        $details = [
            'title' => 'Mail from Rhapp',
            'body' => $request->contenu,
        ];
        Mail::to($request->email)->send(new Repondre($details));
        $affected = DB::table('contact_models')
            ->where('id', $request->id_contact)
            ->update(['repondre' => 1]);
            // dd($request->id_contact);
        $request->session()->flash('success', "l'email  est envoyer  avec succeé");
        toast(session('success'), 'success');
        return redirect(route('employer.index'));
    }
}
