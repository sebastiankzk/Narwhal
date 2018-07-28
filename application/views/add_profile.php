<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NYP CCA Portal - Add Accounts</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url();?>assets/css/modern-business.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/jquery/jquery-ui/jquery-ui.min.css">

  <script type="text/javascript" src="assets/vendor/jquery/jquery.js"></script>
  <script type="text/javascript" src="assets/vendor/jquery/jquery-ui/jquery-ui.min.js"></script>

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
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url('index.php/Profile/'); ?>">Accounts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            CCA
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            <a class="dropdown-item" href="<?php echo base_url('index.php/home/cca_list'); ?>">View all CCA</a>
            <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
            <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
            <a class="dropdown-item" href="blog-post.html">Blog Post</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Portfolio
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
            <a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
            <a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Blog
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            <a class="dropdown-item" href="blog-home-1.html">Blog Home 1</a>
            <a class="dropdown-item" href="blog-home-2.html">Blog Home 2</a>
            <a class="dropdown-item" href="blog-post.html">Blog Post</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Other Pages
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            <a class="dropdown-item" href="full-width.html">Full Width Page</a>
            <a class="dropdown-item" href="sidebar.html">Sidebar Page</a>
            <a class="dropdown-item" href="faq.html">FAQ</a>
            <a class="dropdown-item" href="404.html">404</a>
            <a class="dropdown-item" href="pricing.html">Pricing Table</a>
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

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Add Account
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item">
       <a href="<?php echo base_url('index.php/Profile/'); ?>">Accounts</a>
     </li>
     <li class="breadcrumb-item active">Create</li>
   </ol>

   <div class="row">
    <div class="offset-md-2 col-md-8 mb-4">
        <?php
        $attributes = array("class" => "", "id" => "addprofile", "name" => "addprofile");
          echo form_open("Profile/create_user", $attributes);?>
          <fieldset>

            <div class="form-group">
             <div class="row colbox">
               <div class="col-md-3">
                 <label for="adminno" class="control-label">Admin Number</label>
               </div>
               <div class="row col-md-8">
                <input id="adminno" name="adminno" placeholder="Admin Number" type="text"
                class="form-control" value="<?php echo set_value('adminno'); ?>" />
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
              <input id="name" name="name" placeholder="Name"
              type="text" class="form-control" value="<?php echo set_value('name'); ?>" />
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
            class="form-control" value="<?php echo set_value('password'); ?>" />
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
          <?php $gender = array(
            'Male' => 'Male',
            'Female'  => 'Female',
          );
          echo form_dropdown('gender', $gender, 'Male', '<input class="form-control"', '/>');?>
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
        <input id="dob" name="dob" placeholder="Date of Birth" type="Date"
        class="form-control" value="<?php echo set_value('dob'); ?>" />
        <span class="text-danger"><?php echo form_error('dob'); ?></span>
      </div>
    </div>
  </div>

  <script type="text/javascript">
 //load datepicker control onfocus
 $(function() {$("#dob").datepicker();
});
</script>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-3">
     <label for="address" class="control-label">Address</label>
   </div>
   <div class="row col-md-8">
    <input id="address" name="address" placeholder="Address" type="text"
    class="form-control" value="<?php echo set_value('address'); ?>" />
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
    class="form-control" value="<?php echo set_value('email'); ?>" />
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
    class="form-control" value="<?php echo set_value('mobile'); ?>" />
    <span class="text-danger"><?php echo form_error('mobile'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-3">
     <label for="role" class="control-label">Role</label>
   </div>
   <div class="row col-md-8">
    <?php $role = array(
      'student' => 'Student',
      'leader'  => 'Leader',
      'admin'   => 'Admin',
    );
    echo form_dropdown('role', $role, 'student', '<input class="form-control"', '/>');?>
    <span class="text-danger"><?php echo form_error('role'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="offset-md-3 row colbox text-center">
  <input id="btn_create" name="btn_create" type="submit" class="btn btn-primary"
  value="Create" />
  <div class="col-md-1"></div>
  <a href="<?php echo base_url('index.php/Profile'); ?>">
  <input id="btn_cancel" name="btn_cancel" type="button" class="btn btn-danger"
  value="Cancel" />
</div>
</div>

<?php echo $this->session->flashdata('msg'); ?>
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