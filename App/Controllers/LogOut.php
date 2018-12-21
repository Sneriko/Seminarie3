<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-28
 * Time: 13:52
 */

namespace App\Controllers;


class LogOut extends \Core\Controller
{
    public function logOutAction(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: /Home/index?logout=success");
    }

}