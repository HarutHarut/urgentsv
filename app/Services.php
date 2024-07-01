<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    public $table = 'services';

    public $fillable = [
        'title_en','title_ru','title_fr','description_en','description_ru','description_fr','img', 'position_id', 'icon', 'video', 'meta_title_en', 'meta_description_en', 'meta_title_fr', 'meta_description_fr'
    ];

    public function items(){
        return $this->hasMany(ServicesItems::class, 'service_id', 'id');
    }
}
