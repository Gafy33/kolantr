<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\campagnemesure;
use App\Models\boitier;

use App\Models\demande;

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

        if(Auth::user()->hasRole('admin') or Auth::user()->hasRole('technicien')){
        $alarme = boitier::all();

        $alarme_popup = NULL;

        foreach($alarme as $alarmes)
        {
            if(!empty($alarmes->alarmeBatterie))
            {
                $alarme_popup = 1;
            }
        }

            $nb_boitier = 0;
            $nb_campagne = 0;
            $nb_compte = 0;
            $nb_client = 0;
            $nb_admin = 0;
            $nb_technicien = 0;
            $camp_cours = 0;
            $camp_fini = 0;
            $boiter_utiliser = 0;
            $boitier_repos = 0;

            $boitier = boitier::all();
            foreach($boitier as $boitiers)
            {
                $nb_boitier = $nb_boitier + 1;
                if ($boitiers->statut == "non utilisé") {
                    $boitier_repos = $boitier_repos + 1;
                }else{
                    $boiter_utiliser = $boiter_utiliser + 1;
                }
            }

            $campagne = campagnemesure::all();
            foreach($campagne as $campagnes)
            {
                $nb_campagne = $nb_campagne + 1;
                if ($boitiers->statut == "en cous") {
                    $camp_cours = $camp_cours + 1;
                }else{
                    $camp_fini = $camp_fini + 1;
                }
            }

            $user = User::all();
            foreach($user as $users)
            {
                $nb_compte = $nb_compte + 1;
                if ($users->role == 1) {
                    $nb_admin = $nb_admin + 1;
                }else if($users->role == 2){
                    $nb_client = $nb_client + 1;
                }else{
                    $nb_technicien = $nb_technicien +1;
                }
            }

            return view('/accueil')->with('alarme', $alarme)->with('alarme_popup', $alarme_popup)->with("nb_compte", $nb_compte)->with("nb_admin", $nb_admin)->with("nb_client", $nb_client)->with("nb_technicien", $nb_technicien)->with("nb_campagne", $nb_campagne)->with("camp_fini", $camp_fini)->with("camp_cours", $camp_cours)->with("nb_boitier", $nb_boitier)->with("boitier_repos", $boitier_repos)->with("boiter_utiliser", $boiter_utiliser);
        }
        else
        {

            $id = Auth::user()->id;

            $campagne = campagnemesure::where('id_user', $id)->first();

            $nb_campagne = 0;
            $nb_camp_cours = 0;
            $nb_camp_fini = 0;

            $foreach($campagne as $campagnes){
                $nb_campagne = $nb_campagne + 1;
                if($campagnes->statut == "en cours"){
                    $nb_camp_cours = $nb_camp_cours + 1;
                } else {
                    $nb_camp_fini = $nb_camp_fini + 1;
                }
            }
            return view('/accueil')->with('alarme', $alarme)->with('alarme_popup', $alarme_popup)->with('nb_campagne', $nb_campagne)->with('nb_camp_cours', $nb_camp_cours)->with('nb_camp_fini', $nb_camp_fini);
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }


    public function liste()
    {
        $listecampagne = campagnemesure::all();
        $listeboitier = boitier::all();
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

        return view('/liste')->with('campagne', $listecampagne)->with('listeboitier', $listeboitier)->with('listeclient', $listeclient)->with('alarme', $alarme)->with('alarme_popup', $alarme_popup);
    }

    public function boitierdelete($id)
    {

        $campagne = campagnemesure::where('id_boitier', $id)->first();
        if(!empty($campagne))
        {
        $campagne->id_boitier = NULL;
        $campagne->update();

        $boitier = boitier::find($id);
        $boitier->statut = "non utilisé";
        $boitier->update();
        }


		return redirect()->route('liste');
    }

    public function campagnedelete($id)
    {
        $campagne = campagnemesure::find($id);

        $campagne->delete();

        return redirect()->route('liste');
    }

    public function userdelete($id)
    {
        $campagne = campagnemesure::where('id_user', $id)->first();
        if(!empty($campagne))
        {
        $campagne->id_user = NULL;
        $campagne->update();
        }

        return redirect()->route('liste');
    }

    public function listemodifierstatutEncours($id)
    {
        $campagne = campagnemesure::find($id);
        $campagne->statut = "en cours";
        $campagne->update();

        return redirect()->route('liste');
    }

    public function listemodifierstatutfini($id)
    {
        $campagne = campagnemesure::find($id);
        $campagne->statut = "fini";
        $campagne->update();


        return redirect()->route('liste');
    }

    public function listeajouterboitier($id_campagne, $id_boitier)
    {
        $campagne = campagnemesure::find($id_campagne);
        $campagne->id_boitier = $id_boitier;
        $campagne->update();

        $boitier = boitier::find($id_boitier);
        $boitier->statut = "utilisé";
        $boitier->update();


        return redirect()->route('liste');
    }

}
