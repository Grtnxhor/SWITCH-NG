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
            <h1>Support Ticket</h1>
          </div>
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

<section class="content">

      <!-- Default box -->
      <div style="background: red; color: white;" class="card">
        <div class="card-header">
          <h3 class="card-title">Message Sent Successfully</h3>
            <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i style="color: white;" class="fas fa-times"></i></button>
          </div>
</div>
</div>
</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">New Support Ticket(s)</h3>

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
                      <th style="width: 10%">
                          ID
                      </th>
                      <th style="width: 20%">
                          Message
                      </th>
                      <th style="width: 20%">
                          Date Sent
                      </th>
                      
                      <th style="width: 8%" class="text-center">
                         
                      </th>
                     
                  </tr>
              </thead>
                             </thead>
         <?php
 $sql="SELECT * FROM support where `Status` = 'Open'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['SupportRef']; ?> 
                      </td>
                      <td>
                          <a>
                             <?php echo $row['Msg']; ?>
                          </a>
                          <br/>
                         
                      </td>
                      <td>
                          <ul class="list-inline">
                             
                              <li class="list-inline-item">
                              <?php echo $row['Datesent']; ?>
                              </li>
                             
                          </ul>
                      </td>
                     
                      <td class="project-state">
                        <?php
                    echo '
                    <a href="./reply?id='.$row['SupportRef'].'">';
                    ?> <span class="badge badge-success">Reply Ticket</span></a>
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

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Viewed Ticket(s)</h3>

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
                      <th style="width: 1%">
                          ID
                      </th>
                      <th style="width: 30%">
                          Message
                      </th>
                      <th style="width: 20%">
                          Date Sent
                      </th>
                      
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                     
                  </tr>
              </thead>
                             </thead>
         <?php
 $sql="SELECT * FROM support WHERE `Status` = 'Closed'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
              <tbody>
                  <tr>
                      <td>
                         <?php echo $row['SupportRef']; ?> 
                      </td>
                      <td>
                          <a>
                             <?php echo $row['Msg']; ?>
                          </a>
                          <br/>
                         
                      </td>
                      <td>
                          <ul class="list-inline">
                             
                              <li class="list-inline-item">
                              <?php echo $row['Datesent']; ?>
                              </li>
                             
                          </ul>
                      </td>
                     
                      <td class="project-state">
                          <span class="badge badge-success"><?php echo $row['Status']; ?></span>
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

</body>
</html>
<?php
}
else{
  header("location: ./lockscreen");
}

?>