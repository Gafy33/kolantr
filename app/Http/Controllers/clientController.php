<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Traits\VoyagerUser;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

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

        $nom_file = 'resultcmesure.csv';

        if( file_exists('csv/' .$nom_file) == 1 )
        {
            unlink('csv/' . $nom_file);
        }

        $vit_m_20 = $campagne->limitationvitesse - 20;
        $vit_p_20 = $campagne->limitationvitesse + 20;
        $vit_p_30 = $campagne->limitationvitesse + 30;
        $vit_p_40 = $campagne->limitationvitesse + 40;
        $vit_p_50 = $campagne->limitationvitesse + 50;

        $f = fopen('csv/' . $nom_file, "x+");
        $texte = 'Type de véhicule ; Heure ; Limité à ' . 'km/h;Nombre de véhicule qui sont passés :;La vitesse Moyenne des véhicules :;Nombre de véhicules inférieure ou égale à ' . $campagne->limitationvitesse . ' km/h :;Nombre de véhicules inférieure à ' . $vit_m_20 . 'km/h :;Nombre de véhicules supérieur à ' . $vit_p_20 . ' km/h :;Nombre de véhicules supérieur à ' . $vit_p_30 .' km/h :;Nombre de véhicules supérieur à ' . $vit_p_40 . ' km/h :;Nombre de véhicules supérieur à ' . $vit_p_50 . ' km/h :' . "\n";
        // écriture
        fputs($f, $texte );

        foreach($stat as $data){
            if($data->id_CampagneMesure == $campagne->id)
            $texte = $data->typeV .';' . $data->HeureStat .';'. $data->NbVehicule .';'. $campagne->limitationvitesse .';'.  $data->vitMoyenne .';'. $data->VitesseInferieurOuEgale .';'. $data->VitesseLimitMoins20 .';'. $data->VitesseLimitplus20 .';'. $data->VitesseLimitMoins30 .';'. $data->VitesseLimitMoins40 .';'. $data->VitesseLimitMoins50 . "\n";
            fputs($f, $texte );
        }
        // fermeture
        fclose($f);


        foreach($stat as $data){
            if($data->id_CampagneMesure == $campagne->id)
            {
                $statVitMoyen[] = $data->vitMoyenne;
                $statHeureStat[] = $data->HeureStat;
                $statVitesseInferieurOuEgale[] = $data->VitesseInferieurOuEgale;
                $statVitesseLimitMoins20[] = $data->VitesseLimitMoins20;
                $statVitesseLimitplus20[] = $data->VitesseLimitplus20;
                $statVitesseLimitMoins30[] = $data->VitesseLimitMoins30;
                $statVitesseLimitMoins40[] = $data->VitesseLimitMoins40;
                $statVitesseLimitMoins50[] = $data->VitesseLimitMoins50;
            }
        }


        return view('/Client/consultationcampagne')->with('campagne', $campagne)->with('statDate', $statDate)->with('statVitMoyen', $statVitMoyen)->with('statHeureStat', $statHeureStat)->with('statVitesseInferieurOuEgale', $statVitesseInferieurOuEgale)->with('statVitesseLimitMoins20', $statVitesseLimitMoins20)->with('statVitesseLimitplus20', $statVitesseLimitplus20)->with('statVitesseLimitMoins30', $statVitesseLimitMoins30)->with('statVitesseLimitMoins40', $statVitesseLimitMoins40)->with('statVitesseLimitMoins50', $statVitesseLimitMoins50);

    }
}