
<?php
include "Components/db.php";


//check the get request data
if (isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="SELECT article.*, users.name FROM `article`, `users` WHERE article.id ='$id' && article.author = users.id";

    $result=mysqli_query($conn,$sql);




    while($article=mysqli_fetch_assoc($result)){
        $article_id=$article['id'];
        $image="images/".$article["image"];
        $date = $article["date"];
        $title=$article["title"];
        $body=$article["body"];
        $author=$article["name"];

    };




}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <!-- My CSS -->
    <link rel="stylesheet" href="css/profile.css"/>

<!--    Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js?render=6LfWXN0ZAAAAALWlZcbIt3PAVPQanvLCQP69AOIm"></script>



</head>
<body>
<?php
include "Components/navbar.php";
?>

<!--Article Section-->

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4"><?php echo $title ; ?></h1>

            <!-- Author -->
            <p class="lead">
                by
                <span class="mt-4"><?php echo $author ;?></span>
            </p>

            <hr>

            <!-- Date/Time -->
            <p>Posted on <?php echo $date; ?></p>

            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="<?php echo $image; ?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead">
                <?php echo $body?>
            </p>
            <hr>

            <!-- Comments Form -->
            <?php
// create a key for hash_hmac function
//if (empty($_SESSION["_token"]))
//    $_SESSION["_token"]= bin2hex(random_bytes(32));
//
//    //create CSRF token
//$csrf = hash_hmac('sha256','this is some string',$_SESSION["_token"]);
//
//if (isset($_POST["submit"])){
//    if (hash_equals($csrf,$_POST["_token"])){
//        $comment_body=$_POST['comment_body'];
//        $sql_comment="INSERT INTO comment (`body`, `article_id`, `time`) VALUES ('$comment_body','$article_id',now())";
//        $comment_result=mysqli_query($conn,$sql_comment);
//        echo "done";
//    }else{
//        die("csrf failed");
//    }


if (isset($_POST["submit"])){



    $url="https://www.google.com/recaptcha/api/siteverify";
    $data=[
            'secret' => "6LfWXN0ZAAAAAEdErkr4B5fYzesYEto7hHYr4soS",
            'response' => $_POST["_token"],
            'remoteip' =>$_SERVER['REMOTE_ADDR']
    ];
   $options = array(
		    'http' => array(
		      'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
		      'method'  => 'POST',
		      'content' => http_build_query($data)
		    )
		  );

		$context  = stream_context_create($options);
  		$response = file_get_contents($url, false, $context);

		$res = json_decode($response, true);
		if($res['success'] == true) {
        $comment_body=$_POST['comment_body'];
        $date= date("F j, Y, g:i a");
		$sql_comment="INSERT INTO comment (`body`, `article_id`, `time`) VALUES ('$comment_body','$article_id',$date)";
        $comment_result=mysqli_query($conn,$sql_comment);
            if(!empty($result) && mysqli_num_rows($result)==1){
                echo '<div class="alert alert-success">
					  <strong>Your comment  is under review.</strong>
					  <br> it will take 2-3 hour\'s to post it.
					  
				  </div>';
            }}

}            ?>
            <div class="tag-container">
                <h1>Relevant #Tags</h1>
                <span class="tag">#hello</span>                <span class="tag">#Welcome</span>
                <span class="tag">#hello</span>                <span class="tag">#Welcome</span>
                <span class="tag">#hello</span>                <span class="tag">#Welcome</span>
                <span class="tag">#hello</span>                <span class="tag">#Welcome</span>
                <span class="tag">#hello</span>                <span class="tag">#Welcome</span>
                <span class="tag">#hello</span>                <span class="tag">#Welcome</span>
                <span class="tag">#hello</span>                <span class="tag">#Welcome</span>


            </div>
            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    <form method="post">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="comment_body"></textarea>
                        </div>
                        <input type="hidden" name="_token" id="token">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
                </div>
            </div>


            <!-- Single Comment -->
            <h1 class="comment-title">Comments</h1>
            <?php
            $comment_sql="SELECT * FROM `comment` WHERE status=0 AND article_id='$id'";
            $comment_result=mysqli_query($conn,$comment_sql);
                    $count=0;
                while ($comment=mysqli_fetch_assoc($comment_result))
                { $count++;
            ?>
            <div class="media mb-4">
                <div class="media-body">
                    <label class="comment-icon"><i class="far fa-comment"></i> <?php echo $count;?></label>
                    <p class="comment-text">                    <?php echo $comment["body"];?>
                    </p>
                </div>
            </div>
<?php } ?>
            <!-- Comment with nested comments -->

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-append">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<!--// Article Section-->

</body>


<!--JS Connection-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


<!-- Google Recaptcha script-->
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfWXN0ZAAAAALWlZcbIt3PAVPQanvLCQP69AOIm', {action: 'homepage'}).then(function(token) {
            document.getElementById("token").value = token;
        });
    });
</script>


</html>