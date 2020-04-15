<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Annonce;

class AnnonceController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $order = 'ASC';
        if ($request->input('tris') == 'desc') {
            $order = 'DESC';
        }

        $orderByClause  = "CASE WHEN gouts like ' %" . Auth::user()->gouts . "%' THEN 0 ELSE 1 END,";
        $orderByClause .= "CASE WHEN ville like '%" . Auth::user()->ville . "%' THEN 0 ELSE 1 END";

        $annonces = Annonce::where('titre', 'like', '%' . $search . '%')
            ->orWhere('description', 'like', '%' . $search . '%')
            ->orWhere('prix', 'like', '%' . $search . '%')
            ->orWhere('ville', 'like', '%' . $search . '%')
            ->orWhere('couleur', 'like', '%' . $search . '%')
            ->orWhere('gouts', 'like', '%' . $search . '%')
            ->orderByRaw($orderByClause, $order)
            ->orderBy('id', $order)
            ->get()
            ->toArray();

        return view('annonces.show', compact('annonces'));
    }


    public function usercreated($id)
    {
        $annonces = Annonce::where('user_id', $id)
            ->get()
            ->toArray();
        return view('annonces.show', compact('annonces'));
    }

    public function create()
    {
        if (Auth::user()) {
            return view('annonces.create');
        } else {
            return view('index');
        }
    }

    public function showupdate($id)
    {
        $annonces = Annonce::where('id', $id)->get()->toArray();
        if (Auth::id() == $annonces[0]['user_id']) {
            return view('annonces/update', compact(['annonces']));
        } else {
            return redirect('annonces/all')->with('bad', "Commande impossible");
        }
    }

    public function update(Request $request)
    {
        Annonce::where('id', $request->id)
            ->update(
                [
                    'titre' => $request->titre, 'description' => $request->description,
                    'prix' => $request->prix,
                    'couleur' => $request->couleur,
                    'gouts' => $request->gouts,
                    'ville' => $request->ville,
                    'photo' => $request->photo->store('annonces', 'public')
                ]
            );
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'titre' => 'required', 'description' => 'required',
                'prix' => 'required', 'photo' => 'required|image', 'couleur' => 'required', 'ville' => 'required', 'gouts' => 'required',
            ]
        );
        $id = Auth::id();
        $annonce = new Annonce([
            'user_id' => $id,
            'titre' => $request->input('titre'), 'description' => $request->input('description'),
            'prix' => $request->input('prix'), 'photo' => $request->file('photo')->store('annonces', 'public'), 'couleur' => $request->input('couleur'), 'ville' => $request->input('ville'), 'gouts' => $request->input('gouts'),
        ]);
        $annonce->save();
        return redirect('annonces/all')->with('status', 'Annonce added');
    }

    public function deletepage($id)
    {
        $annonces = Annonce::where('id', $id)->get()->toArray();
        if (Auth::id() == $annonces[0]['user_id']) {
            return view('annonces.delete', compact('annonces'));
        } else {
            return redirect('annonces/all')->with('bad', "Commande impossible");
        }
    }

    public function delete($id)
    {
        $annonce = Annonce::find($id);
        $annonce->delete();

        return redirect('annonces/all')->with('status', 'Annonce deleted');
    }

    public function search(Request $request)
    {


        var_dump($request->input('search'));
    }
}
