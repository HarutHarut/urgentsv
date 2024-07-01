<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocialAccounts extends Model
{
    public $table = 'social_accounts';

    public $fillable = [
        'icon','url','position_id'
    ];
}
