<?php

namespace P4blog\Models;

use P4blog\Utils\Database;
use PDO;

class PostsModel
{
    private $id_post;
    private $title;
    private $post_content;
    // status => 0 = sauvegardé mais pas publié, 1 = publié, 2 = archivé
    private $status;
    private $creation_date;
    private $update_date;
    private $User_id_user;

    /**
     * findAll.
     */
    public static function findAll()
    {
        $sql = "
            SELECT id_post, title, post_content, status, DATE_FORMAT(creation_date, '%d/%m/%Y') AS creation_date, update_date
            FROM posts
            ORDER BY creation_date DESC
        ";
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // Récupération des résultats sous forme de tableau d'objet PostsModel
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // On retourne les résultats
        return $results;
    }

    /**
     * find.
     *
     * @param mixed $idPost
     */
    public static function find($idPost)
    {
        $sql = "
            SELECT id_post, title, post_content, status, DATE_FORMAT(creation_date, '%d/%m/%Y') AS creation_date, update_date
            FROM posts
            WHERE id_post = (:idPost)
        ";
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idPost', $idPost, PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchObject(self::class);
    }

    /**
     * add.
     */
    public static function add($title, $content)
    {
        $sql = '
            INSERT INTO posts (title, post_content, status, creation_date)
            VALUES (:title, :postContent, 1, NOW())
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':title', $title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':postContent', $content, PDO::PARAM_STR);
        $pdoStatement->execute();
    }

    /**
     * archieve.
     */
    public static function archieve()
    {
        $sql = '
        UPDATE posts
        SET status = 2
        WHERE id_post = (:idPost)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect()($sql);
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idPost', self::id_post, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    /**
     * update.
     */
    public static function update($title)
    {
        $sql = '
            UPDATE posts
            SET title = :newTitle, post_content = :newPostContent, update_date = NOW()
            WHERE id_post = (:idPost)
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect()($sql);
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':newTitle', self::title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':newPostContent', self::post_content, PDO::PARAM_STR);
        $pdoStatement->bindValue(':idPost', self::id_post, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    /**
     * Get the value of id_post.
     */
    public function getId_post()
    {
        return $this->id_post;
    }

    /**
     * Get the value of title.
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * Set the value of title.
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of post_content.
     */
    public function getPostContent(): string
    {
        return $this->post_content;
    }

    /**
     * Set the value of post_content.
     *
     * @return self
     */
    public function setPostContent($post_content)
    {
        $this->post_content = $post_content;

        return $this;
    }

    /**
     * Get the value of status.
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * Set the value of status.
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of creation_date.
     */
    public function getCreationDate(): string
    {
        return $this->creation_date;
    }

    /**
     * Set the value of creation_date.
     *
     * @return self
     */
    public function setCreationDate(string $creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of update_date.
     */
    public function getUpdateDate(): int
    {
        return $this->update_date;
    }

    /**
     * Set the value of update_date.
     *
     * @return self
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }
}
