<?php
require APPROOT."/views/includes/head.php";



?>
<?php 
require APPROOT."/views/includes/navbar.php"; ?>


<div class="jumbotron jumbotron-fluid color-1">
    <div class="container">
        <h1 class="display-4">Share Your Post Now</h1>
        <p class="lead">Simple Social Network To Share Your Article</p>
        <p class="lead">Version: <?php echo  BLOGVERSION; ?></p>

        <hr class="my-3">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Subscribe Now</a>
        </p>
    </div>
</div>

<div class="container">
    <?php flash('Posted_successfully');?>
<?php foreach($data['posts'] as $index=> $post):?>
<div class="card card-body mb-3 text-left c-black col-12">
    <h2 class="card-title font"><?php echo $post->title?></h2>
    <p class="bg-light p-3 font"><?php echo $post->date?>.</p>
    <div class="card-text font"><?php echo substr($post->body, 0, 145);?></div>
    <a href="<?php echo URLROOT;?>/pages/show/<?php echo $post->id?>" class="btn btn-dark">More</a>
</div>
<?php endforeach ?></div>




<?php require APPROOT."/views/includes/footer.php";?>


