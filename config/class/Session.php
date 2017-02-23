<?php

/**
 * Created by PhpStorm.
 * User: mfka
 * Date: 15.12.16
 * Time: 22:47
 */
class Session
{
    public function __construct()
    {
        session_start();
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (isset ($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return false;
        }
    }

    public function delete($key)
    {
        if (isset ($_SESSION[$key])) {
            return $_SESSION[$key] = null;
        } else {
            return false;
        }
    }
}