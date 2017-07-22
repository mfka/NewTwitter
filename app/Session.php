<?php

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