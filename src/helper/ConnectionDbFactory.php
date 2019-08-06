<?php 

namespace App\helper;

class ConnectionDbFactory {
    private static $pdo;
    private static $host = "localhost";
    private static $dbname = "slim_mobile";
    private static $username = "root";
    private static $password = "";

    public static function getConnection()
    {
        if(!isset(self::$pdo)){
            self::$pdo = new \PDO(
                "mysql:host=".self::$host."; dbname=".self::$dbname."; charset=utf8",
                self::$username, self::$password
            );
        }

        return self::$pdo;
    }
}