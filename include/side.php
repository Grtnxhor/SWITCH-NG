<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Switch NG | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

    <link rel="icon" href="img/core-img/favicon.ico">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<?php include("web/functions/init.php"); ?>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="web/./index" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="mailto: support@ichangedelivery.com.ng" class="nav-link">Contact</a>
      </li>
    </ul>

  
    
  </nav>
  <!-- /.navbar -->

   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
   <a href="https://switch.com.ng/" class="brand-link">
      <img src="img/core-img/favicon.ico" alt="Switch NG" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Switch NG</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <?php
$name = $_SESSION['Username'];
$sql = "SELECT * FROM ichange_signup WHERE `Username` = '$name'";
$result = query($sql);
while($row = mysqli_fetch_array($result))
 {
  ?>     
        <div class="info">
          <a href="./profile" class="d-block"><?php echo $row['First Name']." ".$row['Last Name']." (  ".$row['Username']." )" ; ?></a>
          
          <a style="font-size: 13px;" href="#" class="d-block">&nbsp;&nbsp;&nbsp;Last Seen: <?php echo $row['lstseen']; ?></a>
        </div>
     <?php
 }

 ?>       
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="./index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
           
          </li>
          <br/>
          <li class="nav-item">
            <a href="./simple" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                Sales
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right"><?php echo $_SESSION['new'];?></span>
              </p>
            </a>
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./e-commerce" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Delivery
                <i class="fas fa-angle-right right"></i>
               
              </p>
            </a>

          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./seller" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Seller Store
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
          <br/>
           <li class="nav-item has-treeview">
            <a href="./credited" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
               Credit History
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./buyer" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Terms and Conditions
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>

          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./compose" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Support Ticket
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right"><?php echo $_SESSION['al'];?></span>
              </p>
            </a>
            
          </li>
          
          <br/>
          <li class="nav-item has-treeview">
            <a href="./profile" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profile
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            
          </li>
          
        
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>