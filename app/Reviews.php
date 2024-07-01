<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public $table = 'reviews';

    public $fillable = [
        'name_en','name_ru','name_fr','img','rate','description_en','description_ru','description_hy','position_id'
    ];
}
