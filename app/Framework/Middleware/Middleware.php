<?php

namespace App\Framework\Middleware;

use App\Framework\Http\Request;

abstract class Middleware {
    public function __invoke($next, $request) {
        $this->handle($request);

        return $next($request);
    }

    abstract public function handle(Request $request);
}
