<?php

namespace Amido\ProfileService;

use Httpful;

class ProfileServiceResult {
    public $code,
           $body;

    function __construct(Httpful\Response $response) {
        $this->code = $response->code;
        $this->body = $response->body;
    }
}