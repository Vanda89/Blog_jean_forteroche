<?php

class UserModel
{
    private $is_admin;
    private $name;
    private $mail;
    private $password;

    /**
     * Get the value of is_admin
     */
    public function getIsAdmin() : int
    {
        return $this->is_admin;
    }

    /**
     * Set the value of is_admin
     *
     * @return  self
     */
    public function setIsAdmin(int $is_admin) : int
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    /**
     * Get the value of name
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName(int $name) : string
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail() : string
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     *
     * @return  self
     */
    public function setMail($mail) : string
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword() : string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password) : string
    {
        $this->password = $password;

        return $this;
    }
}
