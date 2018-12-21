<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-12-01
 * Time: 09:15
 */

namespace App\Controllers;

use \Core\View;

class Calendar extends \Core\Controller
{
    public function indexAction(){
        View::render('Calendar/index.php');
    }
}