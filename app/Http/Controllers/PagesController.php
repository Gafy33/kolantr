<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return \view('pages.login');
    }

    public function login()
    {

    	if (auth()->check()) {
            return redirect()->route('accueil');
        } else {
        return view('auth.login');
    	}
    }
}	
