<?php

namespace Core;

class Response {
	const NOT_FOUND = 404;
	const FORBIDDEN = 403;
	const UNAUTHORIZED = 401;

	public function __construct(
		private $content = '',
		private $status = 200,
		private $headers = [],
	) {
		http_response_code($status);
	}

	public function send() {
		echo $this -> content;
	}

	public static function redirect($path) {
		header("Location: $path");
		exit();
	}
}