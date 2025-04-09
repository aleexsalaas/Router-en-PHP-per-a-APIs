<?php

function registerApiRoutes($router) {
    $router->addRoute('GET', '/api/hola', function($req, $res) {
        $res->json(['message' => 'Hola, que tal?']);
    });

    $router->addRoute('POST', '/api/nombre', function($req, $res) {
        $name = $req->parameters['name'] ?? 'anònim';
        $res->json(['message' => "Hola, $name!"]);
    });
}
