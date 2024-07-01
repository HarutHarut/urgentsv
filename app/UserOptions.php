<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class UserOptions extends Authenticatable
{
    protected $fillable = [
        'user_id', 'nationality', 'from', 'gender', 'province', 'address', 'emplesment', 'group_name', 'jordique', 'address_pec', 'social_card_number', 'tva_number', 'document_type', 'document_number', 'date_expiration', 'birth_day', 'civique'
    ];

    public function user()
    {
        return $this->hasOne(user::class, 'id', 'user_id');
    }
}
