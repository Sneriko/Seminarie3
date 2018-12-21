<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/recipestyle.css"
</head>
<body>
<?php
include '../App/Views/header.php';

$recipeid = $args['recipe']->title;


echo    "<h1>".$args['recipe']->title."</h1>
        <img src='".$args['recipe']->imagepath."'>

        <div id='preps'>Preparations: ".$args['recipe']->preptime.", Cooktime: ".$args['recipe']->cooktime.", Total time: ".$args['recipe']->totaltime."</div>
        <h2>Ingredients</h2>
        <ul>";
            foreach ($args['recipe']->ingredient->li as $value){
            echo "<li>".$value."</li>";
    }
echo    "</ul>
        <h2>Method</h2>
        <div id='method'>
            <ol>";
            foreach ($args['recipe']->recipetext->li as $value){
            echo "<li>".$value."</li>";
        }
echo        "</ol>
        </div>";
if(isset($_SESSION['id'])){
echo    "<form method='post' action='/Comment/postComment?id=$recipeid'>
            <label for=\"exampleFormControlTextarea1\">Write a comment</label>
            <textarea class=\"form-control\" id=\"exampleFormControlTextarea1\" rows=\"3\" name='comment' style='width: 50%; margin: 10px'></textarea>
            <button type=\"submit\" class=\"btn btn-primary\">Post comment</button>        
         </form>";
}
while($row = mysqli_fetch_assoc($args['posts'])){
    $commentid = $row['ID'];
   echo '<div class="card" style="width: 36rem;">
  <div class="card-body">
    <h5 class="card-title">'.$row['user'].'</h5>
    <p class="card-text">'.$row['text'].'</p>';
   if (isset($_SESSION['username'])) {
       if ($_SESSION['username'] == $row['user']) {
           echo '<a href="/Comment/delete?id=' . $commentid . '&recipeid=' . $recipeid . '" class="card-link">Delete</a>';
       }
   }
    echo '</div>
</div>';

}

//$idcomment = $row['id'];
//if ($_SESSION['recipe'] == $row['recipe']) {
//echo "<div style='color: blue'>".$row['username']."</div>";
?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>