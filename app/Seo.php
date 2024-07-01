<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    public $table = 'seos';

    public $fillable = [
        'title_en','title_ru','title_fr','img','description_en','description_ru','description_fr'
    ];
}
