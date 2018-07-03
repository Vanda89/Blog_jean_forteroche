<?php

namespace P4blog\Controllers;

use P4blog\Models\CommentsModel;
use P4blog\Utils\User;

// use P4blog\Models\CommentsModel;

class CommentController extends CoreController
{
    /**
     * addComment.
     */
    public function addComment()
    {
        $user = User::getConnectedUser();
        $author = $user->getName();
        CommentsModel::add($_POST['idPost'], $author, $_POST['commentContent']);

        $this->redirect('/post/get?id='.$_POST['idPost']);
    }

    /**
     * reportComment.
     */
    public static function reportComment()
    {
        CommentsModel::reported($_POST['idComment']);
        $response = ['reported' => $_POST['idComment']];
        self::sendJson($response);
    }
}
