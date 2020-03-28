<?php

namespace App;

use Controllers\MockController;

class Router {

    /** @var Request */
    protected $request;

    /** @var array */
    protected $routes;

    /**
     * @param Request $request
     * @return $this
     */
    public function process(Request $request) {
        $this->request = $request;

        echo date('c') . "| Requested info: {$this->request->getMethod()} {$this->request->getRequestUri()}" . PHP_EOL;

        return $this;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    public function forwardToAction()
    {
        $fileName = $this->routes[strtolower($this->request->getMethod())][$this->request->getRequestUri()] ?? null;

        if (!$fileName) {
            return [
                'error' => 'Not found',
                'code'  => 404,
            ];
        }

        return call_user_func([new MockController(), $fileName], $this->request);
    }

    /**
     * @param array $routes
     * @return $this
     */
    public function registerRoutes(array $routes) {
        $this->routes = $routes;

        return $this;
    }
}