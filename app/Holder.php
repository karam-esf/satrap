<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Holder extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'image',
        'warranty',
        'price',
        'explanation'
    ];
}
