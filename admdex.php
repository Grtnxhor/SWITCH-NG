<?php
session_start();
if (isset($_SESSION['Password']))
 {

?>
<?php include("include/admhead.php"); ?>
<?php include("include/admsidebar.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-check"></i></span>
<a style="color: black" href="./product">
              <div class="info-box-content">
                <span class="info-box-text">Sold Product(s)</span>
              <?php
            
 $sql="SELECT SUM(Product_sn) AS cart from ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'uncredited' AND `status` = 'delivered'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $a = $row['cart'];
    
  ?>                
                <span class="info-box-number">
                  <?php echo $a; ?>
                
                </span>
                  <?php
           }
           ?>
              </div>
            </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-credit-card"></i></span>
              <a style="color: black" href="./payh">
              <div class="info-box-content">
                <span class="info-box-text">Income | Profit</span>
                                <?php
                
 $sql="SELECT SUM(total) AS tot, SUM(dfee) AS wish from product_order WHERE `status` = 'in transit'";
$q="SELECT SUM(dfee) AS h from product_order WHERE `status` = 'delivered'";
 $sl="SELECT SUM(service_fee) AS art from ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'uncredited' AND `status` = 'undelivered'";
 $l="SELECT SUM(service_fee) AS at from ichange_product WHERE `Sold` = 'in stock' AND `defaulter` = 'uncredited' AND `status` = 'undelivered'";
 $s="SELECT SUM(service_fee) AS cat from ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'credited' AND `status` = 'delivered'";
 $ret = query($l);
 $rr = query($q);
 $rsult_set=query($sl);
 $rult_set=query($s);
 $result_set=query($sql);
 while($rw= mysqli_fetch_array($rsult_set))
 {
   while($rww= mysqli_fetch_array($ret))
 {
 while($w= mysqli_fetch_array($rr))
 {
 while($r= mysqli_fetch_array($rult_set))
 { 
 while($row= mysqli_fetch_array($result_set))
 {
    $f = $row['wish'];
    $i = $row['tot'];
    $g = $rw['art'];
    $t = $r['cat'];
    $mn = $rww['at'];
    $d = $mn/2;
    $sa = $mn + $d;
    $l = $w['h'];
    $k = $t + $l;
  ?>    
                <span class="info-box-number"><small>NGN</small> <?php echo $i ?> | <?php echo $k; ?></span>
                <?php
              }
            }
          }
              }
              }
           

           ?>
              </div>
            </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-list"></i></span>
              <a style="color: black" href="product.php">
              <div class="info-box-content">
                <span class="info-box-text">New Product(s)</span>
              <?php
 $sql="SELECT SUM(Product_sn) AS product from ichange_product WHERE `Approved` = 'Pending'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $b = $row['product'];
    
  ?>                   
                <span class="info-box-number"><?php echo $b; ?></span>
                <?php
              }
              ?>
              </div>
            </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-medal"></i></span>
<a style="color: black" href="./delivery">
              <div class="info-box-content">
                <span class="info-box-text">New Order(s)</span>
             <?php
             
 $sql="SELECT SUM(sn) AS deal from product_order WHERE `status` = 'in transit'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $n = $row['deal'];
    
  ?>                       
               <span class="info-box-number"><?php echo $n; ?></span>
                <?php
              }
              ?>
              </div>
            </a>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
                    <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">All Income</h3>

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
                   
                    <tbody>
                 <?php
                
 $sql="SELECT SUM(total) AS tot, SUM(dfee) AS wish from product_order WHERE `status` = 'in transit'";
