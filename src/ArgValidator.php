<?php

namespace Amido\ProfileService;


class ArgValidator {
    public static function validate_presence($arg, $name) {
        if (!isset($arg)) {
            throw new \InvalidArgumentException($name . ' must be supplied');
        }
    }
}