<?php

namespace App;

class Model
{
    protected static $conn;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function setConnection()
    {
        self::$conn = $this->db->connect();
    }

    public function closeConnection()
    {
        return self::$conn = null;
    }
}