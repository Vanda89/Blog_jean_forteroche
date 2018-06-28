<?php

namespace P4blog\Models;

use P4blog\Utils\Database;
use PDO;

class PostsModel
{
    private $title;
    private $post_content;
    private $status;
    private $creation_date;
    private $update_date;
    private $User_id_user;

    public static function findAll()
    {
        $sql = "
            SELECT title, post_content, status, DATE_FORMAT(creation_date, '%d/%m/%Y') AS creation_date, update_date
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

    public static function find($idPost)
    {
        $sql = "
            SELECT title, post_content, status, DATE_FORMAT(creation_date, '%d/%m/%Y') AS creation_date, update_date
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

    public function add()
    {
        $sql = '
            INSERT INTO posts (title, post_content, status, creation_date)
            VALUES (:title, :postContent, :status, NOW())
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':title', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':postContent', $this->post_content, PDO::PARAM_STR);
        $pdoStatement->bindValue(':status', $this->status, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function update()
    {
        $sql = '
            UPDATE posts
            SET title = :newTitle, post_content = :newPostContent, status = :newStatus, update_date = NOW()
            WHERE id_post = (:idPost)
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect()($sql);
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':newTitle', $this->title, PDO::PARAM_STR);
        $pdoStatement->bindValue(':newPostContent', $this->post_content, PDO::PARAM_STR);
        $pdoStatement->bindValue(':newStatus', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':idPost', $this->id_post, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function archieve()
    {
        $sql = '
            UPDATE posts
            SET status = :newStatus
            WHERE id_post = (:idPost)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect()($sql);
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':newStatus', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':idPost', $this->id_post, PDO::PARAM_INT);
        $pdoStatement->execute();
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
    public function setTitle($title): string
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
    public function setPostContent($post_content): string
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
    public function setStatus($status): int
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
    public function setUpdateDate($update_date): int
    {
        $this->update_date = $update_date;

        return $this;
    }

    /**
     * Get the value of User_id_user.
     */
    public function getIdUser(): int
    {
        return $this->User_id_user;
    }

    /**
     * Set the value of User_id_user.
     *
     * @return self
     */
    public function setIdUser($User_id_user): int
    {
        $this->User_id_user = $User_id_user;

        return $this;
    }
}
