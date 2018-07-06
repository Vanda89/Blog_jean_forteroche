<?php

namespace P4blog\Controllers;

use P4blog\Models\PostsModel;
use P4blog\Models\CommentsModel;
use P4blog\Utils\User;

class MainController extends CoreController
{
    /**
     * showHome.
     */
    public function showHome()
    {
        $allPosts = PostsModel::findAll();
        // $allComments = CommentsModel::findCommentsByPostId($id);
        $allCommentsReported = CommentsModel::findAllByReport();
        // dump($allComments);

        $dataToViews = [
            'allPosts' => $allPosts,
            'allCommentsReported' => $allCommentsReported,
            'totalPosts' => count($allPosts),
            'totalComments' => count($allCommentsReported),
        ];

        if (User::isConnected() === false) {
            $this->show('homeGuest', 'Blog', $dataToViews);
        } elseif (User::isAdmin() === true) {
            $this->show('homeAdmin', 'Tableau de bord', $dataToViews);
        } else {
            $this->show('homeUser', 'Page d\'accueil - Blog de Jean Forteroche', $dataToViews);
        }
    }

    /**
     * showPost.
     *
     * @param mixed $id
     */
    public function showPost($id)
    {
        $post = PostsModel::find($id);
        $comments = CommentsModel::findCommentsByPostId($id);
        $dataToViews = [
            'post' => $post,
            'comments' => $comments,
            'totalComments' => \count($comments),
        ];

        if (User::isConnected() === false) {
            $this->show('postGuest', 'Billet', $dataToViews);
        } elseif (User::isAdmin() === true) {
            $this->show('postAdmin', 'Billet', $dataToViews);
        } else {
            $this->show('postUser', 'Billet - Blog de Jean Forteroche', $dataToViews);
        }
    }

    // public function truncatePost($content, $nbchar)
    // {
    //     return strlen($content) > $nbchar ? substr(substr($content, 0, $nbchar),0,
    // strrpos(substr($content, 0, $nbchar), ' ')).' (...)' : $content;
    // }
}
