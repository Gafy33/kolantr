<?php

namespace App\Http\Controllers;

use App\Models\sigfoxmessage;
use Illuminate\Http\Request;
use App\Models\campagnemesure;
use App\Models\boitier;
use App\Models\Statistique;

use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageGoogle;

class SigfoxMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return sigfoxmessage::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->input('device')) {
            return response()->json('ERREUR : champ device vide!', 500);
        }
        

        $sigfoxMessage = sigfoxmessage::create([
            'device' => $request->input('device'),
            'data'   => $request->input('data'),
            'time'   => $request->input('time'),
        ]);

            $binData = "";

            $info = $sigfoxMessage->data;

            // A modifier avec hugo pour savoir la longueur de la trame pour le boitier

            if(strlen($sigfoxMessage->data) == 1)
            {
                $boitier = boitier::where('adrSigfox', $sigfoxMessage->device)->first();
                
                if($sigfoxMessage->data == 1)
                {
                    $info2 = $boitier->adrSigfox;
                
                    $boitier->alarmeBatterie = $sigfoxMessage->data;
                    $boitier->update();

                    $info = "Problèmes Batterie";

                    // laisser place Armand envoie mail quand batterie est faible
	                    $users = User::all();

	                    foreach($users as $users)
	                    {
	                        if($users->role_id == 1 || $users->role_id == 2)
	                            {
	                                Mail::to($users)->bcc("kolantr2021snir@gmail.com")
	                                        ->queue(new MessageGoogle('Une batterie est faible : ' . $info2));
	                            }
	                    }
                    //

                    return (array(['info' => $info, 'info2' => $info2]));
    

                } elseif($sigfoxMessage->data == 0)
                {
                    $info2 = $boitier->adrSigfox;
                
                    $boitier->alarmeBatterie = NULL;
                    $boitier->update();

                    $info = "Batterie rempli";
                    return (array(['info' => $info, 'info2' => $info2]));
                }
            } else {

            if( strlen($sigfoxMessage->data) > 10){
            for ($i = 0; $i < strlen($sigfoxMessage->data); $i++) {
                // convertit chaque chiffre hexa en un quartet binaire
                $quartet = base_convert($sigfoxMessage->data[$i], 16, 2);
                $quartet = str_pad($quartet, 4, "0", STR_PAD_LEFT); // format fixe en 4 chiffres binaires
                $binData .= $quartet; // on concatène au résultat
            }

            $info2 = $binData;

            // extraction des données binaires
            $typeV = extraitChampBinaire($binData, 0, 1);
            $NbVehicule = extraitChampBinaire($binData, 1, 11);
            $NbEssieu = extraitChampBinaire($binData, 12, 13);
            $VitMoyenne = extraitChampBinaire($binData, 25, 8);
            $VitMax = extraitChampBinaire($binData, 33, 8);
            $VitesseInferieureOuEgale = extraitChampBinaire($binData, 41, 11);
            $VitesseLimitMoins20 = extraitChampBinaire($binData, 52, 11);
            $VitesseLimitPlus20 = extraitChampBinaire($binData, 63, 10);
            $VitesseLimitPlus30 = extraitChampBinaire($binData, 73, 9);
            $VitesseLimitPlus40 = extraitChampBinaire($binData, 82, 7);
            $VitesseLimitPlus50 = extraitChampBinaire($binData, 89, 7); //96

            $typeV = dechex($typeV);
            $NbVehicule = dechex($NbVehicule);
            $NbEssieu = dechex($NbEssieu);
            $VitMoyenne = dechex($VitMoyenne);
            $VitMax = dechex($VitMax);
            $VitesseInferieureOuEgale = dechex($VitesseInferieureOuEgale);
            $VitesseLimitMoins20 = dechex($VitesseLimitMoins20);
            $VitesseLimitPlus20 = dechex($VitesseLimitPlus20);
            $VitesseLimitPlus30 = dechex($VitesseLimitPlus30);
            $VitesseLimitPlus40 = dechex($VitesseLimitPlus40);
            $VitesseLimitPlus50 = dechex($VitesseLimitPlus50);

            $boitier = boitier::where('adrSigfox', $sigfoxMessage->device)->first();

            if(empty($boitier))
            {
                return response()->json('ERREUR : boitier inexistant', 500);
            }
            $campagne = campagnemesure::where('id_boitier', $boitier->id)->first();
            if(empty($campagne))
            {
                return response()->json('ERREUR : campagne inexistante', 500);
            }

            if($typeV == 0)
            {
                $type_vehicule = "voiture";
            } else {
                $type_vehicule = "camion";
            }
            // création du relevé
            $stat = Statistique::create([
                'campagneId' => $campagne->id,
                'typeV' => $type_vehicule,
                'timestamp' => date('Y-m-d H:i:s', $sigfoxMessage->time),
                'VitMax' => $VitMax,
                'NbEssieux' => $NbEssieu,
                'VitMoyenne' => $VitMoyenne,
                'NbVehicule' => $NbVehicule,
                'VitesseInferieureOuEgale' => $VitesseInferieureOuEgale,
                'VitesseLimitMoins20' => $VitesseLimitMoins20,
                'VitesseLimitPlus20' => $VitesseLimitPlus20,
                'VitesseLimitPlus30' => $VitesseLimitPlus30,
                'VitesseLimitPlus40' => $VitesseLimitPlus40,
                'VitesseLimitPlus50' => $VitesseLimitPlus50,
            ]);


        return (array(['info' => $info, 'info2' => $info2]));
        } else 
        {

        	// A modifier avec hugo pour savoir la longueur de la trame

            for ($i = 0; $i < strlen($sigfoxMessage->data); $i++) {
                // convertit chaque chiffre hexa en un quartet binaire
                $quartet = base_convert($sigfoxMessage->data[$i], 16, 2);
                $quartet = str_pad($quartet, 4, "0", STR_PAD_LEFT); // format fixe en 4 chiffres binaires
                $binData .= $quartet; // on concatène au résultat
            }

            $info = $binData;

            // extraction des données binaires
            $NbEssieu = extraitChampBinaire($binData, 0, 13);

            $NbEssieu = dechex($NbEssieu);

            $boitier = boitier::where('adrSigfox', $sigfoxMessage->device)->first();

            if(empty($boitier))
            {
                return response()->json('ERREUR : boitier inexistant', 500);
            }
            $campagne = campagnemesure::where('id_boitier', $boitier->id)->first();
            if(empty($campagne))
            {
                return response()->json('ERREUR : campagne inexistante', 500);
            }

            // création du relevé
            $stat = Statistique::create([
                'campagneId' => $campagne->id,
                'timestamp' => date('Y-m-d H:i:s', $sigfoxMessage->time),
                'NbEssieux' => $NbEssieu,
            ]);

        return (array(['info' => $info]));
        }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sigfoxmessage  $sigfoxmessage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sigfoxmessage  $sigfoxmessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sigfoxmessage $sigfoxmessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sigfoxmessage  $sigfoxmessage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sigfoxmessage $sigfoxmessage)
    {
        //
    }
}

function extraitChampBinaire($chaine, $index, $taille)
{
    $bin = substr($chaine, $index, $taille);
    if (strpos($bin, "0") === false) {
        // aucun zéro trouvé => tous bits à 1 => NULL
        $val = null;
    } else {
        $val = base_convert($bin, 2, 10);
    }
    return $val;
}