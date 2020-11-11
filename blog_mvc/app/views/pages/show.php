<?php require APPROOT."/views/includes/head.php"; ?>
<?php require APPROOT."/views/includes/navbar.php"; ?>



<div class="article-container col-lg-12 ">
        <h1 class="post-title font text-left"><?php echo $data['post']->title ;?></h1>
        <h4 class="font text-left ">Written by <?php echo $data['author'] ;?></h4>
        <p class="font text-left"><?php echo $data['post']->date ;?></p>

        <div class="font">

            <p class="text-justify article"><?php echo $data['post']->body;?></p>

        </div>

        <div class="tags">
            <?php foreach ($data['tags'] as $tag):?>

            <a href="#" class="tag">#<?php echo $tag->title; ?></a>
            <?php endforeach; ?>


        </div>

</div>






<?php require APPROOT."/views/includes/footer.php";?>


