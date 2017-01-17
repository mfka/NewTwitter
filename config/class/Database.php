<?php

class Database
{

    static public $conn = '';
    static private $db_port = 3306;
    static private $db_name = 'newTwitter';
    static private $db_host = 'localhost';
    static private $db_user = 'root';
    static private $db_pass = 'coderslab';

    public static function connect()
    {
        try {
            $conn = new PDO ('mysql:dbname=' . self::$db_name . ';dbhost=' . self::$db_host . ';port=' . self::$db_port, self::$db_user, self::$db_pass);
            return self::$conn = $conn;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public static function close()
    {
        self::$conn = null;

    }

}

