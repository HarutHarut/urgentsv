<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $table = 'galleries';

    public $fillable = [
        'img'
    ];
}
