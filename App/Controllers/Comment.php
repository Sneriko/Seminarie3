<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-28
 * Time: 16:29
 */


namespace App\Controllers;

use \App\Models\CommentsModel;

class Comment extends \Core\Controller
{
    public function postCommentAction(){
        session_start();
        $comment = $_POST["comment"];
        $user = $_SESSION['username'];
        $recipe = $_GET['id'];
        CommentsModel::postComment($user, $recipe, $comment);
        header("Location: /Recipe/show?id=$recipe");
    }

    public function getComments(){
        $comments = CommentsModel::getComments();
        $posts = mysqli_fetch_assoc($comments);


    }

    public function deleteAction(){
        $commentid = $_GET['id'];
        CommentsModel::deleteComment($commentid);
        $recipe = $_GET['recipeid'];
        header("Location: /Recipe/show?id=$recipe");

    }
}