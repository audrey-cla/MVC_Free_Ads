<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AnnonceController extends Controller
{
  
    public function create()
    {
        return view('annonces.create');
    }
}
