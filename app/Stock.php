<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable =[
        'stuff_id',
        'group_id',
        'stock'
    ];
}
