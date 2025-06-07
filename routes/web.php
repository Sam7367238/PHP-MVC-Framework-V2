<?php

use app\Http\Controllers\BookController;

$router -> get("/books/{id}", [BookController::class, "show"]);