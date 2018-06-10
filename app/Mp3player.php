<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mp3player extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'capacity',
        'warranty',
        'timeWork',
        'image',
        'price',
        'explanation'
    ];
}
