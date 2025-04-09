<?php

class Router {
    private $routes = [];

    public function addRoute($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function handle(Request $request, Response $response) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $request->method && $route['path'] === $request->uri) {
                call_user_func($route['handler'], $request, $response);
                return;
            }
        }
        $response->json(['error' => 'Route not found'], 404);
    }
}
