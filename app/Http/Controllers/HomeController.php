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


        return view('/accueil')->with('alarme', $alarme)->with('alarme_popup', $alarme_popup);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function informationCompte()
    {
        return view('/Compte');
    }

    public function informationCompteMAJ()
    {
        $client = User::find(request('id_user'));
        $client->preference = request('preference');
        $client->update();

        return redirect()->route('informationCompte');
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
