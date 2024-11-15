<?php

require_once 'vendor/autoload.php';

use Swoole\Http\Server;

$server = new Server("0.0.0.0", 9501);

$server->on("request", function ($request, $response) {
    // Defina o cabeçalho da resposta
    $response->header("Content-Type", "application/json");

    // Roteamento básico
    if ($request->server['request_uri'] == '/') {
        $response->end(file_get_contents(__DIR__ . '/public/index.php'));
    } else {
        $response->status(404);
        $response->end("404 Not Found");
    }
});

$server->start();