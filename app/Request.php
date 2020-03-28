<?php

namespace App;

use Swoole\Http\Request as SwooleRequest;

class Request extends SwooleRequest {

    /** @var SwooleRequest */
    public $swooleRequest;

    /**
     * Request constructor.
     * @param SwooleRequest $request
     */
    public function __construct(SwooleRequest $request) {
        $this->swooleRequest = $request;
    }

    /**
     * @return mixed
     */
    public function getMethod() {
        return $this->swooleRequest->server['request_method'];
    }

    /**
     * @return bool
     */
    public function isGet() {
        return strtolower($this->getMethod()) === 'get';
    }

    /**
     * @return bool
     */
    public function isPost() {
        return strtolower($this->getMethod()) === 'post';
    }

    /**
     * @return bool
     */
    public function isPut() {
        return strtolower($this->getMethod()) === 'put';
    }

    /**
     * @return string
     */
    public function getRequestUri() {
        return $this->swooleRequest->server['request_uri'];
    }

    /**
     * @return string
     */
    public function getPathInfo() {
        return $this->swooleRequest->server['path_info'];
    }

    /**
     * @return string
     */
    public function getRequestTime() {
        return $this->swooleRequest->server['request_time'];
    }

    /**
     * @return string
     */
    public function getServerProtocol() {
        return $this->swooleRequest->server['server_protocol'];
    }

    /**
     * @return int
     */
    public function getServerPort() {
        return $this->swooleRequest->server['server_port'];
    }

    /**
     * @return int
     */
    public function getRemotePort() {
        return $this->swooleRequest->server['remote_port'];
    }

    /**
     * @return array
     */
    public function getCookie() {
        return $this->swooleRequest->cookie;
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return $this->swooleRequest->header;
    }
}