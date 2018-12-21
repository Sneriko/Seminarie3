<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-28
 * Time: 09:15
 */

namespace App\Models;


class LogInModel extends \Core\Model
{
    public static function checkUsernamePassword($username, $password)
    {
        $sql = "SELECT * FROM users WHERE Username=?";
        $conn = static::getDB();
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result  = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $pwdCheck = password_verify($password, $row['Password']);
            if ($pwdCheck == false){
                header("Location: /Home/index?error=wrongpassword");
                exit();
            }
            else{
                session_start();
                $_SESSION['id'] = $row['ID'];
                $_SESSION['username'] = $row['Username'];
                header("Location: /Home/index?login=success");
                exit();
            }
        }
        else{
            header("Location: /Home/index?error=nosuchusername");
            exit();
        }
    }
}