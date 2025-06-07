<?php

namespace Core;

abstract class AbstractController {
	protected $request = null;

	public function render($template, $variables = []) {
		extract($variables);

		$content = require(BASE_PATH . "/views/$template.php");
		$response = new Response($content);

		return $response;
	}

	public function setRequest($request) {
		$this -> request = $request;
	}
}