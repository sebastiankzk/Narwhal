<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>NYP CCA Portal - Update Attendance</title>

  <!-- Bootstrap core CSS -->
  <link href="<?=base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="<?=base_url();?>assets/css/modern-business.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/vendor/jquery/jquery-ui/jquery-ui.min.css">

  <script type="text/javascript" src="assets/vendor/jquery/jquery.js"></script>
  <script type="text/javascript" src="assets/vendor/jquery/jquery-ui/jquery-ui.min.js"></script>

  <style type="text/css">
  table, th, td {
   text-align: center;
 }</style>

 <!-- <style type="text/css">
  .form-control {
   width: 50%;
   align-self: center;
 }</style> -->


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
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Attendance
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
            <a class="dropdown-item" href="<?php echo base_url('index.php/leader/get_record/'); ?>">Create Record</a>
            <a class="dropdown-item" href="<?php echo base_url('index.php/leader/get_record/'); ?>">Update Record</a>
          </div>
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
  <h1 class="mt-4 mb-3">Create Attendance
  </h1>
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="<?php echo base_url('index.php'); ?>">Home</a>
    </li>
    <li class="breadcrumb-item active">Create
   </li>
 </ol>

 <div class="row">
  <div class="col-lg-12 mb-4"> 
    <?php
        $attributes = array("class" => "", "id" => "addprofile", "name" => "addprofile");
          echo form_open("leader/create_record/". $query[0]->ccaID, $attributes);?>

    <fieldset>

      <div class="form-group">
       <div class="row colbox">
         <div class="offset-md-1 col-md-2">
          <label for="date" class="control-label">Date</label>
        </div>
        <div class="col-md-6">
          <input id="date" name="date" placeholder="" type="Date"
          class="form-control" value="<?php echo set_value('date'); ?>" />
          <span class="text-danger"><?php echo form_error('date'); ?></span>
        </div>
      </div>
    </div>

    <div class="form-group">
     <div class="row colbox">
       <div class="offset-md-1 col-md-2">
        <label for="time" class="control-label">Time</label>
      </div>
      <div class="col-md-6">
        <input id="time" name="time" placeholder="" type="time"
        class="form-control" value="<?php echo set_value('time'); ?>" />
        <span class="text-danger"><?php echo form_error('time'); ?></span>
      </div>
    </div>
  </div>

  <script type="text/javascript">
 //load datepicker control onfocus
 $(function() {$("#date").datepicker();
});
</script>

<div class="table-responsive">   
  <!-- <h3 class="card-header bg-primary text-white">Accounts</h3> -->
  <table class="table table-striped table-hover">
   <thead>
       <th>Student</th>
       <th>CCA</th>
       <th>Present</th>
       <th>Absent</th>
       <th>Reason</th>
       <th>Remarks</th>
     </tr>
   </thead>
   <tbody>
    
     <?php foreach($query as $row){?>
     <tr>
       <td> <input size="5" id="username" name="username[]" type="text" class="form-control" value="<?php echo $row->User_name; ?>"/>
            <input type="hidden" id="userid" name="userid[]" value="<?php echo $row->userID; ?>">
       </td>
       <td><input size="5" id="ccaname" name="ccaname[]" type="text" class="form-control" value="<?php echo $row->cca_name; ?>"/>
            <input type="hidden" id="ccaid" name="ccaid[]" value="<?php echo $row->ccaID; ?>">
       </td>
       <td>
       <input type="radio" name="attendance<?php echo $row->userID; ?>[]" value="Present" Checked >
       </td>
       <td>
       <input type="radio" name="attendance<?php echo $row->userID; ?>[]"  value="Absent">
       </td>
       <td>
            <input size="5" id="reason" name="reason[]" placeholder="Reason" type="text" class="form-control" value=""/>
       </td>
       <td>    
            <input size="5" id="remarks" name="remarks[]" placeholder="Remarks" type="text" class="form-control" value="" />
       </td>

     </tr>
     <?php } ?>
   </tbody>
 </table>
</div>

<div class="offset-sm-2 col-md-8 text-center">
  <input id="btn_create" name="btn_create" type="submit" class="btn btn-secondary"
  value="Create" />
  <input id="btn_cancel" name="btn_cancel" type="reset" class="btn btn-danger"
  value="Cancel" />
</div>

<?php echo $this->session->flashdata('msg'); ?>
</fieldset>
<?php echo form_close(); ?>

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