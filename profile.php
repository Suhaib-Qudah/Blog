<?php
include "Components/db.php";

if ($_SESSION["success"]==1){
    $message="your article  updated successfully";
    echo "<script>alert('$message');</script>";
    $_SESSION['success'] = "";
}


if(!$conn){
    //echo "connection error".mysqli_connect_error();
}else
{
    //echo "connection successfully";
}

$sql="SELECT * FROM `article` where `delete`=0";
$result=mysqli_query($conn,$sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>Document</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
          integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
          integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
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
          <?php if(!empty($_SESSION['message'])&&$_SESSION["message"]=="This post is deleted successfully"){?>

          <div class="alert alert-success m-3" role="alert">
              <?php echo $_SESSION["message"]; ?>
          </div>

          <?php $_SESSION["message"]="" ; }?>
          <h2 class="page-title">Manage Posts</h2>
          <hr>
          <table>
              <thead>
                  <th>#</th>
                  <th>Article Name</th>
                  <th>Author</th>
                  <th colspan="3">Action</th>

              </thead>
              <tbody>
                <?php while($articles=mysqli_fetch_assoc($result))  { $con=1;?>
                  <tr>
                  <td><?php echo $con; ?></td>
                  <td><?php echo $articles["title"];?></td>
                  <td><?php echo $articles["author"];?></td>
                      <td><a class="view" href="view.php?id=<?php echo $articles["id"];?>"><i class="far fa-eye"></i>View</a></td>

                      <td><a class="edit" href="edit.php?id=<?php echo $articles["id"]?>"><i class="fas fa-edit"></i>Edit</a></td>
                  <td><a class="delete" href="function/delete.php?id=<?php echo $articles["id"];?>"><i class="fas fa-trash-alt"></i>Delete</a></td>
                </tr>
                  <?php $con++; } ?>
              </tbody>
          </table>
      </div>

</div>
<!--// admin content -->
</div>
<!-- // admin wrapper -->
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="js/data.js"></script>

</html>