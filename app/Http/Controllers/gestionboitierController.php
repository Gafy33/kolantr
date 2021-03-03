<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\campagnemesure;
use App\Models\boitier;

class gestionboitierController extends Controller
{

	//
    //
    // Gestion Boitier
    //
    //

	//Affiche la liste des boitiers
     public function listeBoitier()
    {
        $listeboitier = boitier::all();
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier);
    }

    //Affiche la page d'ajout des boitiers
    public function creationBoitier()
    {
        return view('/gererboitier/creationBoitier');
    }

    //Ajouter des boitiers
    public function ajouterBoitier()
    {
        
        $boitier = new boitier;
        $boitier->sigfox = request('sigfox');
        $boitier->statut = request('statut');

        $boitier->save();

		return redirect()->route('listeboitieralert_path', ['alert' => 1]);
    }


    //Supprimer la liste des boitiers
    public function supprimerBoitier($id)
    {
        
        $boitier = boitier::find($id);


        $campagne = campagnemesure::where('id_boitier', $boitier->id)->first();
        if(!empty($campagne))
        {
        $campagne->id_boitier = NULL;
        $campagne->update();
        }

        $boitier->delete();

		return redirect()->route('listeboitieralert_path', ['alert' => 3]);

    }

    //Affiche la page modifier des boitiers
    public function modifierBoitier($id)
    {

        $boitier = boitier::find($id);

        $campagne = campagnemesure::where('id_boitier', $boitier->id)->first();
        //$campagne = campagnemesure::find($boitier->id);

        return view('/gererboitier/modifierBoitier')->with('boitier', $boitier)->with('campagne', $campagne);

    }

    //Modifie des boitiers
    public function modifierBoitierConfirm($id)
    {

        $boitier = boitier::find($id);
        $boitier->sigfox = request('sigfox');
        $boitier->alarmeBatterie = request('alarmeBatterie');
        $boitier->statut = request('statut');

        $boitier->update();

       return redirect()->route('listeboitieralert_path', ['alert' => 2]);
    }
}
