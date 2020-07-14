<?php
session_start();
if (isset($_SESSION['Username']))
 {

?>

<?php include("include/sider.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="web/./index">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                 <?php
 $sql="SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>         

                <h3 class="profile-username text-center"><?php echo $row['First Name']." ".$row['Last Name']; ?></h3>

                <p class="text-muted text-center"><?php echo $row['Username']; ?></p>

               

                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-lg"><b>Logout</b></a>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title">About You</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">
                 <?php echo $row['Address']; ?>
                </p>

                <hr>

                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted"><?php echo $row['Email']; ?></p>

                <hr>

                <strong><i class="fas fa-user mr-1"></i> Gender</strong>

                <p class="text-muted">
                 <?php echo $row['Gender']; ?>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Telephone</strong>

                <p class="text-muted"> <?php echo $row['Telephone']; ?></p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Change Password</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Your Account Details</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                  <form enctype="multipart/form-data" method="post" role="form">
       <?php validate_update(); ?>             
                  <div class="form-group">
                    <label class="col-form-label" for="inputWarning"> Input New Password</label>
                    <input type="Password" name="pword" class="form-control is-warning" id="inputWarning" placeholder="*******" required>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-form-label" for="inputWarning"> confirm Password</label>
                    <input type="Password" name="cpword" class="form-control is-warning" id="inputWarning" placeholder="*******" required>
                  </div>
                  

                  <input type="submit" name="submit" value="Update Password" class="btn btn-success float-right">
                </form>
                     
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    
                      
                      
        <?php
        $r = $_SESSION['Username'];
 $sql="SELECT * FROM ichange_product WHERE `Username` = '$r' LIMIT 1";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>                    
                   
                  <div class="form-group">
                    <label class="col-form-label" for="inputWarning"> Bank </label>
                    <input type="Password" name="pword" class="form-control is-warning" id="inputWarning" placeholder="<?php echo $row['Seller_Bank']; ?>" disabled>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-form-label" for="inputWarning"> Account Number</label>
                    <input type="Password" name="cpword" class="form-control is-warning" id="inputWarning" placeholder="<?php echo $row['Seller_Acct']; ?>" disabled>
                  </div>
                  

                  
                
                    <?php
                }
                ?> 
                    </div>
                      <!-- END timeline item -->
                     
                      <!-- END timeline item -->
                      <!-- timeline item -->
                     
                     
                    
                     
                    </div>
                  </div>
                  <!-- /.tab-pane -->

                  <?php 
}
?>
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
 <?php include("include/footer.php"); ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Are you sure you want logout?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Logging out will close your session...<br/>You can resume back your session by signing in from the homepage...</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <a href="./logout"><button type="submit" class="btn btn-primary">Logout</button></a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
<?php
}
else{
  header("location: web/./index2");
}

?>