<?php

namespace Core;

use App\Http\Middleware\Auth;

class Middleware {
    public const MAP = [
        "auth" => Auth::class
    ];

    public static function resolve($key) {
        if (!$key) {
            return;
        }

        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new \Exception("No matching middleware found for key $key.");
        }
        
        (new $middleware) -> handle();
    }
}