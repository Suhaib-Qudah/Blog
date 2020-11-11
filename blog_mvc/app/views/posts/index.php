<?php require APPROOT."/views/includes/head.php";



?>


    <?php require APPROOT."/views/includes/navbar.php"; ?>
    
<div class="row mt-5">
    <div class="col-md-6">
        <h1 class="font">Posts</h1>
    </div>
    <div class="col-md-6">
       <?php echo(isset($_SESSION['user_id']))? '<a href='. URLROOT.'/posts/add class="btn btn-success pull-right">':'';?>   
        <i class="fa fa-pencial"></i>Add Post
    </a>
    </div> 
</div>
<div class="container">


<?php foreach($data['posts'] as $index=> $post):?>
<div class="card card-body mb-3 text-left c-black col-12">
    <h2 class="card-title font"><?php echo $post->title?></h2>
    <p class="bg-light p-3 font"><?php echo $post->date?>.</p>
    <div class="card-text font"><?php echo $post->body?></div>
    <a href="<?php echo URLROOT;?>/pages/show/<?php echo $post->id?>" class="btn btn-dark">More</a>
</div>
<?php endforeach ?></div>


    

<?php require APPROOT."/views/includes/footer.php";?>



