<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class boitier extends Model
{
    protected $fillable = [
        'sigfox',
        'alarmeBatterie',
        'statut'
    ];
}