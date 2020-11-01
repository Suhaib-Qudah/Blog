<?php

include "../Components/db.php";

if (isset($_GET["id"])) {

    $article_id=$_GET["id"];
    $author= $_SESSION["id"];


    $delete_sql = "UPDATE `article` SET `delete`=1 WHERE `id`=$article_id && `author`=$author ";

    $admin_result=mysqli_query($conn,$delete_sql);

    $_SESSION["message"]="This post is deleted successfully";

    header("Location: http://localhost/blog_task/profile.php");



}


    ?>