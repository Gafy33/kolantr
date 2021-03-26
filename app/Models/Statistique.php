<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Statistique extends Model
{
    protected $fillable = [
        'typeV',
        'VitMax',
        'NbEssieux',
        'VitMoyenne',
        'NbVehicule',
        'VitesseInferieureOuEgale',
        'VitesseLimitMoins20',
        'VitesseLimitPlus20',
        'VitesseLimitPlus30',
        'VitesseLimitPlus40',
        'VitesseLimitPlus50',
        'campagneId'
    ];
}
