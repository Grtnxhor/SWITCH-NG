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
            <h1>Delivery</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Order in Transit</h3>

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
                          Order ID
                      </th>
                      <th style="width: 15%">
                          Product Name
                      </th>
                      <th style="width: 15%">
                          Product Picture
                      </th>
                      <th style="width: 15%">
                         Product Price
                      </th>
                      <th style="width: 20%">
                          Date Ordered
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
                             </thead>
        <?php
         $uu = $_SESSION['Username'];
 $sql="SELECT * FROM product_order WHERE `Buyer_Username` = '$uu' AND `status` = 'in transit'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
         
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['TransRef']; ?> 
                      </td>
                      <td>
                     
                             <?php echo $row['Product_Name']; ?>
                        
                      </td>
                     <?php          
                    echo '
 <td><img style= "width: 100px; height: 100px;" src= "web/upload/product/'.$row['Product_Pix'].'"  alt="product picture"></td>';
 ?>
                      <td class="project_progress">
                         
                         NGN <?php echo $row['amount']; ?>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['Paydate']; ?></span>
                      </td>
                      <td class="project-actions text-right">
                          <a class="btn btn-primary btn-sm" href="./compose">
                              <i class="fas fa-folder">
                              </i>
                              Open Support Ticket
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Delivered Order</h3>

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
                          Order ID
                      </th>
                      <th style="width: 15%">
                          Product Name
                      </th>
                      <th style="width: 15%">
                          Product Picture
                      </th>
                      <th style="width: 15%">
                         Product Price
                      </th>
                      <th style="width: 15%">
                          Date Ordered
                      </th>
                     
                  </tr>
              </thead>
                             </thead>
       <?php
         $uu = $_SESSION['Username'];
 $sql="SELECT * FROM product_order WHERE `Buyer_Username` = '$uu' AND `status` = 'Delivered'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
               <tbody>
                  <tr>
                      <td>
                         <?php echo $row['TransRef']; ?> 
                      </td>
                      <td>
                     
                             <?php echo $row['Product_Name']; ?>
                        
                      </td>
                     <?php          
                    echo '
 <td><img style= "width: 100px; height: 100px;" src= "web/upload/product/'.$row['Product_Pix'].'"  alt="product picture"></td>';
 ?>
                      <td class="project_progress">
                         
                         NGN <?php echo $row['amount']; ?>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['statusdate']; ?></span>
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
<script> // Set the date we're counting down to 
var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();
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
else{
  header("location: web/./index2");
}

?>