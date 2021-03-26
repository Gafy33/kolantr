<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistique;

class CollecteSigfoxController extends Controller
{
    public function index()
    {
        $Stats = Statistique::all();
        return view('pages/Statistiques')->with('Stats', $Stats);
    }
}
