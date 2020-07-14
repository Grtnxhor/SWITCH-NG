<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("location: 4042.php");
}
?>
<?php
if (isset($_SESSION['Username'])) {

?>
<?php include("functions/init.php"); ?>
<?php include("include/head.php"); ?>
<?php include("include/sidebar.php"); ?>


        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="cart-title mt-70">
                            <h2>Payment Successful</h2>
                        </div>
                        <p style="font-size: 15px;">Your order has been received.</p>

                    </div>
                    <div class="col-12 col-lg-8">
                        <div style="margin-top: 0px;" class="cart-summary">
                            <h5>Order Info.:</h5>
                            
 
                            <ul class="summary-table">
                        <?php
                        $r = $_SESSION['Username'];
 $sql="SELECT * from product_order WHERE `Buyer_Username` = '$r' AND `id` = '".$_SESSION["id"]."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {

    
  ?>           
                                <li><span>Order Number</span> <span><?php echo $row['TransRef']; ?></span></li>
   
                             <li><span>Payment Date</span> <span><?php echo $row['Paydate']; ?></span></li>


                                <li><span>Total</span> <span>NGN <?php echo $row['total']; ?>  </span></li>
                                <?php
}
?>
                                       
                           
                            </ul>
            
                        </div>
                    </div>


 <!---------Shpping address---------->                   
                    <div class="col-12 col-lg-4">
                        <div style="margin-top: 0px;" class="cart-summary">
                            <h5>Shipping Address</h5>
                            
 
                            <ul class="summary-table">
                                <?php
                      $sql="SELECT * from product_order WHERE `Buyer_Username` = '$r' AND `id` = '".$_SESSION["id"]."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    
  ?>           
                                <li><span>Address:</span> <span><?php echo $row['address']; ?></span></li>
                                
   
                             <li><span>Town:</span> <span><?php echo $row['town']; ?></span></li>



                                <li><span>ZIP Code:</span> <span><?php echo $row['zip code']; ?>  </span></li>
                                <?php
}
?>                                       
                           
                            </ul>
            
                        </div>
                    </div>


     <!-------orderdetaild--------->
     
                         <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Order Details</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Product Picture</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                       <th>Delivery Fee</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
<?php
$r  = $_SESSION['Username'];
 $sql="SELECT * FROM product_order WHERE `Buyer_Username` = '$r' AND `id` = '".$_SESSION["id"]."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
   
  ?>   
                                        <td class="cart_product_img">
                                            <?php          
                    echo '
 <img src= "upload/product/'.$row['Product_Pix'].'" alt="product picture">';
 ?>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $row['Product_Name']; ?></h5>
                                        </td>
                                        <td class="price">
                                            <span>NGN <?php echo $row['amount']; ?></span>
                                        </td>
                                        <td class="price">
                                            <span>NGN <?php echo $row['dfee']; ?></span>
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