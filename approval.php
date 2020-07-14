<?php
session_start();
if (isset($_SESSION['Username']))
 {

?>
<?php include("include/sidebarr.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Thank You for becoming a seller on iChange Delivery</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="web/index.php">Home</a></li>
              <li class="breadcrumb-item active">Seller Store</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              
              <br/>
<h2></h2>
                                <h6>Your Product will be listed among product sale once approved.<br/>
                            Kindly call: 07016169889 or 09030743719 in order to submit your product<br/><br/>

                            Note that you will get an email notification once your product has been sold.<br/> Payment takes up to 3 days before you get credited<br/><br/>

                            

                        </h6>
                                <p><i>iChange Team</i></p>            </div>


          </div><!-- /.col -->

        </div><!-- /.row -->
 <!-- this row will not appear when printing -->
          
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
  header("location: https://ichangedelivery.com.ng/index2.php");
}

?>