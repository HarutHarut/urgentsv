<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\User;

class UserOptionsDocs extends Authenticatable
{
    protected $fillable = [
        'user_id', 'document_indentie', 'doc_retro', 'extrait_kbis_doc', 'n_extrais_doc', 'assurance_doc', 'n_assurance', 'd_license_doc', 'd_n_license', 'date_experation'
    ];

    public function user()
    {
        return $this->hasOne(user::class, 'id', 'user_id');
    }
}
