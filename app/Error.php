<?php

namespace App;


class Error
{
    const ERROR_DIR = __DIR__ . '/../tmp/errors';

    public function __construct()
    {
        ini_set("log_errors", 1);
        ini_set("error_log", self::ERROR_DIR . "/php-error.log");
    }

}