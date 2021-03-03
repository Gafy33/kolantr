<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Statistique extends Model
{
    protected $fillable = [
        'typeV',
        'DateStat',
        'HeureStat',
        'vitMoyenne',
        'nbVehicule',
        'VitesseInferieurOuEgale',
        'VitesseLimitMoins20',
        'VitesseLimitplus20',
        'VitesseLimitMoins30',
        'VitesseLimitMoins40',
        'VitesseLimitMoins50',
        'id_CampagneMesure'
    ];
}
