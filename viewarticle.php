
<?php
include "Components/db.php";

$sql="SELECT * FROM `article` where `delete`=0";
$result=mysqli_query($conn,$sql);



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
    <link rel="stylesheet" href="css/search.css"/>




</head>
<body>

<!-- Start of Nav-->
<?php include "Components/navbar.php"; ?>
<!-- End of Nav  -->

<div class="admin-wrapper">


    <!-- admin content -->
    <div class="admin-content">
        <div class="content">


        <?php
        include "Components/lastposted.php";
        while ($row=mysqli_fetch_assoc($result)) { ?>
<div class="row">
            <div class="card col-lg-12 article" onclick="location.href='view.php?id=<?php echo $row["id"] ?>'">

<div class="row">

    <div class="col-lg-4 col-md-12 ">
        <img class="card-img-top" src="<?php echo "images".'/'.$row["image"]?>" />

    </div>

    <div class="col-lg-8 col-md-12">

    <h2 class="card-title"><?php echo $row["title"]?></h2>

<hr>
        <p id="text" class="card-body"><?php echo $row["body"]?></p>

    </div>

</div>





</div>
</div>
<?php }?>
        </div>

    </div>
    <!--// admin content -->

<!--    Right side bar -->

    <div class="left-sidebar">

    </div>
</div>
<!-- // admin wrapper -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script src="js/data.js"></script>
</html>