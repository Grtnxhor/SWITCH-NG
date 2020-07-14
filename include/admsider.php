<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Switch NG </title>
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
        <a href="mailto: support@switch.com.ng" class="nav-link">Contact</a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
                       <?php
            $rew = $_SESSION['Password'];
 $sql="SELECT SUM(sn) AS cart from support WHERE `status` = 'Open'";
 $sql2="SELECT SUM(Product_sn) AS product from ichange_product WHERE `Approved` = 'Pending'";
 $sql3="SELECT SUM(sn) AS deal from product_order WHERE `status` = 'in transit'";
 $sql4="SELECT SUM(Product_sn) AS cart from ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'uncredited' AND `status` = 'delivered'";
 $result_set= query($sql);
 while($row= mysqli_fetch_array($result_set)){
  $result_set2= query($sql2);
 while($row2= mysqli_fetch_array($result_set2)){
  $result_set3= query($sql3);
 while($row3= mysqli_fetch_array($result_set3)){
  $result_set4= query($sql4);
 while($row4= mysqli_fetch_array($result_set4)){
  
    $a = $row['cart'];
    $b = $row2['product'];
    $c = $row3['deal'];
    $d = $row4['cart'];
    $e = $a + $b + $c + $d;
    $f = $b + $d;
    $_SESSION['sold'] = $f;
   if ($e == 0) {
    echo '
     ';
  } else {
    
  ?>   
          <span class="badge badge-danger navbar-badge"><?php echo $e; ?>
                
                </span>
                  
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="./compose" class="dropdown-item">
            <i class="fas fa-list mr-2"></i> <?php echo $b; ?> New Product(s)
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="./delivery" class="dropdown-item">
            <i class="fas fa-medal mr-2"></i> <?php echo $c; ?> New Order(s)
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="./compose" class="dropdown-item">
            <i class="fas fa-check mr-2"></i> <?php echo $d; ?> Sold Product(s)
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="./compose" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> <?php echo $a; ?> New Support Ticket(s)
            
          </a>
          <?php
    

        }
        }
      }
                }
           }
           ?>
          <div class="dropdown-divider"></div>
          
        </div>
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
$sql = "SELECT * FROM ichange_admin";
$result = query($sql);
while($row = mysqli_fetch_array($result))
 {
  ?>     
        <div class="info">
          <a href="./pro" class="d-block"><?php echo $row['First Name']." ".$row['Last Name']." (  ".$row['Username']." )" ; ?></a>
          
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
            <a href="./admdex" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
           
          </li>
          <br/>
          <li class="nav-item">
            <a href="./Product" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>
                All Product
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right"><?php echo $_SESSION['sold'];?></span>
              </p>
            </a>
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./Delivery" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Delivery
                <i class="fas fa-angle-right right"></i>
                <span class="badge badge-info right"><?php echo $_SESSION['deliver'];?></span>
              </p>
            </a>

          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./user" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Registered Users
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
         <br/>
         
           <li class="nav-item has-treeview">
            <a href="./payh" class="nav-link">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
               Payment History
                <i class="right fas fa-angle-right"></i>
              </p>
            </a>
            
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./tick" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Support Ticket
                <i class="fas fa-angle-right right"></i>
              </p>
            </a>
            
          </li>
          <br/>
          <li class="nav-item has-treeview">
            <a href="./pro" class="nav-link">
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