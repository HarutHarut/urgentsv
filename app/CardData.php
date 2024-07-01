<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CardData extends Model
{
    public $table = 'card_data';

    public $fillable = [
        'img','title_en','title_ru','title_fr','description_en','description_ru','description_fr','card_number','recipient'
    ];
}
