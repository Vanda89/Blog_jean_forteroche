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

        // Si le commentaire a bien un titre et un contenu, alors on l'envoi dans la bdd
        if (!empty($_POST['idPost']) && !empty($_POST['commentContent'])) {
            CommentsModel::add($_POST['idPost'], $author, $_POST['commentContent']);
        }

        // Redirection vers le post
        $this->redirect('/post/get?id='.$_POST['idPost']);
    }

    /**
     * reportComment.
     */
    public static function reportComment()
    {
        CommentsModel::reported($_POST['idComment']);
        $response = ['reported' => $_POST['idComment']];

        // Envoi du json avec le signalement du commentaire
        self::sendJson($response);
    }
}
