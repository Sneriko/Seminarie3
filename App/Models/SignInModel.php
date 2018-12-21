<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-27
 * Time: 09:52
 */

namespace App\Models;


class SignInModel extends \Core\Model
{
    public static function checkUsername($username){
        $sql = "SELECT Username FROM users WHERE Username=?";
        $conn=static::getDB();
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0){
            header("Location: /SignIn/index?error=usernameexists");
            exit();
        }
    }

    public static function registerUser($username, $password)
    {
        $conn=static::getDB();
        $sql = "INSERT INTO users (Username, Password) VALUES (?, ?)";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        $hashedpwd = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ss", $username, $hashedpwd);
        mysqli_stmt_execute($stmt);
        header("Location: /Home/index?signup=success");
        exit();
    }
}