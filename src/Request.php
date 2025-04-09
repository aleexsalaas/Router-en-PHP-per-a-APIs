<?php

class Request {
    public $method;
    public $uri;
    public $parameters = [];
    public $authToken;

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->uri = strtok($_SERVER['REQUEST_URI'], '?');
        $this->authToken = $this->getAuthToken();

        switch ($this->method) {
            case 'GET':
                $this->parameters = $_GET;
                break;
            case 'POST':
                parse_str(file_get_contents('php://input'), $this->parameters);
                break;
            case 'PUT':
            case 'DELETE':
                parse_str(file_get_contents('php://input'), $this->parameters);
                break;
        }
    }

    private function getAuthToken() {
        return $_SERVER['HTTP_AUTHORIZATION'] ?? null;
    }
}
