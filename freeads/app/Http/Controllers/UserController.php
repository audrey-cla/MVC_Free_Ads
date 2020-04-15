<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function register()
    {
        return view('registration');
    }

    public function update($user)
    {
        $user = Auth::user();
        return view('update', compact(['user']));
    }

    public function store($user)
    {
        request()->validate(['email' => ['required'], 'name' => 'required', 'password' => ['required'], 'ville' => 'required', 'gouts' => 'required']);
        $user = Auth::user();
        $user->password = bcrypt(request('password'));
        $user->name = request('name');
        $user->email = request('email');
        $user->ville = request('ville');
        $user->gouts = request('gouts');


        $user->save();
        return redirect('index')->with('status', 'Porfil Modifié');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');

    }
}
