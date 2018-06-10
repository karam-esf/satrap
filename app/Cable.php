<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cable extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'color',
        'warranty',
        'lenght',
        'mobile',
        'price',
        'image',
        'explanation'

    ];
}
