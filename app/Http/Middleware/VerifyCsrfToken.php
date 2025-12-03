<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * URIs yang dilewatkan dari CSRF.
     *
     * @var array<int, string>
     */
    protected $except = [
        'midtrans/callback',
    ];
}
