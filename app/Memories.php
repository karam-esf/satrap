<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memories extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'model',
        'speed',
        'format',
        'capacity',
        'warranty',
        'image',
        'price',
        'explanation'
        ];
}
