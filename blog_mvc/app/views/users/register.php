<?php
require APPROOT."/views/includes/head.php";



?>
<?php require APPROOT."/views/includes/navbar.php"; ?>

<div class="col-md-5 mx-auto">
<div class="card card-body color-1 text-left mt-5">
    <h2>
        Create An Account
    </h2>
</p>Please fill out this form to register with us </p>
<form action="<?php echo URLROOT?>/users/register" method="post">
 <div class="form-group">
      <label for="name">Name:<sup>*</sup></label>
      <input type="text" class="form-control form-control-lg <?php echo (!empty($data['name_err']))?'is-invalid':'';?>" 
      name="name" value="<?php echo $data['name']; ?>">
      <span class="invalid-feedback"> <?php echo $data['name_err'];?></span>
 </div>
 <div class="form-group">
      <label for="name">E-mail:<sup>*</sup></label>
      <input type="email" class="form-control form-control-lg <?php echo (!empty($data['e-mail_err']))?'is-invalid':'';?>"
       name="e-mail" value="<?php echo $data['e-mail']; ?>">
       <span class="invalid-feedback"> <?php echo $data['e-mail_err'];?></span>

 </div>
 <div class="form-group">
      <label for="name">Password:<sup>*</sup></label>
      <input type="password" class="form-control form-control-lg <?php echo (!empty($data['password_err']))?'is-invalid':'';?>" 
      name="password" value="<?php echo $data['password']; ?>">
      <span class="invalid-feedback"> <?php echo $data['password_err'];?></span>

 </div>
 <div class="form-group">
      <label for="name">Confirm Password:<sup>*</sup></label>
      <input type="password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err']))?'is-invalid':'';?>" 
      name="confirm_password" value="<?php echo $data['confirm_password']; ?>" >
      <span class="invalid-feedback"> <?php echo $data['confirm_password_err'];?></span>
 </div>
 <div class="form-group">
      <label for="name">Phone Number:<sup>*</sup></label>
      <input type="text" class="form-control form-control-lg <?php echo (!empty($data['phone_err']))?'is-invalid':'';?>" 
      name="phone" value="<?php echo $data['phone']; ?>">
      <span class="invalid-feedback"> <?php echo $data['phone_err'];?></span>
 </div>
 <div class="form-group">
     <label>Gender:<sup>*</sup></label>
     <br/> 
 <div class="btn-group btn-group-toggle is-invalid" data-toggle="buttons">
  <label class="btn btn-secondary active">
    <input type="radio" name="gender" id="gender1" autocomplete="off" value="m" checked> Male
  </label>
  <label class="btn btn-secondary">
    <input type="radio" name="gender" id="gender2" autocomplete="off" value="f"> Female
  </label>
 </div>

 <div class="row mt-4">
     <div class="col"><input class="btn btn-block btn-success" value="Register" type="submit" name="submit"></div>
     <div class="col"><a href="<?php echo URLROOT ;?>/users/login" class="btn btn-block btn-light">Have an account? login</a></div>
 </div>
</div>


</form> 
</div>
</div>


<?php require APPROOT."/views/includes/footer.php";?>


