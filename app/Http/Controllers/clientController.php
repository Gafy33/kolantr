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

use App\Models\demande;

use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;


class clientController extends Controller
{
    public function mescampagnesliste()
    {

        if (! auth()->check()) {
            return redirect('/login');
        }

        $listecampagne = campagnemesure::all();

        return view('/Client/listecampagneclient')->with('listecampagne', $listecampagne);
    }

    public function campagneconsultation($id)
    {
        if (! auth()->check()) {
            return redirect('/login');
        }

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
        fputs($f, $texte);

        foreach($stat as $data){
            if($data->campagneId == $campagne->id)
            $texte = $data->typeV .';' . $data->created_at .';'. $campagne->limitationvitesse .';'. $data->NbVehicule .';'.  $data->VitMoyenne .';'. $data->VitesseInferieureOuEgale .';'. $data->VitesseLimitMoins20 .';'. $data->VitesseLimitPlus20 .';'. $data->VitesseLimitPlus30 .';'. $data->VitesseLimitPLus40 .';'. $data->VitesseLimitPlus50 . "\n";
            fputs($f, $texte );
        }
        // fermeture
        fclose($f);

        $vitmax = 0;
        

        foreach($stat as $data)
        {
            if($data->VitMax > $vitmax )
            {
                $vitmax = $data->VitMax;
            }
        }

        $stat_true = 0;

        foreach($stat as $data){
            if($data->campagneId == $campagne->id)
            {
                if($data->typeV == "camion")
                {
                    $statVitMoyen_PL[] = $data->VitMoyenne;
                    $statHeureStat_PL[] = $data->created_at;
                    $statVitesseInferieurOuEgale_PL[] = $data->VitesseInferieureOuEgale;
                    $statVitesseLimitMoins20_PL[] = $data->VitesseLimitMoins20;
                    $statVitesseLimitPlus20_PL[] = $data->VitesseLimitPlus20;
                    $statVitesseLimitPlus30_PL[] = $data->VitesseLimitPlus30;
                    $statVitesseLimitPlus40_PL[] = $data->VitesseLimitPlus40;
                    $statVitesseLimitPlus50_PL[] = $data->VitesseLimitPlus50;
                } elseif($data->typeV == "voiture")
                {
                    $statVitMoyen_VL[] = $data->VitMoyenne;
                    $statHeureStat_VL[] = $data->created_at;
                    $statVitesseInferieurOuEgale_VL[] = $data->VitesseInferieureOuEgale;
                    $statVitesseLimitMoins20_VL[] = $data->VitesseLimitMoins20;
                    $statVitesseLimitPlus20_VL[] = $data->VitesseLimitPlus20;
                    $statVitesseLimitPlus30_VL[] = $data->VitesseLimitPlus30;
                    $statVitesseLimitPlus40_VL[] = $data->VitesseLimitPlus40;
                    $statVitesseLimitPlus50_VL[] = $data->VitesseLimitPlus50;
                }

                $stat_true = 1;
            }
            else
            {
                $stat_true = 0;
            }
        }

        if($stat_true == 1)
        {
            if($statVitMoyen_PL == NULL){

                    $statVitMoyen_PL = NULL;
                    $statHeureStat_PL = NULL;
                    $statVitesseInferieurOuEgale_PL = NULL;
                    $statVitesseLimitMoins20_PL = NULL;
                    $statVitesseLimitPlus20_PL = NULL;
                    $statVitesseLimitPlus30_PL = NULL;
                    $statVitesseLimitPlus40_PL = NULL;
                    $statVitesseLimitPlus50_PL = NULL;

                return view('/Client/consultationcampagne')->with('campagne', $campagne)->with('stat_true', $stat_true)->with('vitmax', $vitmax)->with('stat', $stat)->with('statVitMoyen_PL', $statVitMoyen_PL)->with('statHeureStat_PL', $statHeureStat_PL)->with('statVitesseInferieurOuEgale_PL', $statVitesseInferieurOuEgale_PL)->with('statVitesseLimitMoins20_PL', $statVitesseLimitMoins20_PL)->with('statVitesseLimitPlus20_PL', $statVitesseLimitPlus20_PL)->with('statVitesseLimitPlus30_PL', $statVitesseLimitPlus30_PL)->with('statVitesseLimitPlus40_PL', $statVitesseLimitPlus40_PL)->with('statVitesseLimitPlus50_PL', $statVitesseLimitPlus50_PL)->with('statVitMoyen_VL', $statVitMoyen_VL)->with('statHeureStat_VL', $statHeureStat_VL)->with('statVitesseInferieurOuEgale_VL', $statVitesseInferieurOuEgale_VL)->with('statVitesseLimitMoins20_VL', $statVitesseLimitMoins20_VL)->with('statVitesseLimitPlus20_VL', $statVitesseLimitPlus20_VL)->with('statVitesseLimitPlus30_VL', $statVitesseLimitPlus30_VL)->with('statVitesseLimitPlus40_VL', $statVitesseLimitPlus40_VL)->with('statVitesseLimitPlus50_VL', $statVitesseLimitPlus50_VL);

            } elseif($statVitMoyen_VL == NULL)
            {

                    $statVitMoyen_VL = NULL;
                    $statHeureStat_VL = NULL;
                    $statVitesseInferieurOuEgale_VL = NULL;
                    $statVitesseLimitMoins20_VL = NULL;
                    $statVitesseLimitPlus20_VL = NULL;
                    $statVitesseLimitPlus30_VL = NULL;
                    $statVitesseLimitPlus40_VL = NULL;
                    $statVitesseLimitPlus50_VL = NULL;

                return view('/Client/consultationcampagne')->with('campagne', $campagne)->with('stat_true', $stat_true)->with('vitmax', $vitmax)->with('stat', $stat)->with('statVitMoyen_PL', $statVitMoyen_PL)->with('statHeureStat_PL', $statHeureStat_PL)->with('statVitesseInferieurOuEgale_PL', $statVitesseInferieurOuEgale_PL)->with('statVitesseLimitMoins20_PL', $statVitesseLimitMoins20_PL)->with('statVitesseLimitPlus20_PL', $statVitesseLimitPlus20_PL)->with('statVitesseLimitPlus30_PL', $statVitesseLimitPlus30_PL)->with('statVitesseLimitPlus40_PL', $statVitesseLimitPlus40_PL)->with('statVitesseLimitPlus50_PL', $statVitesseLimitPlus50_PL)->with('statVitMoyen_VL', $statVitMoyen_VL)->with('statHeureStat_VL', $statHeureStat_VL)->with('statVitesseInferieurOuEgale_VL', $statVitesseInferieurOuEgale_VL)->with('statVitesseLimitMoins20_VL', $statVitesseLimitMoins20_VL)->with('statVitesseLimitPlus20_VL', $statVitesseLimitPlus20_VL)->with('statVitesseLimitPlus30_VL', $statVitesseLimitPlus30_VL)->with('statVitesseLimitPlus40_VL', $statVitesseLimitPlus40_VL)->with('statVitesseLimitPlus50_VL', $statVitesseLimitPlus50_VL);

            }else{
                return view('/Client/consultationcampagne')->with('campagne', $campagne)->with('stat_true', $stat_true)->with('vitmax', $vitmax)->with('stat', $stat)->with('statVitMoyen_PL', $statVitMoyen_PL)->with('statHeureStat_PL', $statHeureStat_PL)->with('statVitesseInferieurOuEgale_PL', $statVitesseInferieurOuEgale_PL)->with('statVitesseLimitMoins20_PL', $statVitesseLimitMoins20_PL)->with('statVitesseLimitPlus20_PL', $statVitesseLimitPlus20_PL)->with('statVitesseLimitPlus30_PL', $statVitesseLimitPlus30_PL)->with('statVitesseLimitPlus40_PL', $statVitesseLimitPlus40_PL)->with('statVitesseLimitPlus50_PL', $statVitesseLimitPlus50_PL)->with('statVitMoyen_VL', $statVitMoyen_VL)->with('statHeureStat_VL', $statHeureStat_VL)->with('statVitesseInferieurOuEgale_VL', $statVitesseInferieurOuEgale_VL)->with('statVitesseLimitMoins20_VL', $statVitesseLimitMoins20_VL)->with('statVitesseLimitPlus20_VL', $statVitesseLimitPlus20_VL)->with('statVitesseLimitPlus30_VL', $statVitesseLimitPlus30_VL)->with('statVitesseLimitPlus40_VL', $statVitesseLimitPlus40_VL)->with('statVitesseLimitPlus50_VL', $statVitesseLimitPlus50_VL);
            }
        } elseif($stat_true == 0)
        {
            return view('/Client/consultationcampagne')->with('campagne', $campagne)->with('stat_true', $stat_true);
        }
    }


}