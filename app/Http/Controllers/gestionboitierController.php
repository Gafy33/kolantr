<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\campagnemesure;
use App\Models\boitier;
use App\Models\demande;
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

        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $listeboitier = boitier::all();
        $alarme = boitier::all();

        $alarme_popup = NULL;
        foreach($alarme as $alarmes)
        {
            if(!empty($alarmes->alarmeBatterie))
            {
                $alarme_popup = 1;
            }
        }

        $demande = demande::all();

        $demande_popup = NULL;
        
        foreach($demande as $demandes)
        {
                $demande_popup += 1;
        }
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier)->with('alarme', $alarme)->with('alarme_popup', $alarme_popup);
    }

    //Affiche la page d'ajout des boitiers
    public function creationBoitier()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        return view('/gererboitier/creationBoitier');
    }

    //Ajouter des boitiers
    public function ajouterBoitier()
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $boitier = new boitier;
        $boitier->adrSigfox = request('sigfox');
        $boitier->statut = request('statut');
        $boitier->alarmeBatterie = NULL;

        $boitier->save();

		return redirect()->route('listeboitieralert_path', ['alert' => 1]);
    }


    //Supprimer la liste des boitiers
    public function supprimerBoitier($id)
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

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

        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $boitier = boitier::find($id);

        $campagne = campagnemesure::where('id_boitier', $boitier->id)->first();
        //$campagne = campagnemesure::find($boitier->id);

        return view('/gererboitier/modifierBoitier')->with('boitier', $boitier)->with('campagne', $campagne);

    }

    //Modifie des boitiers
    public function modifierBoitierConfirm($id)
    {

        if (! auth()->check()) {
            return redirect()->route('login');
        }

        $boitier = boitier::find($id);
        $boitier->adrSigfox = request('sigfox');
        $boitier->alarmeBatterie = request('alarmeBatterie');
        if(!empty(request('statut'))){
            $boitier->statut = request('statut');
        }

        $boitier->update();

       return redirect()->route('listeboitieralert_path', ['alert' => 2]);
    }

    public function BoitierAlarmeBatterie($id)
    {

        if (! auth()->check()) {
            return redirect()->route('login');
        }
        
        $boitier = boitier::find($id);
        $boitier->alarmeBatterie = NULL;

        $boitier->update();

       return redirect()->route('listeboitieralert_path', ['alert' => 5]);
    }
}
