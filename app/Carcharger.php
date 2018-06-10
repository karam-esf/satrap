<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carcharger extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'inputVoltage',
        'cable',
        'warranty',
        'port',
        'image',
        'price',
        'explanation'
    ];
}
