<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'http://crud-api.test/insert-data',
        'http://crud-api.test/update-data/*',
        'http://crud-api.test/delete-data/*'
    ];
}
