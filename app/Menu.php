<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public $table = 'menus';

    public $fillable = [
        'title_en','title_ru','title_fr','position_id','img','url'
    ];
}
