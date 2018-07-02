<?php

namespace P4blog\Models;

use P4blog\Utils\Database;
use PDO;

class CommentsModel
{
    private $id_comment;
    private $author;
    private $comment_content;
    //status => 0 = valide et publié, 1 = reporté, 2 = archivé
    private $status;
    private $comment_date;
    private $update_date;
    private $Posts_id_post;
    private $User_id_user;
    private $title;

    /**
     * findAll.
     */
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

    /**
     * find.
     *
     * @param mixed $idComment
     */
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

    /**
     * add.
     */
    public function add()
    {
        $sql = '
            INSERT INTO comments (author, comment_content, status, comment_date)
            VALUES (:author, :commentContent, :status, NOW(),)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':title', $this->author, PDO::PARAM_STR);
        $pdoStatement->bindValue(':commentContent', $this->comment_content, PDO::PARAM_STR);
        $pdoStatement->bindValue(':status', $this->status, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    /**
     * reported.
     */
    public static function reported(int $idComment)
    {
        $sql = '
            UPDATE comments
            SET status = 1
            WHERE id_comment = :idComment
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idComment', $idComment, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    /**
     * validate.
     */
    public static function validate($idComment)
    {
        $sql = '
            UPDATE comments
            SET status = 0
            WHERE id_comment = :idComment
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idComment', $idComment, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    /**
     * delete.
     */
    public static function delete($idComment)
    {
        $sql = '
            UPDATE comments
            SET status = 2
            WHERE id_comment = :idComment
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idComment', $idComment, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    /**
     * findCommentsByPostId.
     *
     * @param mixed $idComment
     */
    public static function findCommentsByPostId($idPost)
    {
        $sql = '
            SELECT *
            FROM comments AS c
            INNER JOIN posts AS p
            ON c.Posts_id_post = p.id_post         
            WHERE c.Posts_id_post = :idPost AND c.status < 2
            ORDER BY c.comment_date DESC
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':idPost', $idPost, PDO::PARAM_INT);
        $pdoStatement->execute();

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * findAllByReport.
     */
    public static function findAllByReport()
    {
        $sql = '
            SELECT c.id_comment, c.author, c.comment_content, c.status, c.comment_date, p.title
            FROM comments AS c  
            INNER JOIN posts AS p
            ON c.Posts_id_post = p.id_post        
            WHERE c.status = 1
            ORDER BY c.comment_date DESC
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
     * Get the value of id_comment.
     */
    public function getIdComment()
    {
        return $this->id_comment;
    }

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

    /**
     * Get the value of title.
     */
    public function getTitle()
    {
        return $this->title;
    }
}
