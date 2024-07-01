<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translations extends Model
{
    public $table = 'translations';

    public $fillable = [
        'selector','translation','locale'
    ];
}
