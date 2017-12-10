<?php

namespace App;

class Model
{
    protected static $conn;
    private $db;

    public function __construct()
    {
        $this->db = new Database();
        self::$conn = $this->setConnection();
    }

    public function setConnection()
    {
        return $this->db->connect();
    }

    public function closeConnection()
    {
        unset($this->db);
        return;
    }
}