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
            <h1>Undelivered Order</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Undelivered Order Details</h3>

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
                          ID
                      </th>
                      <th style="width: 15%">
                          Item
                      </th>
                      <th style="width: 15%">
                          Product Picture
                      </th>
                      <th style="width: 15%">
                         Delivery
                      </th>
                      <th style="width: 15%">
                         Contact Buyer
                      </th>
                      <th style="width: 15%">
                        Approve
                      </th>
                  </tr>
              </thead>
                             </thead>
         <?php
 $sql="SELECT * FROM product_order WHERE `status` = 'in transit'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['Product_ID']; ?> 
                      </td>
                      <td>
                          <a>
                             <?php echo $row['Product_Name']; ?>
                          </a>
                          <br/>
                        
                      </td>
                      <td>
                          <ul class="list-inline">
                             
                              <li class="list-inline-item">
                              <?php          
                    echo '
 <img style= "width: 100px; height: 100px;" src= "web/upload/product/'.$row['Product_Pix'].'"  alt="product picture">';
 ?>
                              </li>
                             
                          </ul>
                      </td>
                      <td class="project_progress">
                         
                          <?php echo $row['Paydate']; ?>
                      </td>
                      <td class="project-state">
                        <?php echo '
                          <a href="tel: '.$row['tel'].'">Call Buyer</a>';
                          ?>
                      </td>
                      <td class="project-actions text-right">
                        <?php echo '
                          <a class="btn btn-primary btn-sm" href="./delivered?id='.$row['Product_ID'].'">';
                          ?>
                              <i class="fas fa-check">
                              </i>
                              Change Status
                          </a>
                        
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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Delivered Order</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Delivered Order Details</h3>

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
                          ID
                      </th>
                      <th style="width: 15%">
                          Item
                      </th>
                      <th style="width: 15%">
                          Product Picture
                      </th>
                      <th style="width: 15%">
                         Delivery
                      </th>
                      <th style="width: 15%" class="text-center">
                          Status
                      </th>
                      <th style="width: 15%">
                        Date Delivered
                      </th>
                      
                  </tr>
              </thead>
                             </thead>
         <?php
 $sql="SELECT * FROM product_order WHERE `status` = 'delivered'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['Product_ID']; ?> 
                      </td>
                      <td>
                          <a>
                             <?php echo $row['Product_Name']; ?>
                          </a>
                          <br/>
                        
                      </td>
                      <td>
                          <ul class="list-inline">
                             
                              <li class="list-inline-item">
                            <?php          
                    echo '
 <img style= "width: 100px; height: 100px;" src= "web/upload/product/'.$row['Product_Pix'].'"  alt="product picture">';
 ?>
                              </li>
                             
                          </ul>
                      </td>
                      <td class="project_progress">
                         
                          <?php echo $row['Paydate']; ?>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['status']; ?></span>
                      </td>
                      <td class="project-actions">
                          
                            <?php echo $row['statusdate']; ?>
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
 <?php
 $sql="SELECT * FROM product_order WHERE `status` = 'delivered'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
<script> // Set the date we're counting down to 
var countDownDate = new Date(<?php $row['Paydate']; ?>).getTime();
// Update the count down every 1 second 
var x = setInterval(function() {
  // Get today's date and time 
   var now = new Date().getTime();
  // Find the distance between now and the count down date  
  var distance = countDownDate - now;
  // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "  + minutes + "m " + seconds + "s ";
  // If the count down is finished, write some text  
   if (distance < 0) {    clearInterval(x);    document.getElementById("demo").innerHTML = "EXPIRED";  } }, 1000); </script>
</body>
</html>
<?php
}
?>
<?php
}
else{
  header("location: ./lockscreen");
}

?>