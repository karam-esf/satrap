<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charger extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'mobile',
        'color',
        'ampere',
        'lenght',
        'inputVoltage',
        'warranty',
        'image',
        'price',
        'explanation'
        ];
}
