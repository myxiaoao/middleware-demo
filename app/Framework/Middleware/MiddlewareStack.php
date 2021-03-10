<?php

namespace App\Framework\Middleware;

use App\Framework\Http\Request;
use App\Middleware\FirstMiddleware;
use App\Middleware\SecondMiddleware;
use App\Middleware\ThirdMiddleware;

class MiddlewareStack {
    public $top;
    public $stack = [
        FirstMiddleware::class,
        SecondMiddleware::class,
        ThirdMiddleware::class,
    ];

    public function __construct() {
        $this->top = static function($request) {
            dump('middleware done', $request);
        };
        $this->load();
    }

    public function load() {
        foreach ($this->stack as $middleware) {
            $this->add(new $middleware());
        }
    }

    public function add(Middleware $middleware) {
        $next = $this->top;
        $this->top = static function($request) use ($middleware, $next) {
            return $middleware($next, $request);
        };
    }

    public function handle(Request $request) {
        call_user_func($this->top, $request);
    }
}
