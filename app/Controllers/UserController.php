<?php

namespace P4blog\Controllers;

use P4blog\Models\UserModel;
use P4blog\Utils\User;
use P4blog\Utils\Config;

class UserController extends CoreController
{
    /**
     * Méthode faisant lien entre la route du bouton de connexion et la view correspondante avec son titre.
     */
    public function login()
    {
        $this->show('connection', 'Connexion - Blog de Jean Forteroche');
    }

    /**
     * Méthode traitant le formulaire de connexion en Ajax et affichant le cas échéant des messages d'erreurs.
     */
    public function loginSubmit()
    {
        // Tableau contenant toutes les erreurs
        $errorList = [];
        // formulaire soumis
        if (!empty($_POST)) {
            // Je récupère les données
            $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
            $password = isset($_POST['pswd']) ? $_POST['pswd'] : '';
            // Je traite les données si besoin
            $mail = trim($mail);
            $password = trim($password);
            // Je valide les données => je cherche les erreurs

            if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false || strlen($password) < 8) {
                $errorList[] = 'Identifiant ou mot de passe incorrect.';
            }

            if (empty($mail) || empty($password)) {
                $errorList[] = 'Tous les champs sont obligatoires.';
            }

            // Si tout est ok (aucune erreur)
            if (empty($errorList)) {
                // On va cherche le user pour l'email fourni
                $userModel = UserModel::findByMail($mail);
                // Si l'email existe
                if ($userModel !== false) {
                    // Alors, on va tester le password
                    if (password_verify($password, $userModel->getPassword())) {
                        // Sauvegarde en Session de l'user
                        User::connect($userModel);
                        // On envoie un JSON avec l'url du home pour la redirection
                        $this->sendJson(array('url' => Config::getConfig('BASE_PATH').'/'));
                    } else {
                        $errorList[] = 'Identifiants/mot de passe non reconnus';
                    }
                }
                // Sinon
                else {
                    $errorList[] = 'Email non reconnu';
                }
            }
        }
        // Envoi du JSON avec la liste des erreurs
        $this->sendJson($errorList);
    }

    /**
     * Méthode faisant lien entre la route du bouton d'inscription et la view correspondante avec son titre.
     */
    public function signup()
    {
        $this->show('registration', 'Inscription - Blog de Jean Forteroche');
    }

    /**
     * Méthode traitant le formulaire d'inscription en Ajax et affichant le cas échéant des messages d'erreurs.
     */
    public function signupSubmit()
    {
        // Tableau contenant toutes les erreurs
        $errorList = [];
        // formulaire soumis
        if (!empty($_POST)) {
            // Je récupère les données
            $name = isset($_POST['name']) ? $_POST['name'] : '';
            $mail = isset($_POST['mail']) ? $_POST['mail'] : '';
            $pswd = isset($_POST['pswd']) ? $_POST['pswd'] : '';
            $confirmPswd = isset($_POST['confirm-pswd']) ? $_POST['confirm-pswd'] : '';
            // Je traite les données si besoin
            $name = trim($name);
            $mail = trim($mail);
            $pswd = trim($pswd);
            $confirmPswd = trim($confirmPswd);
            // Je valide les données => je cherche les erreurs

            if (empty($name) || empty($mail) || empty($pswd) || empty($confirmPswd)) {
                $errorList[] = 'Tous les champs sont obligatoires.';
            }

            if (!empty($name) && UserModel::findByName($name)) {
                $errorList[] = 'Ce pseudo existe déjà !';
            }

            if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
                $errorList[] = 'Adresse mail invalide';
            }

            if (strlen($pswd) < 8) {
                $errorList[] = 'Le mot de passe doit faire au moins 8 caractères';
            }

            if (!empty($mail) && UserModel::findByMail($mail)) {
                // Ajouter un message d'erreur
                $errorList[] = 'Cette adresse email existe déjà !';
            }

            if ($pswd != $confirmPswd) {
                $errorList[] = 'Les 2 mots de passe sont différents';
            }

            // Si tout est ok (aucune erreur)
            if (empty($errorList)) {
                // Je hash/encode le mot de passe
                $hashedPassword = password_hash($pswd, PASSWORD_DEFAULT);
                // On insert en DB
                $newUserModel = new UserModel();
                $newUserModel->setName($name);
                $newUserModel->setMail($mail);
                $newUserModel->setPassword($hashedPassword);
                $newUserModel->setIsAdmin(2);
                $newUserModel->add();
                // Sauvegarde en Session de l'user
                User::connect($newUserModel);
                // On envoie un JSON avec l'url du home pour la redirection
                $this->sendJson(array('url' => Config::getConfig('BASE_PATH').'/'));
            }

            // Envoi du JSON avec la liste des erreurs
            $this->sendJson($errorList);
        }
    }

    /**
     * validateComment.
     */
    public function validateComment()
    {
    }

    /**
     * deleteComment.
     */
    public function deleteComment()
    {
    }

    /**
     * createPost.
     */
    public function createPost()
    {
        $this->show('creationPost', 'Page d\'écriture');
    }

    /**
     * savePost.
     */
    public function savePost()
    {
        var_dump($_POST);
    }

    /**
     * publishPost.
     */
    public function publishPost()
    {
        var_dump($_POST);
    }

    /**
     * editPost.
     */
    public function editPost()
    {
        $this->show('editionPost', 'Page d\'édition');
    }

    /**
     * archievePost.
     */
    public function archievePost()
    {
        var_dump($_POST);
    }

    /**
     * updatePost.
     */
    public function updatePost()
    {
        var_dump($_POST);
    }

    /**
     * disconnect.
     */
    public function disconnect()
    {
        User::disconnect();
        $this->redirect(Config::getConfig('BASE_PATH').'/');
    }
}
