<?php

namespace Core;

abstract class AbstractController {
	protected $request = null;

	public function setRequest($request) {
		$this -> request = $request;
	}
}