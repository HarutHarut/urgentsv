<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'https://intervention-urgence24-7.com/fr/account/set-status',
        'https://intervention-urgence24-7.com/fr/account/pay'
    ];
}
