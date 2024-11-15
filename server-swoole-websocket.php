<?php
require_once 'vendor/autoload.php';

use Swoole\Http\Request;
use Swoole\WebSocket\Server;

$server = new Server("0.0.0.0", 9501);

$connections = [];

$server->on("open", function (Server $server, Request $request) use (&$connections) {
    $dataArray = (new \PhpSwooleTest\ExampleService())->customers();
    $connections[$request->fd] = $request->fd;
    echo "Conectado: {$request->fd}\n";

    $server->push(
        $request->fd,
        json_encode([
            'status' => 'success',
            'user_id' => $request->fd,
            'data' => $dataArray
        ]));
});

$server->on("message", function (Server $server, Swoole\WebSocket\Frame $frame) use (&$connections) {

});

$server->on("close", function (Server $server, int $fd) use (&$connections) {
    unset($connections[$fd]);
});

$server->start();