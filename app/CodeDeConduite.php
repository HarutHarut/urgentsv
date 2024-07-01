<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CodeDeConduite extends Model
{
    public $table = 'code_de_conduite';

    public $fillable = [
        'description_en','description_ru','description_fr'
    ];
}
