<?php
session_start();
$data = $_GET['id'];
if (isset($_SESSION['Password']))
 {

?>

<?php include("include/admsidebarr.php"); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Stock Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Stock Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
               </thead>
         <?php
 $sql="SELECT * FROM ichange_product WHERE `Product_ID` ='$data'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>        
      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              
              <div class="col-12">
                <?php echo '
                <img src="web/upload/product/'.$row['prodpix'].'" class="product-image" alt="Product Image">';
                ?>
              </div>
              
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3"><b>Product Name:</b> <?php echo $row['Product_Name']; ?></h3>
              <p><b>Product Details:</b> <?php echo $row['Product_Fault']; ?></p>

              <hr>                
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  NGN <?php echo $row['Product_Price']; ?>
                </h2>
                <h4 class="mt-0">
                  <small>Category: <?php echo $row['Product_Category']; ?></small>
                </h4>
              </div>
              <br/>
              Bags (Service Fee = NGN200)<br/>
                                        Phones (Service Fee = NGN500)<br/>
                                        Laptops (Service Fee = NGN1,000)<br/>
                                        Shoes (Service Fee = NGN500)<br/>
                                        Jewelleries (service Fee = NGN200)<br/>
                                        Cakes (Service Fee = NGN200)<br/>
                                        Gift (Service Fee = varies)<br/>
                                        Clothes (Service Fee = NGN500)<br/>
                                        Cosmetics (Service Fee = NGN150)<br/> 
                                        Artworks (Service Fee = NGN500)<br/>
                                        Electronics Gadgets (Service Fee = NGN1,500)
                                    

<?php
 $mm = "Hello ".$row['Username']."! Your Product with Product_ID.:<b>" .$row['Product_ID']."</b> and <br/> Product_Name.:<b>" .$row['Product_Name']."</b> has been approved sucessfully <br/> You shall be notified when your product is sold!<br/><br/><i>iChange Team</i>";

                    $_SESSION['m']  = $mm;
                    $_SESSION['v'] = $row['Username'];
echo '
<form action="./app?id='.$data.'" method="post">';
?>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                 
                <input style="width: 100%;" type="number" name="serv" placeholder="NGN <?php echo $row['service_fee']; ?>" class="py-2 px-3 mt-4" required>

                </h2>
                <h4 class="mt-0">
                  <small>Input Service Fee</small>
                </h4>
              </div>

              <div class="mt-4">
                <input type="submit" value="Approve Product" class="btn btn-primary btn-lg btn-flat">
                
                </div>
              </form>
<br/>
                <button type="button" class="btn btn-default btn-lg btn-flat" data-toggle="modal" data-target="#modal-lg">
                  <i class="fas fa-recycle fa-lg mr-2"></i> 
                  Delete Product
                 </button>
            

              <div class="mt-4 product-share">
                  <div class="btn btn-default btn-lg btn-flat">
                    <?php 
                    $r = $row['Username'];
$sql="SELECT * FROM ichange_signup WHERE `Username` ='$r'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
                    echo '
                  <a href="tel: '.$row['Telephone'].'"><i class="fas fa-phone fa-lg mr-2"></i> 
                 Contact Seller</a>';
               }
                 ?>
                </div>
              </div>
              </div>

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Product Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Seller Account Details</a>
               
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">Product_ID: <?php echo $row['Product_ID']; ?></div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Bank Name: <?php echo $row['Seller_Bank']; ?> <br/><br/> Bank Account: <?php echo $row['Seller_Acct']; ?></div>
            
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
<?php
}
?>
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

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Delete Product!</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Note that, once product is deleted, all details as regards the product are cleared off also and can`t be recovered. <br/><br/>Do you want to proceed deleting this product?</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </thead>
         <?php
 $sql="SELECT * FROM ichange_product where `Product_ID` = '$data'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>             
              <?php
               $msg = "Hello ".$row['Username']."! Your Product with Product_ID.:<b>" .$row['Product_ID']."</b> and <br/> Product_Name.:<b>" .$row['Product_Name']."</b> has been deleted <br/> Kindly re-submit your product again!<br/><br/><i>iChange Team</i>";

                    $_SESSION['msg']  = $msg;
              echo '
              <a href="./testg?id='.$row['Product_ID'].'"><button type="submit" class="btn btn-primary">Continue</button></a>';
              ?>
            </div>
            <?php
          }
          ?>
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
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="../../plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.swalDefaultSuccess').click(function() {
      Toast.fire({
        type: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultInfo').click(function() {
      Toast.fire({
        type: 'info',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultError').click(function() {
      Toast.fire({
        type: 'error',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultWarning').click(function() {
      Toast.fire({
        type: 'warning',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.swalDefaultQuestion').click(function() {
      Toast.fire({
        type: 'question',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultError').click(function() {
      toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.warning('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
    });

    $('.toastsDefaultDefault').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultTopLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'topLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomRight').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomRight',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultBottomLeft').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        position: 'bottomLeft',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultAutohide').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        autohide: true,
        delay: 750,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultNotFixed').click(function() {
      $(document).Toasts('create', {
        title: 'Toast Title',
        fixed: false,
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultFull').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        icon: 'fas fa-envelope fa-lg',
      })
    });
    $('.toastsDefaultFullImage').click(function() {
      $(document).Toasts('create', {
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        image: '../../dist/img/user3-128x128.jpg',
        imageAlt: 'User Picture',
      })
    });
    $('.toastsDefaultSuccess').click(function() {
      $(document).Toasts('create', {
        class: 'bg-success', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultInfo').click(function() {
      $(document).Toasts('create', {
        class: 'bg-info', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultWarning').click(function() {
      $(document).Toasts('create', {
        class: 'bg-warning', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultDanger').click(function() {
      $(document).Toasts('create', {
        class: 'bg-danger', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
    $('.toastsDefaultMaroon').click(function() {
      $(document).Toasts('create', {
        class: 'bg-maroon', 
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
    });
  });

</script>
</body>
</html>
<?php
}
else{
  header("location: ./lockscreen");
}

?>