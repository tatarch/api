<?php

namespace App\Database\Connectors;

use PDO;
use PDOException;

class MysqlConnector
{
    private static $connection;

    private function __construct()
    {
    }

    public static function getConnection(): PDO
    {
        $username = "root";
        $password = "";
        $database = "blog";
        $servername = "localhost";

        if (!empty(self::$connection)) {
            return self::$connection;
        }

        self::$connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return self::$connection;
    }
}
