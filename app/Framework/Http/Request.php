<?php

namespace App\Framework\Http;

class Request {
    public $code = 200, $user, $sessionId;

    public function __construct($sessionId) {
        $this->sessionId = $sessionId;
    }
}
