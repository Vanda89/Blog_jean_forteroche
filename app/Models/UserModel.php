<?php

class UserModel
{
    private $name;
    private $mail;
    private $password;
    private $is_admin;

    public static function findAll()
    {
        $sql = '
            SELECT *
            FROM user
        ';
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // Récupération des résultats sous forme de tableau d'objet UserModel
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'UserModel');

        // On retourne les résultats
        return $results;
    }

    public static function find($idUser)
    {
        $sql = "
            SELECT *
            FROM user
            WHERE id_user = {$idUser}
        ";
        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();

        // On exécute la requête
        $pdoStatement = $pdo->query($sql);

        // Récupération du résultat sous forme d'objet UserModel
        $result = $pdoStatement->fetchObject('UserModel');

        // On retourne le résultat
        return $result;
    }

    public function add()
    {
        $sql = '
            INSERT INTO user (name, mail, password, is_admin)
            VALUES (:name, :mail, :password, :isAdmin)
        ';

        // On récupère la connextion PDO à la DB
        $pdo = Database::dbConnect();
        // On prépare une requête à l'exécution et retourne un objet
        $pdoStatement = $pdo->prepare($sql);
        // Association des valeurs aux champs de la bdd et paramètrage du retour
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue(':isAdmin', $this->is_admin, PDO::PARAM_INT);
        $pdoStatement->execute();
    }

    /**
     * Get the value of is_admin.
     */
    public function getIsAdmin(): int
    {
        return $this->is_admin;
    }

    /**
     * Set the value of is_admin.
     *
     * @return self
     */
    public function setIsAdmin(int $is_admin): int
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    /**
     * Get the value of name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Set the value of name.
     *
     * @return self
     */
    public function setName(int $name): string
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of mail.
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail.
     *
     * @return self
     */
    public function setMail($mail): string
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password.
     *
     * @return self
     */
    public function setPassword($password): string
    {
        $this->password = $password;

        return $this;
    }
}
