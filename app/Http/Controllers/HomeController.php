<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\campagnemesure;
use App\Models\boitier;


use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/accueil');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function listeClientmodifier()
    {
        $listeclient = User::all();
        return view('/gerercompte/ListeClient')->with('client', $listeclient);
    }

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

    public function ajouterClient()
    {

        $client = new User;
        $client->email = request('email');
        $client->role_id = 2;
        $client->name = request('name');
        $client->password = Hash::make(request('password'));
        $client->prenom = request('prenom');
        $client->identifiant = request('identifiant');
        $client->numeroTel = request('numeroTel');
        $client->adresseClient = request('adresseClient');
        $client->codePostal = request('codePostal');
        $client->ville = request('ville');
        $client->region = request('region');
        $client->preference = "theme_dark";

        if( request('entreprise') == "oui") {
            $client->nomEntreprise = request('entreprise');
            $client->nomEntreprise = request('nomEntreprise');
        }

        $client->save();

        return redirect()->route('listeClientalert_path', ['alert' => 1]);
    }

    public function supprimerClient($id)
    {

        $client = User::find($id);

        $client->delete();

        return redirect()->route('listeClientalert_path', ['alert' => 3]);
    }


     public function modifierClient($id)
    {

        $client = User::find($id);

        return view('/gerercompte/ModifierClient')->with('client', $client);

    }

    public function modifierClientConfirm($id)
    {

        $client = User::find($id);
        $client->email = request('email');
        $client->name = request('name');
        $client->prenom = request('prenom');


        if( !empty(request('numeroTel'))){
            $client->numeroTel = request('numeroTel');
        }

        if(!empty(request('adresseClient'))){
            $client->adresseClient = request('adresseClient');
        }

        if(!empty(request('codePostal'))){
            $client->codePostal = request('codePostal');
        }
        
        if(!empty(request('ville'))){
            $client->ville = request('ville');
        }

        if(!empty(request('region'))){
        $client->region = request('region');
        }

        if(!empty(request('nomEntreprise'))){
            $client->nomEntreprise = request('nomEntreprise');
        } else{
            $client->nomEntreprise = "NULL";
        }

        $client->update();

        return redirect()->route('listeClientalert_path', ['alert' => 2]);
    }

    public function listeAdminTechnicienmodifier()
    {
        $listeclient = User::all();
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient);
    }

    public function ajouterAdminTechnicien()
    {

        $client = new User;
        $client->email = request('email');
        $client->role_id = request('role');
        $client->name = request('name');
        $client->prenom = request('prenom');
        $client->password = Hash::make(request('password'));
        $client->identifiant = request('identifiant');
        $client->preference = "theme_dark";

        $client->save();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été crée !";

        $listeclient = User::all();
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient)->with('alert', $alert)->with('messagealert', $messagealert);
    }

    public function supprimerAdminTechnicien($id)
    {

        $client = User::find($id);

        if(!empty($client))
        {
        $client->delete();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été supprimé !";

        $listeclient = User::all();
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient)->with('alert', $alert)->with('messagealert', $messagealert);
        } else {

        $listeclient = User::all();
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient);
        }
    }


     public function modifierAdminTechnicien($id)
    {

        $client = User::find($id);

        return view('/gerercompte/ModifierAdminTechnicien')->with('client', $client);

    }

    public function modifierAdminTechnicienConfirm($id)
    {

        $client = User::find($id);
        $client->email = request('email');
        $client->name = request('name');
        $client->prenom = request('prenom');

        $client->update();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été modifié !";

        $listeclient = User::all();
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient)->with('alert', $alert)->with('messagealert', $messagealert);
    }

    public function listeCampagneMesure()
    {
        $listecampagne = campagnemesure::all();
        return view('/gerercampagne/ListeCampagneMesure')->with('campagne', $listecampagne);
    }

    public function creationCampagneMesure()
    {
        $listeclient = User::all();
        return view('/gerercampagne/creationCampagneMesure')->with('client', $listeclient);
    }


    public function ajouterCampagneMesure()
    {
        
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

        $campagne->save();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été crée !";

        $listecampagne = campagnemesure::all();
        return view('/gerercampagne/ListeCampagneMesure')->with('campagne', $listecampagne)->with('alert', $alert)->with('messagealert', $messagealert);
    }

    public function supprimerCampagneMesure($id)
    {
        
        $campagne = campagnemesure::find($id);

        if(!empty($campagne))
        {
        $campagne->delete();

        $alert = 1;
        $messagealert = "Le compte client a bien été supprimé !";

        $listecampagne = campagnemesure::all();
        return view('/gerercampagne/ListeCampagneMesure')->with('campagne', $listecampagne)->with('alert', $alert)->with('messagealert', $messagealert);
        } else {

        $listecampagne = campagnemesure::all();
        return view('/gerercampagne/ListeCampagneMesure')->with('campagne', $listecampagne);
        }

    }


    public function modifierCampagneMesure($id)
    {

        $client = User::all();
        $campagne = campagnemesure::find($id);
        $user = $campagne->id_user;

        $clientdefault = User::find($user);

        return view('/gerercampagne/modifierCampagneMesure')->with('client', $client)->with('campagne', $campagne)->with('clientdefault', $clientdefault);

    }


    public function modifierCampagneMesureConfirm($id)
    {

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

        $campagne->update();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été modifié !";

        $listecampagne = campagnemesure::all();
        return view('/gerercampagne/ListeCampagneMesure')->with('campagne', $listecampagne)->with('alert', $alert)->with('messagealert', $messagealert);
    }


    public function listeBoitier()
    {
        $listeboitier = boitier::all();
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier);
    }

    public function creationBoitier()
    {
        return view('/gererboitier/creationBoitier');
    }


    public function ajouterBoitier()
    {
        
        $boitier = new boitier;
        $boitier->sigfox = request('sigfox');
        $boitier->statut = request('statut');

        $boitier->save();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été crée !";

        $listeboitier = boitier::all();
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier)->with('alert', $alert)->with('messagealert', $messagealert);
    }

    public function supprimerBoitier($id)
    {
        
        $boitier = boitier::find($id);

        if(!empty($boitier))
        {
        $boitier->delete();

        $alert = 1;
        $messagealert = "Le compte client a bien été supprimé !";

        $listeboitier = boitier::all();
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier)->with('alert', $alert)->with('messagealert', $messagealert);
        } else {

        $listeboitier = boitier::all();
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier);
        }

    }


    public function modifierBoitier($id)
    {

        $boitier = boitier::find($id);

        return view('/gererboitier/modifierBoitier')->with('boitier', $boitier);

    }


    public function modifierBoitierConfirm($id)
    {

        $boitier = boitier::find($id);
        $boitier->sigfox = request('sigfox');
        $boitier->alarmeBatterie = request('alarmeBatterie');
        $boitier->statut = request('statut');

        $boitier->update();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été modifié !";

        $listeboitier = boitier::all();
        return view('/gererboitier/ListeBoitier')->with('boitier', $listeboitier)->with('alert', $alert)->with('messagealert', $messagealert);
    }

}
