<?php

include "Components/db.php";

$falselogin=" ";

$userName = "";
$password = "";

if(isset($_POST['user'])){
    $userName = $_POST['user'];
    $password = $_POST['password'];
    $_SESSION["success"]="";
    

    $sql="select * from `users` where name='".$userName."'AND Password='".$password."' limit 1";

    $result=mysqli_query($conn ,$sql)or die("Error");



    if(!empty($result) && mysqli_num_rows($result)==1){
        $message= "Login Successfully";

        while($user=mysqli_fetch_assoc($result)){

        $_SESSION['user_name'] = $user['name'];
        $_SESSION['author'] = $user['name'];
        $_SESSION['id'] = $user['id'];
        $_SESSION['user_type'] = $user['user_type'];
        $_SESSION['message']="";

        }
        $_SESSION['type'] = 'success';
        $_SESSION['key']= hash_hmac('sha256','user login key',hex2bin(random_bytes(32)));



        echo "<input hidden value='$userName' name='user' type='text'>";
        header("Location: http://localhost/blog_task/uploadarticle.php");
        exit("something wrong");
    }else{

        $falselogin= "your user name or password is wrong";}




}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/profile.css"/>
    <link rel="stylesheet" href="css/login.css"/>


</head>
<body>
   <?php
   include "Components/navbar.php";
   ?>

<section id="body">
    <div class="form">
        <form method="post">
            <div class="login-icon"><img src="web_image/user.svg" alt=""/></div>
            <label><i class="far fa-user"></i> Username</label> <input class="login" name="user" type='text' placeholder="username" value="<?php echo $userName;?>"/>
            <br>
            <label><i class="fas fa-key"></i> Password</label><input class="login"  name='password' type='password' placeholder="password" value=""/>
            <input type="submit" class="primary"  value="Login">

            <div class="danger"><?php  echo $falselogin; ?></div>

        </form>
    </div>
</section>

<!-- End of head -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

<script src="js/data.js"></script>
</body>
</html>