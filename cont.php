<?php
session_start();
if (isset($_SESSION['Password']))
 {

?>
<?php
$_SESSION['seller'] = $_GET['id'];
?>
<?php include("include/admsider.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Seller Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="web/./index">Home</a></li>
              <li class="breadcrumb-item active">Seller`s Profile</li>
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
 $sql="SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['seller']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>         

                <h3 class="profile-username text-center"><?php echo $row['First Name']." ".$row['Last Name']; ?></h3>

                <p class="text-muted text-center"><?php echo $row['Username']; ?></p>

               
                <?php echo '
                <a href="tel: '.$row['Telephone'].'" class="btn btn-primary btn-block"><b>Call Seller</b></a>';
                ?>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary ">
              <div class="card-header">
                <h3 class="card-title">About Seller</h3>
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
                 
                  <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Seller Bank Details.:</a></li>
                 
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                
                  <!-- /.tab-pane -->
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    
                      
                   
  <?php
        $r = $_SESSION['seller'];
 $sql="SELECT `service_fee`, SUM(Product_Price) AS summer FROM ichange_product WHERE `Username` = '$r' AND `status`= 'delivered' AND `defaulter` = 'uncredited'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  $s = $row['summer'];
  $t = $row['service_fee'];
  $y = $s-$t;
  $_SESSION['pay'] = $y;
  ?>              
                    <div class="form-group">
                    <label class="col-form-label" for="inputWarning"> Amount to Credit Seller.: </label>
                    <p>NGN <?php echo $y; ?></p>
                  </div> 
                  <?php
                }
                ?>

        <?php
        $r = $_SESSION['seller'];
 $sql="SELECT * FROM ichange_product WHERE `Username` = '$r' LIMIT 1";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>                    
                  <div class="form-group">
                    <label class="col-form-label" for="inputWarning"> Bank Name.:</label>
                    <p><?php echo $row['Seller_Bank']; ?></p>
                  </div>
                  
                      <div class="form-group">
                    <label class="col-form-label" for="inputWarning"> Account Number.:</label>
                   <p><?php echo $row['Seller_Acct']; ?></p>
                  </div>
                  
                      <input type="submit" name="submit" data-toggle="modal" data-target="#modal-lg" value="Update Credit" class="btn btn-success float-right">
                
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
              <h4 class="modal-title">Update Seller Credit?</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>This allows you to update the credit status of a seller.<br/> Make sure the seller has been credited from the bank before updating the seller`s credit.</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <a href="credit.php"><button type="submit" class="btn btn-primary">Continue</button></a>
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
  header("location: web/./index");
}

?>