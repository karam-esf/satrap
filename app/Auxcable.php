<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auxcable extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'lenght',
        'warranty',
        'image',
        'price',
        'explanation'
    ];
}
