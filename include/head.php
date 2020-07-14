 <?php include("web/functions/init.php"); ?>
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
            $rew = $_SESSION['Username'];
 $sql="SELECT SUM(sn) AS cart from support_reply WHERE `usname` = '$rew' AND `status` = 'unread'";
 $sqll="SELECT SUM(other) AS oth from support_reply WHERE `usname` = '$rew' AND `status` = 'unread'";

 $result_set= query($sql);
 $resul_set= query($sqll);

 while($row= mysqli_fetch_array($result_set)){
 while($ro= mysqli_fetch_array($resul_set)) 
 {
  
    $a = $row['cart'];
    $b = $ro['oth'];
    $c= $a + $b;
    $_SESSION['re'] = $a;
    $_SESSION['de'] = $b;
    $_SESSION['al'] = $c;
   if ($a == 0) {
    echo '
     ';
  }
  if ($b == 0) {
    echo '
     ';
  }
  if ($c == 0) {
    echo '
     ';
  } else {

    
  ?>                
          <span class="badge badge-danger navbar-badge"><?php echo $c; ?>
                
                </span>
                  
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="./compose" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $b; ?> new messages
           
          </a>
          <div class="dropdown-divider"></div>
          <a href="./compose" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> <?php echo $a; ?> new support reply
            
          </a>
          <?php
        
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