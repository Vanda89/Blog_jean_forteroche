<?php

namespace P4blog\Controllers;

use P4blog\Models\PostsModel;
use P4blog\Models\CommentsModel;
use P4blog\Utils\User;
use P4blog\Utils\Config;

class UserController extends CoreController
{
    public function login()
    {
        $this->show('Connexion - Blog de Jean Forteroche', 'connection');
    }

    public function loginSubmit()
    {
        var_dump($_POST);
    }

    public function signup()
    {
        $this->show('Inscription - Blog de Jean Forteroche', 'registration');
    }

    public function signupSubmit()
    {
        var_dump($_POST);
    }

    public function showPostAdmin($id)
    {
        $post = PostsModel::find($id);
        $comments = CommentsModel::findCommentsByPostId($id);

        $dataToViews = [
            'post' => $post,
            'comments' => $comments,
        ];

        $this->show('Billet', 'postAdmin', $dataToViews);
    }

    public function showPostUser($id)
    {
        $post = PostsModel::find($id);
        $comments = CommentsModel::findCommentsByPostId($id);

        $dataToViews = [
            'post' => $post,
            'comments' => $comments,
        ];

        $this->show('Billet - Blog de Jean Forteroche', 'postUser', $dataToViews);
    }

    public function createPost()
    {
        $this->show('Page d\'écriture', 'creationPost');
    }

    public function savePost()
    {
        var_dump($_POST);
    }

    public function publishPost()
    {
        var_dump($_POST);
    }

    public function editPost()
    {
        $this->show('Page d\'édition', 'editionPost');
    }

    public function archievePost()
    {
        var_dump($_POST);
    }

    public function updatePost()
    {
        var_dump($_POST);
    }

    public function disconnect()
    {
        User::disconnect();
        $this->redirect(Config::getConfig('BASE_PATH').'/');
    }
}
