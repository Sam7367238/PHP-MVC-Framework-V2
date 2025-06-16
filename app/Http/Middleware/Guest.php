<?php

namespace App\Http\Middleware;

use Core\Response;

class Guest {
    public function handle() {
        if (isset($_SESSION["User"])) {
            abort(Response::FORBIDDEN);
        }
    }
}