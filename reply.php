<?php
session_start();
$data = $_GET['id'];
if (isset($_SESSION['Password']))
 {

?>

<?php include("include/admside.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Reply Support Ticket</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="web/index.php">Home</a></li>
              <li class="breadcrumb-item active">Support Ticket</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
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
 $sql="SELECT * FROM support WHERE `SupportRef` = '$data'";
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

      <br/>

      <div class="container-fluid">
        <div class="row">
                              
         <?php
 $sql="SELECT * FROM support WHERE `SupportRef` = '$data'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>           
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Enter your support message</h3>
              </div>
              <?php
                    echo '
                     <form action="./resp?id='.$row['SupportRef'].'" method="post">';
                    ?>
             
              <!-- /.card-header -->
              <div class="card-body">
               
                <div class="form-group">
                    <textarea id="compose-textarea" name="msg" class="form-control" style="height: 300px">
                      
                    
                    </textarea>
                </div>
                
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <div class="float-right">
                 
                  <button type="submit" class="btn btn-primary"><i class="far fa-envelope"></i> Send</button>
                </div>
                <button type="reset" class="btn btn-default"><i class="fas fa-times"></i> Discard</button>
              </div>
            </form>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          
          <!-- /.col -->
        </div>
            <?php
            }
            ?>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
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
  header("location: ./lockscreen");
}

?>