<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headphone extends Model
{
    protected $fillable = [
        'mark',
        'modell',
        'color',
        'call',
        'facilities',
        'capacity',
        'timeWork',
        'warranty',
        'price',
        'image',
        'explanation',
    ];
}
