<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NYP CCA Portal - Update CCA</title>

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
          <a class="nav-link" href="about.html">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Services</a>
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
    <h1 class="mt-4 mb-3">Update Profile
      <small><?php echo $query->name; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item">Profile</li>
      <li class="breadcrumb-item active">Update</li>
    </ol>

    <div class="row">
      <div class="offset-md-3 col-md-6 mb-4">
        <form class="form-control" method="post" action="<?php echo base_url('index.php/Profile/update/'.$query->adminNumber); ?>">
         <legend>Update Account</legend>
         <hr>
         <fieldset>

          <div class="form-group">
           <div class="row colbox">
             <div class="col-md-4">
               <label for="studentno" class="control-label">Student Number</label>
             </div>
             <div class="col-md-8">
              <input id="adminno" name="adminno" placeholder="adminno" type="text"
              class="form-control" value="<?php echo $query->adminNumber; ?>" />
              <span class="text-danger"><?php echo form_error('adminno'); ?></span>
            </div>
          </div>
        </div>

        <div class="form-group">
         <div class="row colbox">
           <div class="col-md-4">
             <label for="studentname" class="control-label">Student Name</label>
           </div>
           <div class="col-md-8">
            <input id="name" name="name" placeholder="name"
            type="text" class="form-control" value="<?php echo set_value('name',
            $query->name); ?>" />
            <span class="text-danger"><?php echo form_error('name'); ?></span>
          </div>
        </div>
      </div>

      <div class="form-group">
       <div class="row colbox">
         <div class="col-md-4">
           <label for="password" class="control-label">Password</label>
         </div>
         <div class="col-md-8">
          <input id="password" name="password" placeholder="password" type="text"
          class="form-control" value="<?php echo $query->password; ?>" />
          <span class="text-danger"><?php echo form_error('password'); ?></span>
        </div>
      </div>
    </div>

    <div class="form-group">
     <div class="row colbox">
       <div class="col-md-4">
        <label for="gender" class="control-label">Gender</label>
       </div>
       <div class="col-md-8">
        <input id="gender" name="gender" placeholder="gender" type="text"
        class="form-control" value="<?php echo $query->gender; ?>" />
        <span class="text-danger"><?php echo form_error('gender'); ?></span>
      </div>
    </div>
  </div>

      <div class="form-group">
     <div class="row colbox">
       <div class="col-md-4">
        <label for="dob" class="control-label">Date of Birth</label>
       </div>
       <div class="col-md-8">
        <input id="dob" name="dob" placeholder="dob" type="text"
        class="form-control" value="<?php echo $query->dob; ?>" />
        <span class="text-danger"><?php echo form_error('dob'); ?></span>
      </div>
    </div>
  </div>

  <div class="form-group">
   <div class="row colbox">
     <div class="col-md-4">
       <label for="address" class="control-label">Address</label>
     </div>
     <div class="col-md-8">
      <input id="address" name="address" placeholder="address" type="text"
      class="form-control" value="<?php echo $query->address; ?>" />
      <span class="text-danger"><?php echo form_error('address'); ?></span>
    </div>
  </div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-4">
     <label for="email" class="control-label">Email</label>
   </div>
   <div class="col-md-8">
    <input id="email" name="email" placeholder="email" type="text"
    class="form-control" value="<?php echo $query->email; ?>" />
    <span class="text-danger"><?php echo form_error('email'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-4">
     <label for="mobile" class="control-label">Mobile</label>
   </div>
   <div class="col-md-8">
    <input id="mobile" name="mobile" placeholder="mobile" type="text"
    class="form-control" value="<?php echo $query->mobile; ?>" />
    <span class="text-danger"><?php echo form_error('mobile'); ?></span>
  </div>
</div>
</div>

<div class="form-group">
 <div class="row colbox">
   <div class="col-md-4">
     <label for="role" class="control-label">Role</label>
   </div>
   <div class="col-md-8">
    <input id="role" name="role" placeholder="role" type="text"
    class="form-control" value="<?php echo $query->role; ?>" />
    <span class="text-danger"><?php echo form_error('role'); ?></span>
  </div>
</div>
</div>


<div class="form-group">
 <div class="offset-sm-2 col-md-8 text-center">
  <input id="btn_update" name="btn_update" type="submit" class="btn btn-primary"
  value="Update" />
  <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger"
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
  <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

<!-- <script>
  // assumes you're using jQuery
  $(document).ready(function() {
    $('.confirm-div').hide();
    <?php if($this->session->flashdata('msg')){ ?>
      $('.confirm-div').html('<?php echo $this->session->flashdata('msg'); ?>').show();
    });
<?php } ?>
</script> -->


