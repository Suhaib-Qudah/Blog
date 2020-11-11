<nav class="top-nav navbar navbar-expand-lg  color-2">
<a class="navbar-brand p-3" href="<?php echo URLROOT?>/pages/"><?php echo SITENAME?></a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <i class="fas fa-bars"></i>
  </button>


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto pr-3">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT?>/pages/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT?>/posts/
        " >Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT?>/pages/about/">About</a>
      </li>  
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle mx-2" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Account
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          
          <?php if(!isset($_SESSION['user_id'])){?>

          <a class="dropdown-item" href="<?php echo URLROOT?>/users/login">Login</a>

          <a class="dropdown-item" href="<?php echo URLROOT?>/users/register">Register</a>
          <?php }elseif($_SESSION['user_state']=='admin') {?>
          <a class="dropdown-item" href="<?php echo URLROOT?>/dashboards/dashboard">My Dashboard</a>
         <?php }?>


          <div class="dropdown-divider"></div>
          <?php if(isset($_SESSION['user_id'])){?>

          <a class="dropdown-item"  href="<?php echo URLROOT?>/users/logout">logout</a>
          <?php } ?>

        </div>
      </li>
    </ul>

</div>
</nav>

