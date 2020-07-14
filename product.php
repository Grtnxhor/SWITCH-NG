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
            <h1>Sales<sup> <span class="badge badge-info right"><?php echo $_SESSION['sold'];?></span></sup></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="web/./index">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
 $sql="SELECT SUM(Product_sn) AS product from ichange_product";
 $sl="SELECT SUM(Product_sn) AS roduct from ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'uncredited' AND `status` = 'delivered'";
 $rsult_set=query($sl);
 $result_set=query($sql);
  while($rw= mysqli_fetch_array($rsult_set))
 {
 while($row= mysqli_fetch_array($result_set))
 {
    $b = $row['product'];
    
  ?>                   

               <div class="nav nav-pills">
                 
                <a href="#activity" data-toggle="tab" class="btn btn-primary btn-block"><b>All Product(s)<sup> <span class="badge badge-info right"><?php echo $b;?></span></sup></b></a>
               
                <a href="#timeline" data-toggle="tab" class="btn btn-primary btn-block"><b>Sold Product(s)<sup> <span class="badge badge-danger right"><?php echo $rw['roduct'];?></span></sup></b></a>
                 <?php
               }
              }
              ?>
   <?php
 $sql="SELECT SUM(Product_sn) AS product from ichange_product WHERE `Approved` = 'Pending'";
 $sl="SELECT SUM(Product_sn) AS prduct from ichange_product WHERE  `Approved` = 'Approved'";
 $result_set=query($sql);
 $rsult_set=query($sl);
 while($row= mysqli_fetch_array($result_set))
 {
  while($rw= mysqli_fetch_array($rsult_set))
 {
    $b = $row['product'];
    
  ?>                           
                <a href="#reply" data-toggle="tab" class="btn btn-primary btn-block"><b>Approved Product(s)<sup> <span class="badge badge-info right"><?php echo $rw['prduct'];?></span></sup></b></a>
               
                <a href="#sent" data-toggle="tab" class="btn btn-primary btn-block"><b>New Product(s)<sup> <span class="badge badge-danger right"><?php echo $b;?></span></sup></b></a>
                <?php 
              }
}
?>
              </div>
            </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

                  
          
          </div>
          <!-- /.col -->
          <div class="col-md-9">
           
                <div class="tab-content">
                  <div class="tab-pane active" id="activity">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">All Product(s)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th style="width: 15%;">Product ID</th>
                      <th style="width: 15%;">Product Name</th>
                      <th style="width: 15%;">Approval</th>
                      <th style="width: 15%;">Sales Status</th>
                      <th style="width: 15%;">Price</th>
                      <th style="width: 15%;">Service Fee</th>
                      <th style="width: 15%;"></th>
                    </tr>
                    </thead>
          <?php
 $sql="SELECT * from ichange_product";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
   
    
  ?>                   
 <tbody>
                    <tr>
                      <td><a href="#"><?php echo $row['Product_ID']; ?></a></td>
                      <td><?php echo $row['Product_Name']; ?></td>
                      <td><span class="badge badge-success"><?php echo $row['Approved']; ?></span></td>
                     
                      <td>
                        <span class="badge badge-success"><?php echo $row['Sold']; ?></span>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">NGN <?php echo $row['Product_Price']; ?></div>
                      </td>
                      <td>NGN <?php echo $row['service_fee']; ?></td>
                       <?php echo '
                       <td><a href="./details?id='.$row['Product_ID'].'">View Details</a>';
                ?>
                    </tr>
              
                    </tbody>
                    <?php
                  }
                  ?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
             
            </div>
            <!-- /.card -->
                    <!-- /.post -->
                  </div>


