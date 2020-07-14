<?php include("functions/init.php"); ?>
<?php include("include/head2.php"); ?>
<?php include("include/sidebar2.php"); ?>

        <!-- Product Catagories Area Start -->
        <div class="products-catagories-area clearfix">
            <div class="amado-pro-catagory clearfix">
<?php
 $sql="SELECT * FROM ichange_product WHERE Sold='In Stock' AND `Approved` = 'Approved'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $product_id = $row['Product_ID'];

  ?>   
                <!-- Single Catagory -->
                <div class="single-products-catagory clearfix">
                    <?php
                    echo '
                    <a href="./prodetail2?id='.$row['Product_ID'].'">';
                    ?>
              <?php          
                    echo '
 <img style= "width: 400px; height: 400px;" src= "upload/product/'.$row['prodpix'].'"  alt="product picture">';
 ?>
                        <!-- Hover Content -->
                        <div class="hover-content">
                            <div class="line"></div>
                            <p style="color: white">₦<?php echo $row['Product_Price']; ?></p>
                            <h4 style="color: white"><?php echo $row['Product_Name']; ?></h4>

                                
                            </div>
                    </a>
                </div>

               
<?php
 }
 ?>           
            </div>
        </div>
        <!-- Product Catagories Area End -->
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