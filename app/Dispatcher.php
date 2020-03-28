<?php

namespace App;

use Swoole\Http\Response;

class Dispatcher {

    /** @var Router */
    protected $router;


    /**
     * Dispatcher constructor
     *
     * @param Router $router
     */
    public function __construct(Router $router) {
        $this->router = $router;
    }

    /**
     * @param Response $response
     * @throws \Exception
     */
    public function dispatch(Response $response) {
        $response->header("Content-Type", "application/json");

        $response->end(json_encode($this->router->forwardToAction()));
    }
}