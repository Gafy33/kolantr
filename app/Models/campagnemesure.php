<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class campagnemesure extends Model
{
    protected $fillable = [
        'limitationvitesse',
        'id_user',
        'DebutCampagne',
        'FinCampagne',
        'adresseCampagne',
        'latitudecampagne',
        'longitudeCampagne',
        'statut',
        'codePostal',
        'ville',
        'numeroRoute',
        'Direction'
    ];
}