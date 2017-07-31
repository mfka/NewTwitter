<?php

namespace App;

class Model
{
    protected static $conn;

    public function setConnection()
    {
        $db = new Database();
        self::$conn = $db->connect();
    }

    public function closeConnection()
    {
        return self::$conn = null;
    }
}