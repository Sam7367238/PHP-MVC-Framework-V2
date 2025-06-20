<?php

namespace Core;

class Request {
	private static $instance = null;

	private function __construct(
		private $server,
		private $get,
		private $post,
		private $files,
		private $cookie,
		private $env
	) {}

	public static function create() {
		if (null === static::$instance) {
			static::$instance = new static(
				$_SERVER,
				$_GET,
				$_POST,
				$_FILES,
				$_COOKIE,
				$_ENV
			);
		}

		return static::$instance;
	}

	public function method() {
		return $this -> server["REQUEST_METHOD"];
	}

	public function uri() {
		return $this -> server["REQUEST_URI"];
	}

	public function postParams($name) {
		return $this -> post[$name];
	}
}