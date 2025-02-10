<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo($request)
    {
        // Redirect to login if the request does not expect a JSON response
        if (!$request->expectsJson()) {
            return route('login'); // Ensure 'login' route is defined in your routes file
        }
    }
}
