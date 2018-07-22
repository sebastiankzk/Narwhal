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
              <a class="dropdown-item active" href="pricing.html">Pricing Table</a>
            </div>
          </li>
          <!-- Login Logout  -->
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('index.php/Profile'); ?>">Profile</a>         
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
    <h1 class="mt-4 mb-3">Account
      <small>Details</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item active">Account</li>
    </ol>

    <?php echo $this->session->flashdata('msg'); ?>

    <!-- Login form -->
    <div class="row">  
        <!-- <div class="col-lg-2 mb-4">
          <div class="list-group">
            <a href="index.html" class="list-group-item">Accounts</a>
            <a href="about.html" class="list-group-item">Update</a>
            <a href="services.html" class="list-group-item">Delete</a>
            <a href="contact.html" class="list-group-item">Contact</a>
            <a href="portfolio-1-col.html" class="list-group-item">1 Column Portfolio</a>
            <a href="portfolio-2-col.html" class="list-group-item">2 Column Portfolio</a>
          </div>
        </div> -->
        <div class="col-lg-12 mb-4">  
          <div class="table-responsive">    
            <h3 class="card-header bg-primary text-white">Accounts</h3>
            <table class="table table-striped table-hover">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Name</th>
                 <th>Password</th>
                 <th>Admin</th>
                 <th>Gender</th>
                 <th>Date of Birth</th>
                 <th>Address</th>
                 <th>Mobile</th>
                 <th>Role</th>
                 <th></th>
                 <th></th>
               </tr>
             </thead>
             <tbody>
               <?php for ($i = 0; $i < count($user); ++$i) { ?>
                 <tr>
                   <td><?php echo ($i+1); ?></td>
                   <td><?php echo $user[$i]->name; ?></td>
                   <td><?php echo $user[$i]->password; ?></td>
                   <td><?php echo $user[$i]->adminNumber; ?></td>
                   <td><?php echo $user[$i]->gender; ?></td>
                   <td><?php echo $user[$i]->dob; ?></td>
                   <td><?php echo $user[$i]->address; ?></td>
                   <td><?php echo $user[$i]->mobile; ?></td>
                   <td><?php echo $user[$i]->role; ?></td>
                   <td><a href="<?php echo base_url('index.php/Profile/get_user/'.$user[$i]->adminNumber); ?>" class="btn btn-primary">Edit &rarr;</a></td>
                   <td><a href="" class="btn btn-danger">Delete &rarr;</a></td>
                 </tr>
               <?php } ?>
             </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>

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
