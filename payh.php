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
            <h1>Pay History</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Payments Made to Seller(s)</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 15%">
                         Payment ID
                      </th>
                      <th style="width: 15%">
                          Seller Username
                      </th>
                      <th style="width: 15%">
                          Payment Amount
                      </th>
                      <th style="width: 15%">
                         Payment Date
                      </th>
                    
                  </tr>
              </thead>
                             </thead>
        <?php
         $uu = $_SESSION['Username'];
 $sql="SELECT * FROM seller_pay";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
         
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['transref']; ?> 
                      </td>
                      <td>
                     
                             <?php echo $row['username']; ?>
                        
                      </td>
                    
 <td>NGN <?php echo $row['payamt']; ?></td>';

                      <td>
                         
                         <?php echo $row['paydate']; ?>
                      </td>
                     
                  </tr>
                 
                  
                 
              </tbody>
              <?php
            }
            ?>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

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