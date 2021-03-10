<?php

namespace App\Middleware;

use App\Framework\Http\Request;
use App\Framework\Middleware\Middleware;

class FirstMiddleware extends Middleware {
    public function handle(Request $request) {
        dump('FirstMiddleware',$request);
    }
}
