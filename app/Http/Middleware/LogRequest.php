<?php

// https://stackoverflow.com/questions/28402726/laravel-5-redirect-to-https
namespace App\Http\Middleware;

use Closure;
use Log;

class LogRequest {

    public function handle($request, Closure $next)
    {
        $object = ['path' => $request->path(), 'ip' => $request->ip()];
        Log::info(json_encode($object));
        return $next($request);
    }
}
