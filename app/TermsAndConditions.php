<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TermsAndConditions extends Model
{
    public $table = 'terms_and_conditions';

    public $fillable = [
        'description_en','description_ru','description_fr'
    ];
}
