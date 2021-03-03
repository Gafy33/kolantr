<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\campagnemesure;
use App\Models\boitier;
use App\Models\Statistique;

class clientController extends Controller
{
    public function mescampagnesliste()
    {

        $listecampagne = campagnemesure::all();

        return view('/Client/listecampagneclient')->with('listecampagne', $listecampagne);
    }

    public function campagneconsultation($id)
    {
        $campagne = campagnemesure::find($id);
        $stat = Statistique::all();

        
        return view('/Client/consultationcampagne')->with('campagne', $campagne)->with('stat', $stat);

    }
}
