<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterLinks extends Model
{
    public $table = 'footer_links';

    public $fillable = [
        'title_en','title_ru','title_fr','position_id', 'url'
    ];
}
