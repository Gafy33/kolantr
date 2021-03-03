<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\campagnemesure;
use App\Models\boitier;

class AlertController extends Controller
{
    public function listeClientalert($alert)
    {
        $listeclient = User::all();


        if($alert == 1)
        {
            $alert = 1;
            $messagealert = "Le compte client a bien été crée !";
        } else if($alert == 2)
        {
            $alert = 1;
            $messagealert = "Le compte client a bien été modifiée !";
        } else if($alert == 3)
        {
            $alert = 1;
            $messagealert = "Le compte client a bien été supprimée !";
        }

        return view('/gerercompte/ListeClient')->with('client', $listeclient)->with('alert', $alert)->with('messagealert', $messagealert);
    }

    public function listeboitieralert($alert)
    {
        $listeboitier = boitier::all();

        if($alert == 1)
        {
            $alert = 1;
            $messagealert = "Le boitier a bien été crée !";
        } else if($alert == 2)
        {
            $alert = 1;
            $messagealert = "Le boitier a bien été modifiée !";
        } else if($alert == 3)
        {
            $alert = 1;
            $messagealert = "Le boitier a bien été supprimée !";
        }

        
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier)->with('alert', $alert)->with('messagealert', $messagealert);
    }

     public function listecampagnemesurealert($alert)
    {
        $listecampagne = campagnemesure::all();


        if($alert == 1)
        {
            $alert = 1;
            $messagealert = "La campagne de mesure a bien été crée !";
        } else if($alert == 2)
        {
            $alert = 1;
            $messagealert = "La campagne de mesure a bien été modifiée !";
        } else if($alert == 3)
        {
            $alert = 1;
            $messagealert = "La campagne de mesure a bien été supprimée !";
        }

        return view('/gerercampagne/ListeCampagneMesure')->with('campagne', $listecampagne)->with('alert', $alert)->with('messagealert', $messagealert);
    }
}
