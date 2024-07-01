<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactDatas extends Model
{
    public $table = 'contact_datas';

    public $fillable = [
        'value_en','value_ru','value_fr','type','position_id'
    ];
}