$q="SELECT SUM(dfee) AS h from product_order WHERE `status` = 'delivered'";
 $sl="SELECT SUM(service_fee) AS art from ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'uncredited' AND `status` = 'undelivered'";
 $l="SELECT SUM(service_fee) AS at from ichange_product WHERE `Sold` = 'in stock' AND `defaulter` = 'uncredited' AND `status` = 'undelivered'";
 $s="SELECT SUM(service_fee) AS cat from ichange_product WHERE `Sold` = 'Sold' AND `defaulter` = 'credited' AND `status` = 'delivered'";
 $ret = query($l);
 $rr = query($q);
 $rsult_set=query($sl);
 $rult_set=query($s);
 $result_set=query($sql);
 while($rw= mysqli_fetch_array($rsult_set))
 {
   while($rww= mysqli_fetch_array($ret))
 {
 while($w= mysqli_fetch_array($rr))
 {
 while($r= mysqli_fetch_array($rult_set))
 { 
 while($row= mysqli_fetch_array($result_set))
 {
    $f = $row['wish'];
    $i = $row['tot'];
    $g = $rw['art'];
    $t = $r['cat'];
    $mn = $rww['at'];
    $d = $mn/2;
    $sa = $mn + $d;
    $l = $w['h'];
    $k = $t + $l;
  ?>                
                    <tr>
                      <td>Income(Total Product Ordered and not yet delivered).: <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NGN <?php echo $i; ?></b><br/><br/>

                        Delivery Fees(Total delivery fee of Product not yet delivered).: <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NGN <?php echo $f; ?></b><br/><br/>
                        Service Fees(Total Service fee of Product undelivered and buyer not credited).: <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NGN <?php echo $g; ?></b><br/><br/>
                        Profits(Delivery + Service Fee of product sold and delivered).: <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NGN <?php echo $k; ?></b><br/><br/>
                        Net Worth(Sum of Service Fee and estimated delivery fee of product in stock).: <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; NGN <?php echo $sa; ?></b>
                      </td>
                    
                      
                    </tr>
                   
                    
                    </tbody>
                    <?php
                  }
                  }
                }
                }
                  }
                  ?>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
             
            </div>
            <!-- /.card -->
                    <!-- TABLE: LATEST ORDERS -->
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

                                <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">All Product On Sale</h3>

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
                      <th style="width: 15%;">Sales Status</th>
                      <th style="width: 15%;">Price</th>
                      <th style="width: 15%;">Service Fee</th>
                    </tr>
                    </thead>
         <?php
 $sql="SELECT * FROM ichange_product WHERE `Approved` = 'Approved' AND `Sold` = 'In Stock'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
           
                    <tbody>
                    <tr>
                      <td><a href="#"><?php echo $row['Product_ID']; ?></a></td>
                      <td><?php echo $row['Product_Name']; ?></td>
                      
                      <td>
                        <span class="badge badge-success"><?php echo $row['Sold']; ?></span>
                      </td>
                      <td>
                        <div class="sparkbar" data-color="#00a65a" data-height="20">NGN <?php echo $row['Product_Price']; ?></div>
                      </td>
                       <td>NGN <?php echo $row['service_fee']; ?></td>
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
             
                    <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">New Order(s)</h3>

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
                      <th style="width: 12%;">Order ID</th>
                      <th style="width: 15%;">Product Name</th>
                      <th style="width: 13%;">Product Price</th>
                      <th style="width: 12%;">Delivery Fee</th>
                      <th style="width: 15%;">Product Picture</th>
                      <th style="width: 15%;">Date Ordered</th>
                      <th style="width: 15%;"></th>
                    </tr>
                    </thead>
         <?php
     
 $sql="SELECT * FROM product_order WHERE `status` = 'in transit'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
           
                    <tbody>
                    <tr>
                      <td><a href="#"><?php echo $row['Product_ID']; ?></a></td>
                      <td><?php echo $row['Product_Name']; ?></td>
                      <td><span class="badge badge-success">NGN <?php echo $row['amount']; ?></span></td>
                       <td>NGN <?php echo $row['dfee']; ?></td>
                      <?php          
                    echo '
 <td><img style= "width: 100px; height: 100px;" src= "web/upload/product/'.$row['Product_Pix'].'"  alt="product picture"></td>';
 ?>
                      <td>
                        <?php echo $row['Paydate']; ?>
                      </td>
                      <?php echo '
                       <td><a href="tel: '.$row['tel'].'">Contact Buyer</a>';
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

              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
    
        <!-- /.row (main row) -->
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
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
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