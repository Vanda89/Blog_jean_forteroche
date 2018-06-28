<?php

namespace P4blog\Controllers;

use P4blog\Models\PostsModel;
use P4blog\Models\CommentsModel;
use P4blog\Utils\User;

// require_once __DIR__.'/./CoreController.php';
// require_once __DIR__.'/../Models/PostsModel.php';
// require_once __DIR__.'/../Models/CommentsModel.php';
// require __DIR__.'/../Utils/User.php';

class MainController extends CoreController
{
    public function showHome()
    {
        $allPosts = PostsModel::findAll();
        $allCommentsReported = CommentsModel::findAllByReport();

        $dataToViews = [
            'allPosts' => $allPosts,
            'allComments' => $allCommentsReported,
        ];

        if (User::isConnected() === false) {
            $this->show('Blog', 'homeGuest', $dataToViews);
        } elseif (User::isAdmin() === true) {
            $this->show('Tableau de bord', 'homeAdmin', $dataToViews);
        } else {
            $this->show('Page d\'accueil - Blog de Jean Forteroche', 'homeUser', $dataToViews);
        }
    }

    public function showPost($id)
    {
        $post = PostsModel::find($id);
        $comments = CommentsModel::findCommentsByPostId($id);

        $dataToViews = [
            'post' => $post,
            'comments' => $comments,
        ];

        $this->show('Billet', 'postGuest', $dataToViews);
    }
}
