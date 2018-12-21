<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-28
 * Time: 09:25
 */

namespace App\Controllers;

use \App\Models\LogInModel;

class LogIn extends \Core\Controller
{
    public function logInAction(){
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        if (empty($username)||empty($password)) {
            echo $username;
            //header("Location: /Home/index?error=empty");
            exit();
        }
        else{
            LogInModel::checkUsernamePassword($username, $password);
        }
    }
}