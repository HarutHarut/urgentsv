<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ConfirmTermsAndConditions;

class TermsAndConditionsItems extends Model
{
    public $table = 'terms_and_conditions_items';

    public $fillable = [
        'title_en','title_ru','title_fr','description_en','description_ru','description_fr'
    ];

    public function confirm()
    {
        return $this->hasOne(ConfirmTermsAndConditions::class, 'terms_id', 'id');
    }
}
