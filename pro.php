<?php
session_start();
if (isset($_SESSION['Password']))
 {

?>

<?php include("include/admsider.php"); ?>

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
 $sql="SELECT * FROM ichange_admin ";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>         

                <h3 class="profile-username text-center"><?php echo $row['First Name']." ".$row['Last Name']; ?></h3>

                <p class="text-muted text-center"><?php echo $row['Username']; ?></p>

               

                <a href="./log" class="btn btn-primary btn-block"><b>Logout</b></a>
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
                

                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                <p class="text-muted"><?php echo $row['Email']; ?></p>

                <hr>


                <strong><i class="far fa-file-alt mr-1"></i> Telephone</strong>

                <p class="text-muted"> <?php echo $row['Tel']; ?></p>
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
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Date Registered</a></li>
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Last Seen</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <!-- Post -->
                    <div class="post">
                      <div class="user-block">
                       
                        <span class="username">
                          <a href="#"><?php echo $row['Datereg']; ?></a>
                         
                        </span>
                      
                      </div>
                      <!-- /.user-block -->
                     
                     
                    </div>
                    <!-- /.post -->

                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                         <?php echo date("d-m-y"); ?>
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> <?php echo date("h:i:sa"); ?></span>

                          <h3 class="timeline-header"><a href="#">You were last seen;</a></h3>

                          <div class="timeline-body">
                            <?php echo $row['lstseen']; ?>
                          </div>
                         
                        </div>
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
  header("location: ./lockscreen");
}

?>