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
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
     <link rel="icon" href="img/core-img/favicon.ico">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
 <?php include("web/functions/init.php"); ?>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href=""><b>Admin Login</b></a>
  </div>
  <!-- User name -->
    <?php
 $sql="SELECT * FROM ichange_admin";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>         
  <div class="lockscreen-name"><?php echo $row['First Name']." ".$row['Last Name']; ?></div>
  <?php 
}
?>
<?php validate_admlogin(); ?>
  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="img/core-img/favicon.ico" alt="User Image">
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->

    <form method="post" class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" name="pword" placeholder="password" required>

        <div class="input-group-append">
          <button type="submit" class="btn"><i class="fas fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
    Enter your password to retrieve your session
  </div>
 
  <div class="lockscreen-footer text-center">
    Copyright @ <b> <a href="http://switch.com.ng" class="text-black">Switch NG</a></b> <?php echo date("Y"); ?> <br>
   Powered by:  <a target="_blank" href="https://www.google.com/search?q=doteightinc&rlz=1C1CHBF_enNG876NG876&oq=dot&aqs=chrome.1.69i57j69i59j69i60l2.2204j0j9&sourceid=chrome&ie=UTF-8" class="text-black">DotEightInc.</a>
  </div>
</div>
<!-- /.center -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
