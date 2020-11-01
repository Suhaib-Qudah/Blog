<?php
include "Components/db.php";

if(!empty($_POST["submit"])&&(!empty($_POST["tag_name"]))){
if (hash_equals($_SESSION["key"],$_POST["_token"])){

    $tag_name=$_POST["tag_name"];
    $tag_description=$_POST["description"];

    $tag_sql="INSERT INTO `tag`(tag_name, description) VALUES ('$tag_name','$tag_description')" ;
    $tag_result=mysqli_query($conn,$tag_sql);

    if (!empty($tag_result) && $tag_result==1){

        echo $_SESSION["message"]="Tag added successfully";


    }else{
        echo "something going wrong or this tag is already define.";
    }



}else {
    die();
}
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create tag</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/profile.css"/>
    <link rel="stylesheet" href="css/upload.css"/>

</head>
<body>

<body>
<?php
include "Components/navbar.php";
?>
<!-- end of my nav section         -->

<div class="admin-wrapper">
    <!-- Left sidebar -->
    <?php include "Components/sidebar.php";?>

    <!-- // Left sidebar -->

    <!-- admin content -->
    <div class="admin-content">
        <div class="content">
            <h2 class="page-title">Upload your article</h2>
            <hr>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">Tag name:</label>
                    <input type="text" name="tag_name" class="form-control" placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="body">Tag description:</label>
                    <textarea class="form-control" id="body" name="description" rows="10" placeholder="Enter your article here..."></textarea>
                </div>

                <input type="hidden" name="_token" value="<?php echo $_SESSION["key"] ;?>">

                <div class="form-group">
                    <input type="submit" class="form-control submit"  name="submit" value="Share">
                </div>
            </form>
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