<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Cities;
use App\Factures;

class Order extends Model
{
    public $table = 'orders';

    public $fillable = [
        'service_en','service_ru','service_fr','client_name_en','client_name_ru','client_name_fr','phone','address_en','address_ru','address_fr','user_id','price','status_en','status_ru','status_fr','description_en','description_ru','description_fr', 'type', 'material_price', 'has_tax'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function facture()
    {
        return $this->hasOne(Factures::class, 'order_id', 'id');
    }

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }

}
