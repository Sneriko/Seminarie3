<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-28
 * Time: 16:32
 */

namespace App\Models;


class CommentsModel extends \Core\Model
{
    public static function postComment($username, $recipeid, $comment){
        $conn=static::getDB();
        $sql = "INSERT INTO comments (recipe, user, text) VALUES (?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $recipeid, $username, $comment);
        mysqli_stmt_execute($stmt);
    }
    public static function getComments($recipe){
        $conn=static::getDB();
        $sql = "SELECT * FROM comments WHERE recipe='$recipe'";
        $result = mysqli_query($conn, $sql);
        return $result;
    }
    public static function deleteComment($commentid){
        $conn=static::getDB();
        $sql = "DELETE FROM comments WHERE ID='$commentid'";
        mysqli_query($conn, $sql);
    }

}