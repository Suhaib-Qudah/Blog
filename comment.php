<?php
include "Components/db.php";


$sql="SELECT * FROM `comment` WHERE `status`=1";
$result=mysqli_query($conn,$sql);
if(isset($_POST['submit'])){
    $id=$_POST["id"];

    $comment_sql="UPDATE `comment` SET `status`=0 WHERE `id`='$id'";
    $comment_result=mysqli_query($conn,$comment_sql);

    if( $comment_result==1){
        $_SESSION["message"]="Comment Accepted";
        header("Location: http://localhost/blog_task/comment.php");
        exit();
    }else{
        echo $_SESSION["message"]="something wrong";
    }
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

</head>
<body>

<?php
include "Components/navbar.php";
?>

<!-- end of my profile section         -->

<div class="admin-wrapper">
    <!-- Left sidebar -->
    <?php include "Components/sidebar.php";?>

    <!-- // Left sidebar -->

    <!-- admin content -->
    <div class="admin-content">
        <div class="content">
            <h2 class="page-title">Pending Comments</h2>
            <hr>
            <?php  if($_SESSION["message"]=="Comment Accepted"){?>
                <div class="message">
                    <p>
                        <?php  echo $_SESSION["message"];?>

                    </p>
                </div>
            <?php  $_SESSION["message"]=" ";  } ?>


            <?php


            while($comment=mysqli_fetch_assoc($result)){  ;?>
            <div class="row">
                <div class="card col-lg-12 p-3">
                    <h3 class="card-title">Comment: </h3>
                    <div class="card-body"><p><?php echo $comment['body'] ;?></p></div>
                    <form method="post">
                        <input value="<?php echo$id=$comment["id"]; ?>" type="hidden" name="id">
                        <button class="btn btn-primary col-lg-2 col-md-4 col-sm-6" name="submit" id="submit" >Accept Comment</button>
                    </form>
                </div>
            </div>
                <br/>
            <?php } ?>

        </div>

    </div>
    <!--// admin content -->
</div>
<!-- // admin wrapper -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</html>