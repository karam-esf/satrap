<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speaker extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'facilities',
        'warranty',
        'timeWork',
        'kindBattery',
        'image',
        'price',
        'explanation'
    ];
}
