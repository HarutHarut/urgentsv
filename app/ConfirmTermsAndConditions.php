<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TermsAndConditionsItems;
use App\User;

class ConfirmTermsAndConditions extends Model
{
    public $table = 'confirm_terms_and_conditions';

    public $fillable = [
        'user_id','terms_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function term()
    {
        return $this->hasOne(TermsAndConditionsItems::class, 'id', 'terms_id');
    }
}
