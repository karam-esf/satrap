<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guard extends Model
{
    protected $fillable =[
        'id',
        'mark',
        'material',
        'color',
        'image',
        'price',
        'explanation',
        'mobile'

    ];
}
