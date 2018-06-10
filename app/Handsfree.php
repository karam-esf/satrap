<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Handsfree extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'distance',
        'material',
        'timeStanby',
        'timeBattery',
        'typeConnection',
        'capacity',
        'warranty',
        'image',
        'price',
        'explanation',
    ];
}
