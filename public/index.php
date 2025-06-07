<?php

use Core\Kernel;
use Core\Request;

const BASE_PATH = __DIR__ . "/..";

spl_autoload_register(function($class) {
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    require(BASE_PATH . "/$class.php");
});

require(BASE_PATH . "/Core/Functions.php");

$request = Request::create();

$kernel = new Kernel();
$response = $kernel -> handle($request);

$response -> send();