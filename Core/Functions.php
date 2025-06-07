<?php

use Core\Response;

function dd($value) {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    exit();
}

function abort($code = 404) {
    http_response_code($code);
    require(BASE_PATH . "/Views/Errors/$code.php");
    exit();
}

function authorize($condition, $status = Response::FORBIDDEN) {
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }
}

function views() {
    return BASE_PATH . "/Views";
}