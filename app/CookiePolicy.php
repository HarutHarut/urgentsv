<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CookiePolicy extends Model
{
    public $table = 'cookie_policy';

    public $fillable = [
        'description_en','description_ru','description_fr'
    ];
}
