<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NYP CCA Portal - Update Account</title>

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
          <?php if($this->session->userdata('role') == 'Admin') : ?>            
          <a class="nav-link" href="<?php echo base_url('index.php/Profile/'); ?>">Accounts</a>
          <?php elseif($this->session->userdata('role') != '') : ?>             
          <a class="nav-link" href="<?php echo base_url('index.php/Home/get_user/' .$this->session->userdata('userID') ); ?>">Account</a>
          <?php else : ?>   
          <?php endif; ?>
        </li>
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
          <li class="nav-item active">
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
    <h1 class="mt-4 mb-3">Update Profile
      <small><?php echo $query->name; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Account</li>
   </ol>

   <div class="row">
    <div class="offset-md-2 col-md-8 mb-4">
      <form class="" method="post" action="<?php echo base_url('index.php/home/update/'.$query->userID); ?>">
       <fieldset>
        <?php echo $this->session->flashdata('msg'); ?>

        <div class="form-group">
         <div class="row colbox">
           <div class="col-md-3">
             <label for="adminno" class="control-label">Admin Number</label>
           </div>
           <div class="row col-md-8">
            <input id="adminno" name="adminno" placeholder="Admin Number" type="text"
            class="form-control" disabled="disabled" value="<?php echo $query->adminNumber; ?>" />
            <span class="text-danger"><?php echo form_error('adminno'); ?></span>
          </div>
        </div>
      </div>

      <div class="form-group">
       <div class="row colbox">
         <div class="col-md-3">
           <label for="name" class="control-label">Student Name</label>
         </div>
         <div class="row col-md-8">
          <input id="name" name="name" placeholder="Name" type="text" 
          class="form-control" value="<?php echo set_value('name', $query->name); ?>" />
          <span class="text-danger"><?php echo form_error('name'); ?></span>
        </div>
      </div>
    </div>

    <div class="form-group">
     <div class="row colbox">
       <div class="col-md-3">
         <label for="password" class="control-label">Password</label>
       </div>
       <div class="row col-md-8">
        <input id="password" name="password" placeholder="Password" type="text"
        class="form-control" value="<?php echo $query->password; ?>" />
        <span class="text-danger"><?php echo form_error('password'); ?></span>
      </div>
    </div>
  </div>

  <div class="form-group">
   <div class="row colbox">
     <div class="col-md-3">
      <label for="gender" class="control-label">Gender</label>
    </div>
    <div class="row col-md-8">
      <input id="gender" name="gender" placeholder="Gender" type="text"
      class="form-control" disabled="disabled" value="<?php echo $query->gender; ?>" />
      <span class="text-danger"><?php echo form_error('gender'); ?></span>
    </div>
  </div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-3">
    <label for="dob" class="control-label">Date of Birth</label>
  </div>
  <div class="row col-md-8">
    <input id="dob" name="dob" placeholder="Date of Birth" type="text"
    class="form-control" value="<?php echo $query->dob; ?>" />
    <span class="text-danger"><?php echo form_error('dob'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-3">
     <label for="address" class="control-label">Address</label>
   </div>
   <div class="row col-md-8">
    <input id="address" name="address" placeholder="Address" type="text"
    class="form-control" value="<?php echo $query->address; ?>" />
    <span class="text-danger"><?php echo form_error('address'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-3">
     <label for="email" class="control-label">Email</label>
   </div>
   <div class="row col-md-8">
    <input id="email" name="email" placeholder="Email" type="text"
    class="form-control" value="<?php echo $query->email; ?>" />
    <span class="text-danger"><?php echo form_error('email'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-3">
     <label for="mobile" class="control-label">Mobile</label>
   </div>
   <div class="row col-md-8">
    <input id="mobile" name="mobile" placeholder="Mobile" type="text"
    class="form-control" value="<?php echo $query->mobile; ?>" />
    <span class="text-danger"><?php echo form_error('mobile'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="offset-md-3 row colbox text-center">
  <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary"
  value="Update" />
  <div class="col-md-1"></div>
  <a href="<?php echo base_url('index.php/home'); ?>">
  <input id="btn_cancel" name="btn_cancel" type="button" class="btn btn-danger"
  value="Cancel" />
  </a>
</div>
</div>
</fieldset>
<?php echo form_close(); ?>


</form>
</div>
</div>
</div>
<!-- /.container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
  <div class="container">
    <p class="m-0 text-center text-white">180 Ang Mo Kio Avenue 8 Singapore (569830) Tel: 64515115 </br>Copyright &copy; 2018 NYP, Singapore. All rights reserved.</p>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>




