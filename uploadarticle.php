
<?php



include "Components/db.php";

$message=" ";


if ($_SESSION["success"]==1){
    $message="you article uploaded successfully";
    echo "<script>alert('$message');</script>";
    $_SESSION['success'] = "";


}

$title=" ";
$body=" ";
$id=$_SESSION['id'];

if(isset($_POST["submit"])) {

    $title = $_POST["title"];
    $body = $_POST["body"];
    $image_dir = "images";
    $author = $_SESSION["id"];
    $date = date("F j, Y, g:i a");


    if (!empty($_POST["title"]) && !empty($_POST["body"]) && !empty($_FILES["file"]["name"])) {
        #random file name (tje similar file name doesn't replaced)
        $pname = rand(1000, 1000) . "-" . $_FILES["file"]["name"];

        #tname to upload image
        $tname = $_FILES["file"]["tmp_name"];

        move_uploaded_file($tname, $image_dir . '/' . $pname);

        $sql = "INSERT INTO `article`(`title`, `body`, `image`, `author`, `date`) VALUES ('$title','$body','$pname','$id','$date')";
        $result = mysqli_query($conn, $sql);

//        Get id to the article


        if ($result==1){
            //        Insert tags to database
            $get_articleID = mysqli_query($conn, "SELECT `id` FROM `article` WHERE `title`='$title'");
            while ($article = mysqli_fetch_assoc($get_articleID)) {
                $article_id = $article["id"];
            }
           if(!empty($_POST["tags"])){
               $tags =$_POST["tags"];
           }else{
               $tags=" ";
           }
            for ($i = 0; $i < count($tags); $i++) {
                $tag_id = $tags[$i];
                echo $tag_id;
                $tag_article = "INSERT INTO `tag_article`(`tag_id`, `article_id`) VALUES ('$tag_id','$article_id')";
                $tag_query = mysqli_query($conn, $tag_article);

            }

            if(!empty($result) && $result==1){
                header("Location: http://localhost/blog_task/uploadarticle.php");
                $_SESSION['success'] = 1;
            }



        }


}else{
        $message="please fill all the fields";
        echo "<script>alert('$message');</script>";
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
    <link rel="stylesheet" href="css/upload.css"/>
    <!-- Select 2-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />


</head>
<body>
<?php
include "Components/navbar.php";
?>
<!-- end of my nav section         -->

<div class="admin-wrapper">
    <!-- Left sidebar -->
<?php include "Components/sidebar.php"?>
    <!-- // Left sidebar -->

    <!-- admin content -->
    <div class="admin-content">
        <div class="content">
            <h2 class="page-title">Upload your article</h2>
            <hr>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">The title:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                </div>

                <div class="form-group">
                    <label for="body">The article:</label>
                    <textarea class="form-control" id="body" name="body" rows="10" placeholder="Enter your article here..."></textarea>
                </div>

                <div class="form-group">
                    <label for="tags"></label>
                    <select class="js-example-basic-multiple form-control" name="tags[]" multiple="multiple">
                        <?php $tag_sql="SELECT * FROM `tag` ";

                        $tag_result=mysqli_query($conn,$tag_sql);

                        while ($tag=mysqli_fetch_assoc($tag_result)){?>
                        <option value="<?php echo $tag["tag_id"]?>"> <?php echo $tag["tag_name"]?> </option>
                           <?php  } ?>
                    </select>
                </div>

                    <div class="form-group">
                        <label for="file" class="upload-image">Upload an image</label>
                        <input type="file" src="web_image/user.svg" class="form-control-file" id="file" name="file" accept="image/*" hidden>
                    </div>

                <div class="form-group">
                    <label for="author">The author:</label>
                    <input type="text" class="form-control" name="author" disabled value="<?php echo $_SESSION['user_name']; ?>">
                </div>

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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({
            maximumSelectionLength: 8
        });
    });
</script>
<!--Select2-->

</html>