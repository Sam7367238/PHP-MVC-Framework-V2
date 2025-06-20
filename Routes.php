<?php

use App\Http\Controllers\BookController;

$router -> get("/books/{id}", [BookController::class, "show"]);