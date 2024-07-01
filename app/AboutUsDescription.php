<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUsDescription extends Model
{
    public $table = 'about_us_descriptions';

    public $fillable = [
        'title_en','title_ru','title_fr','img','description_en','description_ru','description_fr'
    ];
}
