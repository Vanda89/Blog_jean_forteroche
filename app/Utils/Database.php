<?php

class Database
{
    public function dbConnect()
    {
      try {
        $db = new PDO('mysql:host=localhost;dbname=blog_ecrivain;charset=utf8', 'blog_ecrivain', 'blog_ecrivain');
        return $db;
      } catch (Exception $e) {
        echo ('Connexion à la db echouée : ' . $e->getMessage());
      }
    }
}
