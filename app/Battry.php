<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battry extends Model
{
    protected $fillable = [
        'id',
        'mobile',
        'kind',
        'capacity',
        'voltage',
        'price',
        'image',
        'warranty',
        'explanation',
    ];

}
