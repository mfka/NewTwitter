<?php

namespace App;

class Database
{

    static private $dbPort;
    static private $dbName;
    static private $dbHost;
    static private $dbUser;
    static private $dbPass;

    public function __construct()
    {
        $data = file_get_contents(__DIR__ . '/../config/database.txt');

        preg_match_all('/^([^=]*)=(.*)$/m', $data, $matches);
        $data = array_combine($matches[1], $matches[2]);

        foreach ($data as $key => $value) {
            $key = 'db' . ucfirst($key);
            self::${$key} = $value;

        }
    }

    public function connect()
    {
        try {
            return new \PDO ('mysql:dbname=' . self::$dbName . ';dbhost=' . self::$dbHost . ';port=' . self::$dbPort, self::$dbUser, self::$dbPass);
        } catch (\PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }


}

