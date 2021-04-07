<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\campagnemesure;
use App\Models\boitier;
use App\Models\demande;
use Geocoder\Laravel\ProviderAndDumperAggregator as Geocoder;

class gestioncampagnemesureController extends Controller
{
    //
    //
    // Gestion Campagne de mesure
    //
    //


    //Affiche la liste des campagnes
    public function listeCampagneMesure()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $listecampagne = campagnemesure::all();
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
        return view('/gerercampagne/ListeCampagneMesure')->with('campagne', $listecampagne)->with('alarme', $alarme)->with('alarme_popup', $alarme_popup);
    }


 	//Affiche la page d'ajout des campagnes
    public function creationCampagneMesure()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $listeclient = User::all();
        $listeboitier = boitier::all();
        return view('/gerercampagne/creationCampagneMesure')->with('client', $listeclient)->with('boitier', $listeboitier);
    }

    //Ajouter des campagnes avec Eloquent
    public function ajouterCampagneMesure()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $campagne = new campagnemesure;
        $campagne->adresseCampagne = request('adresseCampagne');
        $campagne->statut = request('statut');
        $campagne->codePostal = request('codePostal');
        $campagne->ville = request('ville');
        $campagne->numeroRoute = request('numeroRoute');
        $campagne->Direction = request('Direction');
        $campagne->DébutCampagne = request('DebutCampagne');
        $campagne->FinCampagne = request('FinCampagne');
        $campagne->limitationvitesse = request('limitationvitesse');
        $campagne->id_user = request('id_user');

        if(!empty(request('id_boitier')))
        {
            $campagne->id_boitier = request('id_boitier');
            $boitier = boitier::find(request('id_boitier'));
            $boitier->statut = "utilisé";
            $boitier->update();
        }

        $campagne->save();

        return redirect()->route('listecampagnemesurealert_path', ['alert' => 1]);
    }


    //Supprimer des campagnes avec Eloquent
    public function supprimerCampagneMesure($id)
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $campagne = campagnemesure::find($id);

        $campagne->delete();

        return redirect()->route('listecampagnemesurealert_path', ['alert' => 3]);

    }

    //Afficher la page modifier des campagnes
    public function modifierCampagneMesure($id)
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $listeclient = User::all();
        $listeboitier = boitier::all();

        $campagne = campagnemesure::find($id);
        
        $client = $campagne->id_user;
        $clientdefault = User::find($client);

        $boitier = $campagne->id_boitier;
        $boitierdefault = boitier::find($boitier);


        return view('/gerercampagne/modifierCampagneMesure')->with('client', $listeclient)->with('campagne', $campagne)->with('clientdefault', $clientdefault)->with('boitier', $listeboitier)->with('boitierdefault', $boitierdefault);

    }

    //Modifier des campagnes avec Eloquent
    public function modifierCampagneMesureConfirm($id)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }
        
        $campagne = campagnemesure::find($id);
        $campagne->adresseCampagne = request('adresseCampagne');
        $campagne->statut = request('statut');
        $campagne->codePostal = request('codePostal');
        $campagne->ville = request('ville');
        $campagne->numeroRoute = request('numeroRoute');
        $campagne->Direction = request('Direction');
        $campagne->DébutCampagne = request('DebutCampagne');
        $campagne->FinCampagne = request('FinCampagne');
        $campagne->limitationvitesse = request('limitationvitesse');
        $campagne->id_user = request('id_user');

        if(!empty(request('id_boitier')))
        {
            $campagne->id_boitier = request('id_boitier');
            $boitier = boitier::find(request('id_boitier'));
            $boitier->statut = "utilisé";
            $boitier->update();
        } else 
        {
            $boitier = boitier::find($campagne->id_boitier);
            if(!empty($boitier)){
            $boitier->statut = "non utilisé";
            $boitier->update();
            $campagne->id_boitier = NULL;
            }
        }


        $campagne->update();

        return redirect()->route('listecampagnemesurealert_path', ['alert' => 2]);
    }
}
