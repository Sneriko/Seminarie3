<?php
/**
 * Created by PhpStorm.
 * User: erikl
 * Date: 2018-11-28
 * Time: 14:22
 */

namespace App\Controllers;
use \Core\View;
use \App\Models\CommentsModel;

class Recipe extends \Core\Controller
{
    public function show(){
        $var = $_GET["id"];
        $file = "../App/Models/Recipes/".$var.".xml";
        $recipe = simplexml_load_file($file) or die("Error: Cannot create object");
        $comments = CommentsModel::getComments($var);
        $args = array("recipe"=>$recipe, "posts"=>$comments);
        View::render('Recipes/index.php', $args);
    }
}