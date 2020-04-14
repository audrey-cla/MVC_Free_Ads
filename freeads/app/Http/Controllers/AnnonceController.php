<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Annonce;

class AnnonceController extends Controller
{

    public function create()
    {
        if (Auth::user()) {
            return view('annonces.create');
        } else {
            return view('annonces.show');
        }
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'titre' => 'required', 'description' => 'required',
                'prix' => 'required', 'photo' => 'required|image|'
            ]
        );

        $id = Auth::id();

        $annonce = new Annonce([
            'id_user' => $id,
            'titre' => $request->input('titre'), 'description' => $request->input('description'),
            'prix' => $request->input('prix'), 'photo' => $request->file('photo')->store('annonces','public')
        ]);

        $annonce->save();
    }



    public function index()
    {
        $annonces = Annonce::all()->toArray();
        return view('annonces.show', compact('annonces'));
    }
}
