<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    public $table = 'map_section';

    public $fillable = [
        'title_en','title_ru','title_fr','map','description_en','description_ru','description_fr'
    ];
}
