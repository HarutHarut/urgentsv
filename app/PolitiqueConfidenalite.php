<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolitiqueConfidenalite extends Model
{
    public $table = 'politique_confidentalite';

    public $fillable = [
        'description_en','description_ru','description_fr'
    ];
}
