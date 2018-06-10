<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flashmemory extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'modell',
        'color',
        'speed',
        'usb',
        'capacity',
        'warranty',
        'image',
        'price',
        'explanation'
    ];
}
