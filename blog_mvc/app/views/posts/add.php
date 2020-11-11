<?php require APPROOT."/views/includes/head.php";



?>


    <?php require APPROOT."/views/includes/navbar.php"; ?>
    
<div class="row mt-5">
    <div class="col-md-6">
        <h1 class="font">Create New Post</h1>
    </div>
    <div class="font">
    </div>

    <div class="col-md-6">
      <?php echo($_SESSION['user_state']=='user')? 
       "<a href=". URLROOT."/posts/index class='btn btn-success pull-right'>
        <i class='fas fa-pencil-alt'></i> Back
    </a>": "<a href=". URLROOT."/dashboards/dashboard class='btn btn-success pull-right'>
    <i class='fas fa-pencil-alt'></i> Back to Dashboard
</a>";?>
    </div> 
</div>

<div class="container">
<div class="card card-body color-1 text-left mt-5 mb-5">
    <h2>
        Share you post now with the others
    </h2>
</p>Please fill out this form to share post with others </p>
<form action="<?php echo URLROOT?>/posts/add" method="post">
 <div class="form-group">
      <label for="title">Title of your post:<sup>*</sup></label>
      <input type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err']))?'is-invalid':'';?>" 
      name="title" value="<?php echo $data['title']; ?>">
      <span class="invalid-feedback"> <?php echo $data['title_err'];?></span>
 </div>
 <div class="form-group">
      <label for="body">Your article :<sup>*</sup></label>
      <textarea name="body" id="body" class="form-control form-control-lg <?php echo (!empty($data['body_err']))?'is-invalid':'';?>"
       rows="10" ><?php echo htmlspecialchars($data['body']);?></textarea> 
       <span class="invalid-feedback"> <?php echo $data['body_err'];?></span>

 </div>

 <div class="form-group">
     <label for="tags[]">Choose your tags</label>
     <select class="js-selection form-control-lg form-control color-2" name="tags[]" multiple="multiple">
         <?php foreach ($data['tags'] as $tag): ?>
         <option value="<?php echo $tag->id;?>" ><?php echo $tag->title;?></option>
         <?php endforeach; ?>
     </select>
 </div>

 <div class="row mt-4">
     <div class="col"><input class="btn btn-block btn-success" value="Post Now" type="submit" name="submit"></div>
 </div>
</div>


</form> 
</div>


    

<?php require APPROOT."/views/includes/footer.php";?>



