<?php

namespace Core;

use Database\Connection;

class Kernel {
	protected $connection = null;

	public function __construct() {
		// $config = include BASE_PATH . "/Database/Config.php";

		// $this->connection = Connection::create($config['connectionString']);
	}

	public function handle($request) {
		$router = new Router();

		require(BASE_PATH . "/routes/web.php");
		
		return $router -> route($request -> uri(), $request -> method());
	}
}