<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequest;
use App\Societe;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Flash;
use App\Http\Requests\UserImage;
use App\Http\Requests\UpdatePassword;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    protected function store(AddUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->rais_social = $request->rais_social;
        $user->tele = $request->tele;
        $user->save();
        // Auth::make($user);;
        auth()->login($user);
        return response()->json([
            'status' => true,
        ]);
//        return redirect(route('registration'));
        // return view('auth.registration');
    }

    public function profile($id)
    {
        $user = User::find($id);
        $societer = DB::table('societes')->where('user_id', $user->id)->first();
        return view('user.index')->with('user', $user)
            ->with('societe', $societer);
    }

    public function parametreUser($id)
    {
        $user = User::find($id);
        return view('user.setting')->with('user', $user);
    }

    public function updateUser(Request $request)
    {
        $user = Auth::user();
        $user = User::find($user->id);
        // dd($user);
        $request->validate([
            'name' => ['required', 'string', \Illuminate\Validation\Rule::unique('users')->ignore(Auth::user()->id)],
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore(Auth::user()->id)],
            'rais_social' => "required",
            'tele' => ["required", "regex:/^(0|\+212)[1-9]([-.]?[0-9]{2}){4}$/"],
        ]);
        // $user->update($request->only('username', 'email', 'rais_social', 'tele'));
        $user->email = $request->email;
        $user->name = $request->name;
        $user->rais_social = $request->rais_social;
        $user->tele = $request->tele;
        $user->update();
        $request->session()->flash('success', " mise à jour faite avec succé");
        return redirect(route('user.profile', $user->id));
    }

    public function updateImage(UserImage $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($image = $request->file('image')) {
            //$destinationPath = 'public/image/'; // upload path
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move('images', $profileImage);
            //$insert[]['image'] = "$profileImage";
            $user->image = $profileImage;
            $user->update();
            $request->session()->flash('success', "image mise à jour avec succé");
        } else {
            $request->session()->flash('error', "erreur lors de telechargment");
        }
        return redirect(route('user.profile', $id));
    }

    public function updateMotPasse(UpdatePassword $request)
    {
        // $user=Auth::user();
        // dd($request->password,$request->password_confirmation);
        $password = Hash::make($request->password);
        $user = DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['password' => $password]);
        $request->session()->flash('success', "mot de passe modifier  avec succé");
        return redirect(route('user.profile', $request->user_id));
    }
}
