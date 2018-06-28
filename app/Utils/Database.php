<?php

namespace P4blog\Utils;

class Database
{
    public static function dbConnect()
    {
        $dbhost = Config::getConfig('DB_HOST');
        $dbusername = Config::getConfig('DB_USERNAME');
        $dbpassword = Config::getConfig('DB_PASSWORD');
        $dbname = Config::getConfig('DB_NAME');

        try {
            $db = new \PDO("mysql:host={$dbhost};dbname={$dbname};charset=utf8", $dbusername, $dbpassword);

            return $db;
        } catch (Exception $e) {
            die('Connexion à la db echouée : '.$e->getMessage());
        }
    }
}
