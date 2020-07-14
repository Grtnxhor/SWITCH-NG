<?php

$con = mysqli_connect("localhost","root","","ichange");

$data = $_GET['search'];

?>
<?php include("include/head2.php"); ?>
<?php include("include/sidebar2.php"); ?>

			 <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Search Result</h2>
                               <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th></th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
<?php
$cons = mysqli_query($con,"select * from ichange_product where `Product_Name` = '$data'");
while ($row = mysqli_fetch_array($cons)) {
    
  ?>   
                                        <td class="cart_product_img">
                                            <?php          
                    echo '
 <img src= "upload/product/'.$row['prodpix'].'" alt="product picture">';
 ?>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $row['Product_Name']; ?></h5>
                                        </td>
                                        <td class="price">
                                            <span>NGN <?php echo $row['Product_Price']; ?></span>
                                        </td>
                                        <td>
                                            
                                            <a style="font-size: 15px; color: red;" href="./cart2"><span>Add to cart</span></a>
                                          
                                        </td>
                                    </tr>
               <?php
 }
 ?>                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                            </div>                          
                        </div>
                    </div>

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

?>