<?php

namespace Core;

class Router {
    protected $routes = [];

    public function add($method, $uri, $controller) {
        $pattern = preg_replace('#\{([^}]+)\}#', '([^/]+)', $uri);
        $pattern = "#^" . $pattern . "$#";

        preg_match_all('#\{([^}]+)\}#', $uri, $paramNames);
        $paramNames = $paramNames[1];

        $this -> routes[] = [
            "uri" => $uri,
            "pattern" => $pattern,
            "controller" => $controller,
            "method" => strtoupper($method),
            "paramNames" => $paramNames,
            "middleware" => null
        ];

        return $this;
    }

    public function get($uri, $controller) {
        return $this -> add("GET", $uri, $controller);
    }

    public function post($uri, $controller) {
        return $this -> add("POST", $uri, $controller);
    }

    public function only($key) {
        $this -> routes[array_key_last($this -> routes)]["middleware"] = $key;
    }

    public function route($uri, $method) {
        foreach ($this -> routes as $route) {
            if ($route["method"] === strtoupper($method) && preg_match($route["pattern"], $uri, $matches)) {
                array_shift($matches);

                $params = [];
                foreach ($route["paramNames"] as $idx => $name) {
                    $params[$name] = $matches[$idx] ?? null;
                }

                Middleware::resolve($route["middleware"]);

                return [
                    "controller" => $route["controller"],
                    "params" => $params
                ];
            }
        }

        return null;
    }

    public function previousUrl() {
        return $_SERVER["HTTP_REFERER"] ?? '/';
    }
}