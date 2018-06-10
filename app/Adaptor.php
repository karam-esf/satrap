<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adaptor extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'color',
        'warranty',
        'ampere',
        'inputVoltage',
        'mobile',
        'price',
        'image',
        'explanation'

    ];
}
