<?php

namespace Amido\ProfileService;

use Httpful\Request;

class Api {
    private $subscription_key;

    public function __construct($subscription_key) {
        $this->subscription_key = $subscription_key;
    }

    public function get($uri, $delegate_token = null) {
        $request = Request::get($uri)
            ->addHeader('ocp-apim-subscription-key', $this->subscription_key);

        if (isset($delegate_token)) {
            $request->addHeader('x-zumo-auth', $delegate_token);
        }

        return $request->send();
    }

    public function post($uri, $delegate_token, $body) {
        $request = Request::post($uri)
            ->addHeader('ocp-apim-subscription-key', $this->subscription_key)
            ->body(json_encode($body));

        if (isset($delegate_token)) {
            $request->addHeader('x-zumo-auth', $delegate_token);
        }

        return $request->send();
    }

    public function put($uri, $delegate_token, $body) {
        $request = Request::put($uri)
            ->addHeader('ocp-apim-subscription-key', $this->subscription_key)
            ->body(json_encode($body));

        if (isset($delegate_token)) {
            $request->addHeader('x-zumo-auth', $delegate_token);
        }

        return $request->send();
    }

    public function delete($uri, $delegate_token) {
        $request = Request::delete($uri)
            ->addHeader('ocp-apim-subscription-key', $this->subscription_key);

        if (isset($delegate_token)) {
            $request->addHeader('x-zumo-auth', $delegate_token);
        }

        return $request->send();
    }
} 