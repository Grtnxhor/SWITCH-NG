<?php
session_start();
$data = $_GET['id'];

if (isset($_SESSION['Username'])) {

?>

<?php include("functions/init.php"); ?>
<?php include("include/head.php"); ?>
<?php include("include/sidebar.php"); ?>

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                
<?php
 $sql="SELECT * FROM ichange_product WHERE `Product_ID` = '$data'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {


  ?>   
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                               
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <?php          
                    echo ' 
                                        <a class="gallery_img" href= "upload/product/'.$row['prodpix'].'">
                                            <img class="d-block w-100" src= "upload/product/'.$row['prodpix'].'" alt="First slide">';
                                            ?>
                                        </a>
                                    </div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">NGN <?php echo $row['Product_Price']; ?></p>
                                <a href="#">
                                    <h6><?php echo $row['Product_Name']; ?></h6>
                                </a>
                               
                                <p class="avaibility"><i class="fa fa-circle"></i> In Stock</p>
                            </div>

                            <div class="short_overview my-5">
                                <p style="color: black;"><strong>Product Details:</strong> <?php echo $row['Product_Fault']; ?></p>
                            </div>

   <div class="amado-btn-group">
      <?php
                    echo '
                   
                    
                <a href="./carter?id='.$row['Product_ID'].'" class="btn amado-btn mb-15">Add to Cart</a>';
                ?>

                           </div> 

          
 <div class="amado-btn-group">
      <?php
                    echo '
                   
                    
                <a style="background: black" href="./wishes?id='.$row['Product_ID'].'" class="btn amado-btn mb-15">Save to Wishlist</a>';
                ?>

                           </div> 

            <?php
 }
 ?>               

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
    </div>
    <!-- ##### Main Content Wrapper End ##### -->
<?php include("include/footer.php"); ?>

    <!-- ##### jQuery (Necessary for All JavaScript Plugins) ##### -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="js/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>

</body>

</html>
<?php
}
else{
  header("location:index2.php");
}

?>