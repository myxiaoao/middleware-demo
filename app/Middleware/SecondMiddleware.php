<?php

namespace App\Middleware;

use App\Framework\Http\Request;
use App\Framework\Middleware\Middleware;

class SecondMiddleware extends Middleware {
    public function handle(Request $request) {
        if ($request->sessionId === md5(1)) {
            $request->user = ['name' => 'cooper', 'email' => 'cooper@gmail.com'];
        }

        dump('SecondMiddleware', $request);
    }
}
