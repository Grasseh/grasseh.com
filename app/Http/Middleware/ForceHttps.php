<?php

// https://stackoverflow.com/questions/28402726/laravel-5-redirect-to-https
namespace MyApp\Http\Middleware;

use Closure;

class ForceHttps {

    public function handle($request, Closure $next)
    {
            if (!$request->secure() && env('APP_ENV') === 'production') {
                return redirect()->secure($request->getRequestUri());
            }

            return $next($request);
    }
}
