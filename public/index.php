<?php

require_once '../src/Request.php';
require_once '../src/Response.php';
require_once '../src/Router.php';
require_once '../routes/api.php';


$request = new Request();
$response = new Response();
$router = new Router();


registerApiRoutes($router);

if ($request->uri === '/' || $request->uri === '/index.php') {
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Inicio</title>
    </head>
    <body>
        <h1>Bienvenido a la API</h1>
        <p>Accede al formulario para enviar datos.</p>
        <a href="formulario.html">Ir al formulario</a>
    </body>
    </html>';
} else {
    $router->handle($request, $response);
}
