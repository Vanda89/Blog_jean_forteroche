<?php

namespace P4blog\Controllers;

use P4blog\Models\CommentsModel;

// use P4blog\Models\CommentsModel;

class CommentController extends CoreController
{
    /**
     * addComment.
     */
    public function addComment()
    {
        var_dump($_POST);
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
