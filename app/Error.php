<?php

namespace App;


class Error
{
    private $errorsDir = __DIR__ . '/../tmp/errors';

    public function __construct()
    {
        ini_set("log_errors", 1);
        ini_set("error_log", $this->errorsDir . "/php-error.log");
    }

}