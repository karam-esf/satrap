<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Glass extends Model
{
    protected $fillable = [
        'id',
        'mark',
        'material',
        'color',
        'kind',
        'image',
        'price',
        'explanation',
        'mobile'];
 }
