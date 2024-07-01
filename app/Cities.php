<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'name_en', 'name_ru', 'name_fr'
    ];
}
