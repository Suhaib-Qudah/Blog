<?php
include "../Components/db.php";

if (isset($_GET["id"])) {

    $get_user="SELECT * FROM `users` WHERE `id`=".$_GET['id'];
    $user_result=mysqli_query($conn,$get_user);
    while($user=mysqli_fetch_assoc($user_result)){
    $user_type=$user["user_type"];}

    if ($user_type==1){
        $_SESSION["message"]="This user is already an admin";
        header("Location: http://localhost/blog_task/user.php");

    }else{
        $id=$_GET["id"];

    $admin_sql="UPDATE  users SET `user_type`=1 WHERE id=$id ";

    $admin_result=mysqli_query($conn,$admin_sql);

    $_SESSION["message"]="This user is now an admin";
    header("Location: http://localhost/blog_task/user.php");

    }


}


    ?>