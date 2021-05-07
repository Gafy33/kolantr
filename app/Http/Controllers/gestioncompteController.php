<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\boitier;
use App\Models\demande;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;

class gestioncompteController extends Controller
{



	//
	//
	// Gestion Client
	//
	//

	//methode qui hash le mot de passe
	protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


	//Afficher la page inscription client
    public function ajouterClientget()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        return view('/gerercompte/inscription');
    }


    //Afficher la page inscription Admin/Technicien
    public function ajouterAdminTechnicienget()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        return view('/gerercompte/inscriptionAdmin');
    }
    

    //Afficher la liste des clients
    public function listeClient()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $listeclient = User::all();
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

        return view('/gerercompte/ListeClient')->with('client', $listeclient)->with('alarme', $alarme)->with('alarme_popup', $alarme_popup);
    }

    //Ajouter Client avec Eloquent
    public function ajouterClient(Request $request)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

        $email_existant = User::where('email', $request['email'])->first();

        if(!empty($email_existant))
        {
            $alert = 1;
            $messagealert = "L'adresse mail existe deja !";

            return view('/gerercompte/inscription')->with('alert', $alert)->with('messagealert', $messagealert);

        }

        $client = new User;
        $client->email = $request['email'];
        $client->role_id = 2;
        $client->name = $request['name'];
        $client->password = Hash::make($request['password']);
        $client->prenom = $request['prenom'];
        $client->identifiant = $request['identifiant'];
        $client->numeroTel = $request['numeroTel'];
        $client->adresseClient = $request['adresseClient'];
        $client->codePostal = $request['codePostal'];
        $client->ville = $request['ville'];
        $client->region = $request['region'];
        $client->preference = "theme_dark";

        if( $request['entreprise'] == "oui") {
            $client->nomEntreprise = $request['entreprise'];
            $client->nomEntreprise = $request['nomEntreprise'];
        }

        Mail::to($client)->bcc("kolantr2021snir@gmail.com")
            ->queue(new MessageGoogle($request->all()));

        $client->save();

        return redirect()->route('listeClientalert_path', ['alert' => 1]);
    }


    //Supprimer Client avec Eloquent
    public function supprimerClient($id)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

        $client = User::find($id);

        $client->delete();

        return redirect()->route('listeClientalert_path', ['alert' => 3]);
    }

    //Affichage de la page Modifier client
     public function modifierClient($id)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

        $client = User::find($id);

        return view('/gerercompte/ModifierClient')->with('client', $client);

    }

    //Modifier Client avec Eloquent
    public function modifierClientConfirm($id)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

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




    //
	//
	// Gestion Admin / Technicien
	//
	//


    //Afficher la liste Admin / Technicien
    public function listeAdminTechnicienmodifier()
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $listeclient = User::all();
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
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient)->with('alarme', $alarme)->with('alarme_popup', $alarme_popup);
    }


    //Ajouter Admin / Technicien avec Eloquent
    public function ajouterAdminTechnicien(Request $request)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

        $email_existant = User::where('email', $request['email'])->first();

        if(!empty($email_existant))
        {
            $alert = 1;
            $messagealert = "L'adresse mail existe deja !";

            return view('/gerercompte/ListeAdminTechnicien')->with('alert', $alert)->with('messagealert', $messagealert);

        }

        $client = new User;
        $client->email = $request['email'];
        $client->role_id = $request['role'];
        $client->name = $request['name'];
        $client->prenom = $request['prenom'];
        $client->password = Hash::make($request['password']);
        $client->identifiant = $request['identifiant'];
        $client->preference = "theme_dark";

        $client->save();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été crée !";

        Mail::to($client)->bcc("kolantr2021snir@gmail.com")
            ->queue(new MessageGoogle($request->all()));

        $listeclient = User::all();
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient)->with('alert', $alert)->with('messagealert', $messagealert);
    }

    //Supprimer Admin / Technicien avec Eloquent
    public function supprimerAdminTechnicien($id)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

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

    //Afficher la page Modifier Admin / Technicien
    public function modifierAdminTechnicien($id)
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

        $client = User::find($id);

        return view('/gerercompte/ModifierAdminTechnicien')->with('client', $client);

    }


    //Modifier Admin / Technicien avec Eloquent
    public function modifierAdminTechnicienConfirm($id)
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

        $client = User::find($id);
        $client->email = request('email');
        $client->name = request('name');
        $client->prenom = request('prenom');
        $client->role_id = request('role');

        $client->update();

        $alert = 1;
        $messagealert = "Le compte Admin / Technicien a bien été modifié !";

        $listeclient = User::all();
        return view('/gerercompte/ListeAdminTechnicien')->with('client', $listeclient)->with('alert', $alert)->with('messagealert', $messagealert);
    }
}