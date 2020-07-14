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
            <h1>All Users</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users with Activated Email</h3>

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
                      <th style="width:20%">
                          First Name
                      </th>
                      <th style="width: 20%">
                          Last Name
                      </th>
                      <th style="width: 20%">
                        Email Address
                      </th>
                      <th style="width: 20%">
                         Gender
                      </th>
                      <th style="width: 20%" >
                        Telephone
                      </th>
                      <th style="width: 20%">
                        Date Registered
                      </th>
                  </tr>
              </thead>
                             </thead>
         <?php
 $sql="SELECT * FROM ichange_signup WHERE `Active` = '1'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['First Name']; ?> 
                      </td>
                      <td>
                          <a>
                             <?php echo $row['Last Name']; ?>
                          </a>
                          <br/>
                          <small>
                            <b>Username:</b> <?php echo $row['Username']; ?>
                          </small>
                      </td>
                      <td>
                         <?php echo $row['Email']; ?> 
                      </td>
                       <td>
                         <?php echo $row['Gender']; ?> 
                      </td>
                      <td>
                         <?php echo $row['Telephone']; ?> 
                      </td>
                      <td>
                         <?php echo $row['Datereg']; ?> 
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
    

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users with unactivated Email</h3>

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
                      <th style="width:20%">
                          First Name
                      </th>
                      <th style="width: 20%">
                          Last Name
                      </th>
                      <th style="width: 20%">
                        Email Address
                      </th>
                      <th style="width: 20%">
                         Gender
                      </th>
                      <th style="width: 20%" >
                        Telephone
                      </th>
                      <th style="width: 20%">
                        Date Registered
                      </th>
                  </tr>
              </thead>
                             </thead>
         <?php
 $sql="SELECT * FROM ichange_signup WHERE `Active` = '0'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['First Name']; ?> 
                      </td>
                      <td>
                          <a>
                             <?php echo $row['Last Name']; ?>
                          </a>
                          <br/>
                          <small>
                            <b>Username:</b> <?php echo $row['Username']; ?>
                          </small>
                      </td>
                      <td>
                         <?php echo $row['Email']; ?> 
                      </td>
                       <td>
                         <?php echo $row['Gender']; ?> 
                      </td>
                      <td>
                         <?php echo $row['Telephone']; ?> 
                      </td>
                      <td>
                         <?php echo $row['Datereg']; ?> 
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
  header("location: ./lockscreen");
}

?>