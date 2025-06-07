<?php

namespace App\Http\Controllers;

use Core\AbstractController;

class BookController extends AbstractController {
	public function show($id) {
		echo "Book " . $id;
	}
}
