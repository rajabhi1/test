<!DOCTYPE html>
<html>
<head>
	<title>Record</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style type="text/css">
    .error{
      color: red;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="<?= base_url('admin'); ?>">Record</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarColor03">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('admin/index') ?>">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/about_us'); ?>">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/contactus'); ?>">contact</a>
          </li>

        <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
              Categories
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="<?php echo base_url('admin/category'); ?>">Men</a>
              <a class="dropdown-item" href="<?php echo base_url('admin/category'); ?>">women</a>
              <a class="dropdown-item" href="<?php echo base_url('admin/category'); ?>">Product</a>
            </div>
          </li>
          <?php 
            if(is_null($this->session->userdata('id'))){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/login'); ?>">login</a>
          </li>
          <?php }else{ ?>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('admin/logout'); ?>">logout</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-success btn-sm ml-3" href="#">
                <i class="fa fa-shopping-cart"></i> Cart
                <span class="badge badge-light">3</span>
            </a>
         </li>
         <?php } ?>
         
        </ul>
     </div>
    </nav>