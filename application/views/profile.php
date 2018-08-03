<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NYP CCA Portal - Accounts</title>

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
            <li class="nav-item active">
              <?php if($this->session->userdata('role') == 'Admin') : ?>            
                <a class="nav-link" href="<?php echo base_url('index.php/Profile/'); ?>">Accounts</a>
                <?php elseif($this->session->userdata('role') != '') : ?>               
                <a class="nav-link" href="<?php echo base_url('index.php/Home/get_user/' .$this->session->userdata('userID') ); ?>">Account</a>
                <?php else : ?>   
                <?php endif; ?>
              </li>
              <li class="nav-item">
                <?php if($this->session->userdata('role') == 'Leader') : ?>            
                  <a class="nav-link" href="<?php echo base_url('index.php/leader/view_record/'. $this->session->userdata('ccaID') ); ?>">Attendance</a>
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
      <h1 class="mt-4 mb-3">Accounts
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="<?php echo base_url('index.php'); ?>">Home</a>
        </li>
        <li class="breadcrumb-item active">
         <a href="<?php echo base_url('index.php/Profile/'); ?>">Accounts
         </a>
       </li>
     </ol>

     <!-- Login form -->
     <div class="row">
        <div class="col-lg-12 mb-4">  
          <div class="table-responsive">   
            <?php echo $this->session->flashdata('msg'); ?> 
            <!-- <h3 class="card-header bg-primary text-white">Accounts</h3> -->
            <h3 class="card-header text-black">
              <form class="form-inline" action="<?php echo base_url('index.php/Profile/search_user'); ?>" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" name="search" id="search" placeholder="Name">
                  <input id="search" name="searchbtn" type="submit" class="btn btn-secondary"
                  value="Search" />
                </div>
              </form>
            </h3>
            <table class="table table-striped table-hover">
             <thead>
               <tr>
                 <th>#</th>
                 <th>Name</th>
<!--                  <th>Password</th> -->
                 <th>Admin</th>
                 <th>Gender</th>
                 <th>Birth date</th>
                 <th>Address</th>
                 <th>Mobile</th>
                 <th>Role</th>
                 <th></th>
                 <th><a href="<?php echo base_url('index.php/Profile/create_user'); ?>" class="btn btn-success ">Add user</a></th>
                 
               </tr>
             </thead>
             <tbody>
               <?php for ($i = 0; $i < count($user); ++$i) { ?>
                 <tr>
                   <td><?php echo ($i+1); ?></td>
                   <td><?php echo $user[$i]->name; ?></td>
<!--                    <td><?php echo $user[$i]->password; ?></td> -->
                   <td><?php echo $user[$i]->adminNumber; ?></td>
                   <td><?php echo $user[$i]->gender; ?></td>
                   <td><?php echo $user[$i]->dob; ?></td>
                   <td><?php echo $user[$i]->address; ?></td>
                   <td><?php echo $user[$i]->mobile; ?></td>
                   <td><?php echo $user[$i]->role; ?></td>
                   <td><a href="<?php echo base_url('index.php/Profile/get_user/'.$user[$i]->userID); ?>" class="btn btn-primary">Edit</a></td>
                   <td><a href="<?php echo base_url('index.php/Profile/delete/'.$user[$i]->userID); ?>" class="btn btn-danger" onclick="return confirm('Comfirm delete <?php echo($user[$i]->name); ?>?')">Delete</a></td>
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
   </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url();?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url();?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
