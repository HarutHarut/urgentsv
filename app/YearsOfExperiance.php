<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YearsOfExperiance extends Model
{
    public $table = 'years_of_experiances';

    public $fillable = [
        'title_en','title_ru','title_fr','img','url','description_en','description_ru','description_fr', 'year'
    ];
}
