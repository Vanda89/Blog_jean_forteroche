<?php

namespace P4blog\Models;

use P4blog\Utils\Database;
use PDO;

class CommentsModel
{
    private $author;
    private $comment_content;
    private $status;
    private $comment_date;
    private $comment_reported;
    private $update_date;
    private $Posts_id_post;
    private $User_id_user;

    public static function findAll()
    {
        $sql = '
            SELECT *
            FROM comments
            ORDER BY comment_date DESC
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // Récupération des résultats sous forme de tableau d'objet CommentsModel
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'CommentsModel');

        // On retourne les résultats
        return $results;
    }

    public static function find($idComment)
    {
        $sql = '
            SELECT *
            FROM comments
            WHERE id_comment = (:idComment)
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idComment', $idComment, PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchObject(self::class);
    }

    public function add()
    {
        $sql = '
            INSERT INTO comments (author, comment_content, status, comment_date, comment_reported)
            VALUES (:author, :commentContent, :status, NOW(), :noReported)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':title', $this->author, PDO::PARAM_STR);
        $pdoStatement->bindValue(':commentContent', $this->comment_content, PDO::PARAM_STR);
        $pdoStatement->bindValue(':status', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':noReported', $this->comment_reported, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function reported()
    {
        $sql = '
            UPDATE comments
            SET status = :newStatus, comment_reported = :reported
            WHERE id_comment = (:idComment)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':newStatus', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':reported', $this->comment_reported, PDO::PARAM_INT);
        $pdoStatement->bindValue(':idComment', $this->id_comment, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function validate()
    {
        $sql = '
            UPDATE comments
            SET status = :oldStatus, comment_reported = :noReported
            WHERE id_comment = (:idComment)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':oldStatus', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':noReported', $this->comment_reported, PDO::PARAM_INT);
        $pdoStatement->bindValue(':idComment', $this->id_comment, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public function delete()
    {
        $sql = '
            UPDATE comments
            SET status = :newStatus
            WHERE id_comment = (:idComment)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':newStatus', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':idComment', $this->id_comment, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    public static function findCommentsByPostId($idComment)
    {
        $sql = '
            SELECT *
            FROM comments
            INNER JOIN posts 
            ON id_comment = Posts_id_post         
            WHERE id_comment = :idComment
            ORDER BY comment_date DESC
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idComment', $idComment, PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    public static function findAllByReport()
    {
        $sql = '
            SELECT *
            FROM comments                
            WHERE comment_reported = 1
            ORDER BY comment_date DESC
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    // GETTERS AND SETTERS

    /**
     * Get the value of author.
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * Set the value of author.
     *
     * @return self
     */
    public function setAuthor(string $author)
    {
        $this->author = $author;

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
     * Get the value of comment_content.
     */
    public function getCommentContent(): string
    {
        return $this->comment_content;
    }

    /**
     * Set the value of comment_content.
     *
     * @return self
     */
    public function setCommentContent($comment_content): string
    {
        $this->comment_content = $comment_content;

        return $this;
    }

    /**
     * Get the value of comment_date.
     */
    public function getCommentDate(): string
    {
        return $this->comment_date;
    }

    /**
     * Set the value of comment_date.
     *
     * @return self
     */
    public function setCommentDate(string $comment_date)
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    /**
     * Get the value of comment_reported.
     */
    public function getCommentReported(): int
    {
        return $this->comment_reported;
    }

    /**
     * Set the value of comment_reported.
     *
     * @return self
     */
    public function setCommentReported($comment_reported): int
    {
        $this->comment_reported = $comment_reported;

        return $this;
    }

    /**
     * Get the value of update_date.
     */
    public function getUpdateDate(): string
    {
        return $this->update_date;
    }

    /**
     * Set the value of update_date.
     *
     * @return self
     */
    public function setUpdateDate(string $update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }

    /**
     * Get the value of Posts_id_post.
     */
    public function getPostsIdPost(): int
    {
        return $this->Posts_id_post;
    }

    /**
     * Set the value of Posts_id_post.
     *
     * @return self
     */
    public function setPostsIdPost($Posts_id_post): int
    {
        $this->Posts_id_post = $Posts_id_post;

        return $this;
    }

    /**
     * Get the value of User_id_user.
     */
    public function getUserIdUser(): int
    {
        return $this->User_id_user;
    }

    /**
     * Set the value of User_id_user.
     *
     * @return self
     */
    public function setUserIdUser($User_id_user): int
    {
        $this->User_id_user = $User_id_user;

        return $this;
    }
}
