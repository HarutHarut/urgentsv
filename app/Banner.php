<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public $table = 'banners';

    public $fillable = [
        'title_en','title_ru','title_fr','img','url','description_en','description_ru','description_hy'
    ];
}
