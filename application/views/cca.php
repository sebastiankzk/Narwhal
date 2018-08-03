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
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <?php if($this->session->userdata('role') == 'Admin') : ?>            
              <a class="nav-link" href="<?php echo base_url('index.php/Profile/'); ?>">Accounts</a>
            <?php elseif($this->session->userdata('role') != '') : ?>             
              <a class="nav-link" href="<?php echo base_url('index.php/Home/get_user/' .$this->session->userdata('userID') ); ?>">Account</a>
            <?php else : ?>   
            <?php endif; ?>
          </li>
          <li class="nav-item">
                <?php if($this->session->userdata('role') == 'Leader') : ?>            
                  <a class="nav-link" href="<?php echo base_url('index.php/leader/view_record/'. $this->session->userdata('userID') ); ?>">Attendance</a>
              <?php endif; ?>
            </li>
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
          <li class="nav-item dropdown active">
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
          <li class="nav-item">
            <?php if($this->session->userdata('username') != '') : ?>            
              <a class="nav-link">Hello, <?php echo $this->session->userdata('username'); ?></a>
            <?php endif; ?>        
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3"><?php echo $query->name; ?>
    </h1>
    <br/>    

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/<?php echo $query->image; ?>" alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3"><?php echo $query->name; ?></h3>
        <p><?php echo $query->category; ?></p>
        <p><?php echo $query->information; ?></p>
        <p>Venue: <?php echo $query->venue; ?></p>
        <p>Training Date: <?php echo $query->trgDate; ?></p>
        <p>Training Time: <?php echo date(" h:i A", strtotime($query->startTime)); ?></p>
      </br>
      <?php if($this->session->userdata('role') != '') : ?>
        <?php if($checkIfRegisted) : ?>
          You already Expressed your interest in this CCA.
        <?php elseif(!$limitCheck): ?> 
          You already Hit your limit of CCA registered.
        <?php else : ?> 
          <a href="<?php echo base_url('index.php/home/cca_register_interest/'.$query->ccaID); ?>" class="btn btn-primary">Register your interest here! &rarr;</a>
        <?php endif?>
      <?php else : ?> 
        <a href="<?php echo base_url('index.php/login'); ?>" class="btn btn-primary">Login to register your interest &rarr;</a>            
      <?php endif; ?> 
    </br> </br> 
    <b><?php echo $this->session->flashdata('msg');?></b>     
  </div>

</div>
<!-- /.row -->

<!-- Related Projects Row -->
<h3 class="my-4">Recent Photos</h3>

<div class="row">

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/<?php echo $query->image; ?>" alt="">
    </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/<?php echo $query->image; ?>" alt="">
    </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/<?php echo $query->image; ?>" alt="">
    </a>
  </div>

  <div class="col-md-3 col-sm-6 mb-4">
    <a href="#">
      <img class="img-fluid" src="<?php echo base_url(); ?>assets/images/<?php echo $query->image; ?> " alt="">
    </a>
  </div>

</div>
<!-- /.row -->

</div>
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
