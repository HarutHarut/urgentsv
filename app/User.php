<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\ConfirmTermsAndConditions;
use App\Order;
use App\UserOptions;
use App\UserOptionsDocs;
use App\Cities;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'confirm', 'llc', 'img', 'phone', 'role', 'city_id', 'job_title', 'card_data'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function confirm()
    {
        return $this->hasOne(ConfirmTermsAndConditions::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function options()
    {
        return $this->hasOne(UserOptions::class, 'user_id', 'id');
    }

    public function docs()
    {
        return $this->hasOne(UserOptionsDocs::class, 'user_id', 'id');
    }

    public function city()
    {
        return $this->hasOne(Cities::class, 'id', 'city_id');
    }
}
