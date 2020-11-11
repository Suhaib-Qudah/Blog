<?php require APPROOT."/views/includes/head.php";



?>


    <?php require APPROOT."/views/includes/navbar.php"; ?>

    <div class="dashboard-conteainer">
    <div class="leftside">
    <?php require APPROOT."/views/includes/sidebar.php"; ?>
    </div>

    <div class="content">
    <div class="row mt-5">
    <div class="col-md-6">
        <h1 class="font">Create New Tag</h1>
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
        Add new tag to database
    </h2>
    <?php  flash("tag_accepted"); ?>
</p>Please fill out this form to create new tag</p>
<form action="<?php echo URLROOT?>/posts/tag" method="post">
 <div class="form-group">
      <label for="title">Tag Name:<sup>*</sup></label>
      <input type="text" class="form-control form-control-lg <?php echo (!empty($data['title_err']))?'is-invalid':'';?>" 
      name="title" value="<?php echo $data['title']; ?>">
      <span class="invalid-feedback"> <?php echo $data['title_err'];?></span>
 </div>
 <div class="form-group">
      <label for="description">Tag description:<sup>*</sup></label>
      <textarea name="description" id="body" class="form-control form-control-lg <?php echo (!empty($data['description_err']))?'is-invalid':'';?>"
       rows="10" ><?php echo htmlspecialchars($data['description']);?></textarea> 
       <span class="invalid-feedback"> <?php echo $data['description_err'];?></span>

 </div>

 <div class="row mt-4">
     <div class="col"><input class="btn btn-block btn-success" value="Craete New Tag" type="submit" name="submit"></div>
 </div>
</div>


</form> 
</div>

    </div>

    </div>

    <?php require APPROOT."/views/includes/footer.php";?>





    




