<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteData extends Model
{
    public $table = 'site_data';

    public $fillable = [
        'name_en','name_ru','name_fr','logo','favicon', 'map'
    ];
}
