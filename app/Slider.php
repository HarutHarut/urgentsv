<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    public $table = 'sliders';

    public $fillable = [
        'title_en','title_ru','title_fr','img','url','description_en','description_ru','description_hy','position_id'
    ];
}
