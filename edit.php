
<?php



include "Components/db.php";

$message=" ";

if (isset($_GET["id"])){
if (empty($_SESSION['article_id'])){
    $_SESSION['article_id']=$_GET["id"];
}elseif(!empty($_SESSION['article_id'])&&$_SESSION['article_id'] != $_GET["id"]){
    $_SESSION['article_id'] = $_GET["id"];
}
$id=$_SESSION["article_id"];
$sql1="SELECT article.*, users.name FROM `article`, `users` WHERE article.id ='$id' && article.author = users.id ";

$result1=mysqli_query($conn,$sql1);





while($article=mysqli_fetch_assoc($result1)){
    $article_id=$article['id'];
    $title_edit=$article["title"];
    $body_edit=$article["body"];
}

            

$title=" ";
$body=" ";
$id=$_SESSION['id'];

if(isset($_POST["submit"])) {

    unset($_POST["submit"]);
    $title = $_POST["title"];
    $body = $_POST["body"];
    $image_dir = "images";
    $author = $_SESSION["id"];
    $date = date("F j, Y, g:i a");

    if (!empty($_POST["title"]) && !empty($_POST["body"])) {
//        #random file name (tje similar file name doesn't replaced)
//        $pname = rand(1000, 1000) . "-" . $_FILES["file"]["name"];
//
//        #tname to upload image
//        $tname = $_FILES["file"]["tmp_name"];
//
//        move_uploaded_file($tname, $image_dir . '/' . $pname);


        $sql = "UPDATE `article` SET `title`='$title' ,`body`='$body' WHERE `id`='$article_id' ";


        $result = mysqli_query($conn, $sql);

        if ($result == 1) {
            $_POST = "";
            header("Location: http://localhost/blog_task/profile.php");
            $_SESSION['success'] = 1;
            exit();
        }


    } else {
        $message = "please fill all the fields";
        echo "<script>alert('$message');</script>";


    }

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


</head>
<body>
<?php
include "Components/navbar.php";
?>
<!-- end of my nav section         -->

<div class="admin-wrapper">
    <!-- Left sidebar -->
    <div class="left-sidebar">
        <ul>
            <li><a href="profile.php">Manage Posts</a></li>
            <li><a href="#">Manage Comments</a></li>

        </ul>
    </div>
    <!-- // Left sidebar -->

    <!-- admin content -->
    <div class="admin-content">
        <div class="content">
            <h2 class="page-title">Upload your article</h2>
            <hr>
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">The title:</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo $title_edit; ?>">
                </div>

                <div class="form-group">
                    <label for="body">The article:</label>
                    <textarea class="form-control" id="body" name="body" rows="10" placeholder="Enter your article here..."><?php echo $body_edit; ?></textarea>
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
</html>