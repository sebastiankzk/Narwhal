<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NYP CCA Portal - Login</title>

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
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link active" href="<?php echo base_url('index.php/login'); ?>">Login</a>
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

</br></br></br>
    <!-- Page Content -->
    <div class="container">

      </br>
      <!-- Login form -->
      <div class="row">  
        <div class="col-lg-4 mb-4""></div>
        <div class="col-lg-4 mb-4"">  
          <div class="card card-outline-primary h-100">    
            <h3 class="card-header bg-primary text-white">Login</h3>
              <form method="post" action="<?php echo base_url(); ?>index.php/login/login_validation">

                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><input type="text" name="username" class="form-control" placeholder="Name" required="" value="" />
                    <span class="text-danger"><?php echo form_error('username'); ?></span></li>                  

                  <li class="list-group-item"><input type="password" name="password" class="form-control" placeholder="Password" required="" value="" />
                    <span class="text-danger"><?php echo form_error('password'); ?></span></li>                  

                  <li class="list-group-item"><input type="submit" name="insert" value="Login" class="btn btn-primary" /></li>
                    <center><?php echo $this->session->flashdata("error"); ?></center>
                </ul>

              </form>
          </div>
        </div>
      </div>
  </div>

</br></br></br></br>

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
