<?php

namespace App\Http\Middleware;

use Core\Response;

class Auth {
    public function handle() {
        if (empty($_SESSION["User"])) {
            abort(Response::UNAUTHORIZED);
        }
    }
}