<?php

class Router
{
    private $routes = [];

    public function get($path, $handler)
    {
        $this->addRoute('GET', $path, $handler);
    }

    public function post($path, $handler)
    {
        $this->addRoute('POST', $path, $handler);
    }

    private function addRoute($method, $path, $handler)
    {
        $this->routes[$method][$this->normalize($path)] = $handler;
    }

    public function dispatch()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $scriptName = dirname($_SERVER['SCRIPT_NAME']);
        if ($scriptName !== '/') {
            $uri = preg_replace('#^' . preg_quote($scriptName) . '#', '', $uri);
        }

        $path = $this->normalize($uri ?: '/');
        $method = $_SERVER['REQUEST_METHOD'];

        if (!isset($this->routes[$method][$path])) {
            http_response_code(404);
            echo 'Página no encontrada';
            return;
        }

        list($controllerName, $action) = explode('@', $this->routes[$method][$path]);
        $controller = new $controllerName();
        $controller->$action();
    }

    private function normalize($path)
    {
        return rtrim($path, '/') ?: '/';
    }
}
