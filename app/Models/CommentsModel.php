<?php

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

    // Méthode permettant de retourner un objet ListModel pour l'id passé en paramètre/argument
    public static function findAll()
    {
        $sql = '
            SELECT *
            FROM comments
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

    // Méthode permettant de retourner un objet PostModel pour l'id passé en paramètre/argument
    public static function find($idComment)
    {
        $sql = "
            SELECT *
            FROM comments
            WHERE id_comment = {$idComment}
        ";
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // Récupération du résultat sous forme d'objet CommentsModel
        $result = $pdoStatement->fetchObject('CommentsModel');

        // On retourne le résultat
        return $result;
    }

    // Méthode permettant d'ajouter une ligne dans la table lists
    // en se basant sur les valeurs des propriétés de l'objet courant
    // Rappel, l'objet courant = $this
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

    // Méthode permettant de supprimer une ligne dans la table lists
    // en se basant sur la propriété "id" de l'objet courant
    // Rappel, l'objet courant = $this
    public function reported()
    {
        $sql = '
            UPDATE comments
            SET status = :newStatus, comment_reported = :reported
            WHERE id_comment = (:idComment)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect()($sql);
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':newStatus', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':reported', $this->comment_reported, PDO::PARAM_INT);
        $pdoStatement->bindValue(':idComment', $this->id_post, PDO::PARAM_INT);
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
        $pdo = Database::dbConnect()($sql);
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
        $pdo = Database::dbConnect()($sql);
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':newStatus', $this->status, PDO::PARAM_INT);
        $pdoStatement->bindValue(':idComment', $this->id_comment, PDO::PARAM_INT);
        $pdoStatement->execute();
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
    public function setAuthor($author): string
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
    public function getCommentDate(): int
    {
        return $this->comment_date;
    }

    /**
     * Set the value of comment_date.
     *
     * @return self
     */
    public function setCommentDate($comment_date): int
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
