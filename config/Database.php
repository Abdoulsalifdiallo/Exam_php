<?php
class Database {
    private static $pdo = null;
    public static function getConnection() {
        if (self::$pdo === null) {
            $host = "localhost";
            $dbname = "gestion_clinique";
            $user = "root";
            $pass = "";
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8";
            self::$pdo = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$pdo;
    }
}
