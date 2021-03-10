<?php

namespace App\Framework;

use App\Framework\Http\Request;
use App\Framework\Middleware\MiddlewareStack;

class Application {
    public $middlewareStack;

    public function __construct() {
        $this->middlewareStack = new MiddlewareStack();
    }

    public function run() {
        $request = new Request(md5(1));
        $this->middlewareStack->handle($request);
        dump('app is running');
    }
}
