<?php

class Database
{
  public function dbConnect()
  {
    $dbhost = getConfig('DB_HOST');
    $dbusername = getConfig('DB_USERNAME');
    $dbpassword = getConfig('DB_PASSWORD');
    $dbname = getConfig('DB_NAME');

    try {
      $db = new PDO("mysql:host={$dbhost};dbname={$dbname};charset=utf8", $dbusername, $dbpassword);
      return $db;
    } catch (Exception $e) {
      die ('Connexion à la db echouée : ' . $e->getMessage());
    }
  }
}
