<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicesItems extends Model
{
    public $table = 'services_items';

    public $fillable = [
        'title_en','title_ru','title_fr','position_id','description_en','description_ru','description_fr','price','service_id'
    ];

    public function service(){
        return $this->hasOne(Services::class, 'id', 'service_id');
    }
}
