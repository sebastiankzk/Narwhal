<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NYP CCA Portal</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>assets/css/modern-business.css" rel="stylesheet"> 

  </head>

  <body>

   <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="<?=base_url();?>index.php">NYP CCA Portal</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="index.php#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/event'); ?>">Event</a>
            </li>
             <?php if($this->session->userdata('role') == 'Leader') : ?>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/leader'); ?>">Member Info</a>
            </li>
        <?php endif; ?>
            <li class="nav-item">   
              <a class="nav-link" href="<?php echo base_url('index.php/home/contact_us'); ?>">Contact</a>
            </li>
      <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                CCA
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
                <a class="dropdown-item" href="<?php echo base_url('index.php/home/cca_list'); ?>">View all CCA</a>
              </div>
      </li>

      <?php if($this->session->userdata('role') == 'Admin') : ?>
      <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('index.php/admin'); ?>">Admin</a>
      </li>
      <?php endif; ?>

      <!-- Login Logout  -->
			<li class="nav-item">
        <?php if($this->session->userdata('username') != '') : ?>            
              <a class="nav-link" href="<?php echo base_url('index.php/login/logout'); ?>">Logout</a>
        <?php else : ?>            
              <a class="nav-link" href="<?php echo base_url('index.php/login'); ?>">Login</a>
        <?php endif; ?>        
      </li>
      <!-- Display adminNumber if logged in -->
      <li class="nav-item active">
        <?php if($this->session->userdata('username') != '') : ?>            
              <a class="nav-link">Hello, <?php echo $this->session->userdata('username'); ?></a>
        <?php endif; ?>        
      </li>

          </ul>
        </div>
      </div>
    </nav>

    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('../narwhal/assets/images/4.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Discover Yourself</h3>
              <p>Discover yourself and become your best because we can</p>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../narwhal/assets/images/3.jpg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Teamwork</h3>
              <p>Work hard, Play hard</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('../narwhal/assets/images/1.jpeg')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Join Us</h3>
              <p>Join our CCA today!</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <h1 class="my-4">Welcome to NYP CCA Portal</h1>

   
      <!-- /.row -->

      <!-- Portfolio Section -->
      <div class="row">
        <?php foreach($query as $row): ?>
          <div class="col-lg-4 col-sm-4 portfolio-item">
            <div class="card h-100">
              <img class="card-img-top" src="../narwhal/assets/images/<?php echo $row->image; ?>" alt="">
              <div class="card-body">
                <h4 class="card-title"><a href="<?php echo base_url('index.php/home/cca/'.$row->ccaID); ?>"><?php echo $row->name; ?></a></h4>
                <p class="card-text"><?php echo $row->information; ?></p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
      <br/>
      <!-- /.row -->

      <!-- Features Section -->
      
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">180 Ang Mo Kio Avenue 8 Singapore (569830) Tel: 64515115 </br>Copyright &copy; 2018 NYP, Singapore. All rights reserved.</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
