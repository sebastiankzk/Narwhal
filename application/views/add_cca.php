<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NYP CCA Portal - Add new CCA</title>

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
      <h1 class="mt-4 mb-3">Add new CCA
      </h1>
      <br/>
      
    <form method="post" action="<?php echo base_url('index.php/admin/add_specific_cca/'); ?>">
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
          <label for="name">Name</label>
        </div>
        <div class="row col-lg-6">
          <input type="text" name="name" class="form-control" placeholder="Name" required="" value=""</div>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
          <label for="category">Category</label>
        </div>
        <div class="row col-lg-6">
          <input type="text" name="category" class="form-control" placeholder="Category" required="" value=""</div>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
          <label for="information">Information</label>
        </div>
        <div class="row col-lg-6">
          <textarea name="information" class="form-control" required="" rows="10"></textarea>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
          <label for="venue">Venue</label>
        </div>
        <div class="row col-lg-6">
          <input type="text" name="venue" class="form-control" placeholder="Venue" required="" value=""</div>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
          <label for="trgDate">Training Date</label>
        </div>
        <div class="row col-lg-6">
          <input type="text" name="trgDate" class="form-control" placeholder="Training Date" required="" value=""</div>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
          <label for="trgTime">Training Time</label>
        </div>
        <div class="row col-lg-6">
          <input type="text" name="trgTime" class="form-control" placeholder="Training Time" required="" value=""</div>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2">
          <label for="image">Image</label>
        </div>
        <div class="row col-lg-6">
          <input type="text" name="image" class="form-control" placeholder="Image URL" required="" value=""</div>
        </div>
      </div>
      <br/>
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-6">            
          <input type="submit" name="submit" value="Add" class="btn btn-primary" />      
        </div>
      </div> 
      <br/>            
    </form>
    
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
