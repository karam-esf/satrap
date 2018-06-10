<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carmp3 extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'facilities',
        'warranty',
        'image',
        'price',
        'explanation'
    ];
}
