<?php
session_start();
if (isset($_SESSION['Username']))
 {

?>
<?php

$vote = $_GET['id'];
$data = $_SESSION['Username'];
$con = mysqli_connect("localhost","root","","ichange");

$sqll = "UPDATE support_reply SET `status` ='read', `other` = '0' WHERE `usname`= '$data' AND `ref` = '$vote'";
$res = mysqli_query($con, $sqll);

?>

<?php include("include/sider.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="web/./index">Home</a></li>
              <li class="breadcrumb-item active">Support Ticket</li>
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

           
            <!-- /.card -->

                  
          
          </div>
          <!-- /.col -->
          <div class="col-md-12">
           
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
                  <div class="col-md-12">
                      <?php
                      $u = $_SESSION['Username'];
                      $r  = $_GET['id'];
 $sql="SELECT  `usname` = '$u', `msg`, `date`, `status` = 'unread' from support_reply WHERE `ref` = '$r'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
if (empty($result_set)) {
  echo '';
 } else {
  ?>            
          <div class="card card-primary card-outline">
            
            <!-- /.card-header -->
            <div class="card-body p-0">
                    <div class="col-md-">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">New Mail</h3>
              
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
              
                <h6>From: support@ichangedelivery.com.ng
                  <span class="mailbox-read-time float-right"><?php echo $row['date']; ?></span></h6>
              </div>
              
              <div class="mailbox-read-message">
                
                <p><?php echo $row['msg']; ?></p>

                
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->

            <!-- /.card-footer -->
            <div class="card-footer" id="poll">
               <a href="./compose"><button type="button" class="btn btn-default">Go Back</button></a>
             
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
         
            </div>

              <!-- /.mail-box-messages -->

            </div>
            <!-- /.card-body -->
             <?php
              }
            }
          
              
              ?>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
                    <!-- /.post -->
                  </div>




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

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
</script>

</body>
</html>
<?php
}
else{
  header("location: web/./index2");
}

?>