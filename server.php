<?php

use Swoole\Http\Server;
use App\Request;
use App\Router;
use App\Dispatcher;

$http = new Server("0.0.0.0", 9500);

require 'bootstrap/autoload.php';

$http->on('start', function ($server) {
    /** @var Server $server */
    echo "Http server is started at {$server->host}:{$server->port}" . PHP_EOL;
});

$http->on('request', function ($swooleRequest, $swooleResponse) {
    $request    = new Request($swooleRequest);
    $router     = (new Router())
        ->registerRoutes(require 'config/routes.php')
        ->process($request);
    $dispatcher = (new Dispatcher($router));

    $dispatcher->dispatch($swooleResponse);
});

$http->start();