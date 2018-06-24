<?php
require_once(__DIR__.'/./CoreController.php');

class UserController extends CoreController
{
    public function login()
    {
        $this->show('Connexion - Blog de Jean Forteroche', 'connection');
    }

    public function signin()
    {
        $this->show('Inscription - Blog de Jean Forteroche', 'registration');
    }

    public function showHomeAdmin()
    {
        $this->show('Tableau de bord', 'homeAdmin');
    }

    public function showHomeUser()
    {
        $this->show('Page d\'accueil - Blog de Jean Forteroche', 'homeUser');
    }

    public function showPostAdmin($id)
    {
        $this->show('Billet', 'postAdmin');
    }

    public function showPostUser($id)
    {
        $this->show('Billet - Blog de Jean Forteroche', 'postUser');
    }

    public function createPost()
    {
        $this->show('Page d\'écriture', 'creationPost');
    }

    public function editPost()
    {
        $this->show('Page d\'édition', 'editionPost');
    }
}
