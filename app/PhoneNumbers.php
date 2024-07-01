<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhoneNumbers extends Model
{
    public $table = 'phone_numbers';

    public $fillable = [
        'phone','location'
    ];
}
