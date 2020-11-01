<section id="nav">
    <nav class="navbar navbar-expand-lg container ">
        <a class="navbar-brand" href="login.php">Blogs.com</a>
        <div class="md-form mt-0">
            <form class="form-inline my-2 my-lg-0" method="post" action="./search.php">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="search">
            </form>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="viewarticle.php">
                        Home
                    </a>
                </li>
                <?php if(isset($_SESSION['id']) && ($_SESSION['type'] === 'success')){ ?>

                    <li class="nav-item">
                        <a class="nav-link " href="uploadarticle.php">
                            Share Post
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Welcome <?php echo $_SESSION['user_name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="user.php">Dashbored</a>
                                <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item">logout</a>

                        </div>
                    </li>

                <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link " href="login.php">
                            Login
                        </a>
                    </li>
                <?php } ?>

            </ul></div>
    </nav>
</section>