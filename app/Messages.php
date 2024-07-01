<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public $table = 'messages';

    public $fillable = [
        'name','email','phone','subject','message','readed'
    ];
}
