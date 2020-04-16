<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Index;

class IndexController extends Controller
{
   
    public function showIndex()
    {
        if (Auth::user()) {
            return view('dashboard');
        } else {
            return view('index');
        }
        
        
    }
}