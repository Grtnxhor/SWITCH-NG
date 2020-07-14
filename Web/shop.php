<?php
session_start();
if (isset($_SESSION['Username'])) {

?>
<?php include("functions/init.php"); ?>
<?php include("include/head.php"); ?>
<?php include("include/sidebar.php"); ?>


        <div class="shop_sidebar_area">

            <!-- ##### Single Widget ##### -->
            <div class="widget catagory mb-50">
                <!-- Widget Title -->
                <h6 class="widget-title mb-30">Catagories</h6>

                <!--  Catagories  -->
                <div class="catagories-menu">
                    <form>
                    <select name="pcat" required>
                                        <option name="pcat" required>Select Category</option>
                                        <option name="pcat" active>Bags</option>
                                        <option name="pcat">Phones</option>
                                        <option name="pcat">Laptops</option>
                                        <option name="pcat">Shoes</option>
                                        <option name="pcat">Jewelleries</option>
                                        <option name="pcat">Cakes</option>
                                        <option name="pcat">Teddy Bear</option>
                                        <option name="pcat">Clothes</option>
                                        <option name="pcat">Cosmetics</option>
                                        <option name="pcat">Dogs</option>
                                        <option name="pcat">Artworks</option>
                                        <option name="pcat">Electronics Gadgets</option>
                                    </select>
                                    <br/><br/><br/>
                                   <input type="submit" name="submit" class="btn amado-btn w-100" value="Search Filter">
                                </form>
                </div>
            </div>
        </div>

        <div class="amado_product_area section-padding-100">
            <div class="container-fluid">

              

                <div class="row">
 <?php
    $pcat = clean($_GET['pcat']);
 $sql="SELECT * FROM ichange_product WHERE Sold='In Stock' AND `Product_Category` = '$pcat' AND `Approved` = 'Approved'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
  ?>   
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                               <?php          
                    echo '
 <img style= "width: 400px; height: 400px;" src= "upload/product/'.$row['prodpix'].'" alt="product picture">';

                                ?>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">NGN <?php echo $row['Product_Price']; ?></p>
                                   <?php
                    echo '
                    <a href="./prodetail?id='.$row['Product_ID'].'">';
                    ?>
                                        <h6><?php echo $row['Product_Name']; ?></h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                  
                                    <div class="cart">

                                        <?php echo '
                                        <a href="./wishes?id='.$row['Product_ID'].'" data-toggle="tooltip" data-placement="left" title="Save to Wishlist"><img src="img/core-img/favorites.png" alt=""></a>'
                                        ?>
                                    </div>
                                    <div class="cart">
                                        <?php echo '
                                        <a href="./carter?id='.$row['Product_ID'].'" data-toggle="tooltip" data-placement="right" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>'
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php
 }
 ?>  
 
  <?php
            if(row_count($result_set) == "") {
                      $row = mysqli_fetch_array($result_set);
                      echo '<div class="col-12 col-sm-12 col-md-12 col-xl-12 text-center">
                        <span style="font-size: 60px;">😢 oops!</span><br/><br/>
                        <p></span>We have no product available for this category!</p>
                    </div>';
                    }
                    ?> 

                </div>
            </div>
        </div>
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