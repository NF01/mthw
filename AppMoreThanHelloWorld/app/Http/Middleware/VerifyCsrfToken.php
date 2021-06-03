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
        'http://127.0.0.1:8000/api/question',
        'http://127.0.0.1:8000/api/reponse',
        'http://127.0.0.1:8000/api/image',

        'http://localhost/mthw/AppMoreThanHelloWorld/public/api/question',
        'http://localhost/mthw/AppMoreThanHelloWorld/public/api/reponse',
        'http://localhost/mthw/AppMoreThanHelloWorld/public/api/image',

    ];
}
