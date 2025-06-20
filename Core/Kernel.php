<?php

namespace Core;

class Kernel {
	protected $connection = null;

	public function __construct() {
		// $config = include BASE_PATH . "/Database/Config.php";

		// $this->connection = Connection::create($config['connectionString']);
	}

	public function handle($request) {
		$router = new Router();

		require(BASE_PATH . "/Routes.php");
		
		$route = $router -> route($request -> uri(), $request -> method());

		if (!$route) {
			abort(404);
		}

		$controller = $route["controller"];
		$params = array_values($route["params"]);

		if (is_callable($controller)) {
			return call_user_func_array($controller, $params);
		}

		if (is_array($controller)) {
			$instance = new $controller[0];
			$method = $controller[1];

			if ($controller instanceof AbstractController) {
				$controller -> setRequest($request);
			}

			return call_user_func_array([$instance, $method], $params);
		}
	}
}