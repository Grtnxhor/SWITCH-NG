<?php
session_start();
if (isset($_SESSION['Username']))
 {

?>
<?php include("include/head2.php"); ?>
<?php include("include/sidebar2.php"); ?>


        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-50">
                            <h2>Shopping Cart</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
<?php
 $sql="SELECT * FROM ichange_cart WHERE `Buyer_Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
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
                                            <span>₦<?php echo $row['Product_Price']; ?></span>
                                        </td>
                                        
                                    </tr>
                   <?php
 }
 ?>                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span>₦</span></li>
                                <li><span>delivery:</span> <span>₦</span></li>
                                <li><span>total:</span> <span>₦</span></li>
                            </ul>
                            <div class="cart-btn mt-100">
                                <a href="#" class="btn amado-btn w-100">Checkout</a>
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
<?php
}
else{
  header("location: ./create2");
}

?>