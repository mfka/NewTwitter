<?php

class Database
{

    static public $conn;
    static private $dbPort;
    static private $dbName;
    static private $dbHost;
    static private $dbUser;
    static private $dbPass;

    public function __construct()
    {
        $data = file_get_contents(__DIR__ . '/../dbConnInfo.txt');
        preg_match_all('/^([^=]*)=\'([^\']*)\'$/m', $data, $matches);
        $data = array_combine($matches[1], $matches[2]);
        foreach ($data as $key => $value) {
            $key = 'db' . $key;
            self::${$key} = $value;

        }
    }

    public static function connect()
    {
        new Database();
        try {
            $conn = new PDO ('mysql:dbname=' . self::$dbName . ';dbhost=' . self::$dbHost . ';port=' . self::$dbPort, self::$dbUser, self::$dbPass);
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

