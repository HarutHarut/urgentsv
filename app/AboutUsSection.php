<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUsSection extends Model
{
    public $table = 'about_us_sections';

    public $fillable = [
        'title_en','title_ru','title_fr','sub_title_en','sub_title_ru','sub_title_fr','img','url','description_en','description_ru','description_fr'
    ];
}