<div class="tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>                    

                          <div class="timeline-body">
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">All Product(s) Sold</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th style="width: 15%;">Product ID</th>
                      <th style="width: 15%;">Product Name</th>
                      <th style="width: 15%;">Approval</th>
                      <th style="width: 15%;">Sales Status</th>
                      <th style="width: 15%;">Price</th>
                      <th style="width: 15%;">Service Fee</th>
                      <th style="width: 15%;"></th>
                    </tr>
                    </thead>
         <?php
      
 $sql="SELECT * FROM ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'uncredited' AND `status` = 'delivered'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
           
 <tbody>
                    <tr>
                      <td><a href="#"><?php echo $row['Product_ID']; ?></a></td>
                      <td><?php echo $row['Product_Name']; ?></td>
                      <td><span class="badge badge-success"><?php echo $row['Approved']; ?></span></td>
                     
                      <td>
                        <span class="badge badge-success"><?php echo $row['Sold']; ?></span>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">NGN <?php echo $row['Product_Price']; ?></div>
                      </td>
                      <td>NGN <?php echo $row['service_fee']; ?></td>
                         <?php echo '
                       <td><a href="./cont?id='.$row['Username'].'">View Seller</a>';
                ?>
                    </tr>
            
                    </tbody>
                    <?php
                  }
                  ?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
             
            </div>
            <!-- /.card -->
    <!-- /.content -->
    <!-- /.content -->
                          </div>
                         
                        
                      </div>
                      <!-- END timeline item -->
                     
                      <!-- END timeline item -->
                      <!-- timeline item -->
                     
                     
                    
                     
                    </div>
                  </div>


<div class="tab-pane" id="reply">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Approved Product(s)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th style="width: 15%;">Product ID</th>
                      <th style="width: 15%;">Product Name</th>
                      <th style="width: 15%;">Approval</th>
                      <th style="width: 15%;">Sales Status</th>
                      <th style="width: 15%;">Price</th>
                      <th style="width: 15%;">Service Fee</th>
                      <th style="width: 15%;"></th>
                    </tr>
                    </thead>
         <?php
       
 $sql="SELECT * FROM ichange_product WHERE `Approved` = 'Approved'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
           
 <tbody>
                    <tr>
                      <td><a href="#"><?php echo $row['Product_ID']; ?></a></td>
                      <td><?php echo $row['Product_Name']; ?></td>
                      <td><span class="badge badge-success"><?php echo $row['Approved']; ?></span></td>
                      <td>
                        <span class="badge badge-danger"><?php echo $row['Sold']; ?></span>
                      </td>
                      
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">NGN <?php echo $row['Product_Price']; ?></div>
                      </td>
                      <td>NGN <?php echo $row['service_fee']; ?></td>
                      <?php echo '
                       <td><a href="./details?id='.$row['Product_ID'].'">View Details</a></td>';
                ?>
                    </tr>
                       
                    </tbody>
                    <?php
                  }
                  ?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
             
            </div>
            <!-- /.card -->
                      <!-- END timeline item -->
                     
                      <!-- END timeline item -->
                      <!-- timeline item -->
                     
                     
                    
                     
                    </div>
                  </div>


                  <div class="tab-pane" id="sent">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                     
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                                  <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">New Product(s)</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                       <th style="width: 15%;">Product ID</th>
                      <th style="width: 15%;">Product Name</th>
                      <th style="width: 15%;">Approval</th>
                      <th style="width: 15%;">Sales Status</th>
                      <th style="width: 15%;">Price</th>
                      <th style="width: 15%;">Service Fee</th>
                      <th style="width: 15%;"></th>
                    </tr>
                    </thead>
         <?php
      
 $sql="SELECT * FROM ichange_product WHERE `Approved` = 'Pending'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
           
 <tbody>
                    <tr>
                      <td><a href="#"><?php echo $row['Product_ID']; ?></a></td>
                      <td><?php echo $row['Product_Name']; ?></td>
                      <td><span class="badge badge-success"><?php echo $row['Approved']; ?></span></td>
                      
                       <td>
                        <span class="badge badge-success"><?php echo $row['Sold']; ?></span>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">NGN <?php echo $row['Product_Price']; ?></div>
                      </td>
                        <td>NGN <?php echo $row['service_fee']; ?></td>
                      <?php echo '
                       <td><a href="./details?id='.$row['Product_ID'].'">View Details</a>';
                ?>
                    </tr>
                       
                    </tbody>
                    <?php
                  }
                  ?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
             
            </div>
            <!-- /.card -->
                      <!-- END timeline item -->
                     
                      <!-- END timeline item -->
                      <!-- timeline item -->
                     
                     
                    
                     
                    </div>
                  </div>
                  <!-- /.tab-pane -->


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