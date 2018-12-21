<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-27
 * Time: 08:47
 */

namespace App\Controllers;


use \Core\View;
use \App\Models\SignInModel;

/**
 * Posts controller
 *
 * PHP version 5.4
 */
class SignIn extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function indexAction(){
        View::render('SignIn/index.php');
    }

    public function signInAction(){
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $passwordRepeat = $_POST["Password2"];

        if (empty($username)||empty($password)||empty($passwordRepeat)){
            header("Location: /SignIn/index?error=emptyfields");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: /SignIn/index?error=invalidusername");
            exit();
        }
        else if ($password !== $passwordRepeat){
            header("Location: /SignIn/index?error=passwordcheck");
            exit();
        }
        else{
            SignInModel::checkUsername($username);
        }
        SignInModel::registerUser($username, $password);
    }
}