 <?php include("web/functions/init.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Switch NG</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <link rel="icon" href="img/core-img/favicon.ico">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
    $_SESSION['deliver'] = $c;
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
          <a href="./product" class="dropdown-item">
            <i class="fas fa-list mr-2"></i> <span style="color: red;"><?php echo $b; ?></span> New Product(s)
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="./delivery" class="dropdown-item">
            <i class="fas fa-medal mr-2"></i> <span style="color: red;"><?php echo $_SESSION['deliver']; ?></span> New Order(s)
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="./product" class="dropdown-item">
            <i class="fas fa-check mr-2"></i> <span style="color: red;"><?php echo $d; ?></span> Sold Product(s)
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="./compose" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> <span style="color: red;"><?php echo $a; ?></span> New Support Ticket(s)
            
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