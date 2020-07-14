<?php
session_start();
if (isset($_SESSION['Username'])) {

?>
<?php include("functions/init.php"); ?>
<?php include("include/head.php"); ?>
<?php include("include/sidebar.php"); ?>
        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <form action="./flutter" method="post">
                                <div class="row">
<?php
 $sql="SELECT * FROM ichange_signup WHERE `Active` = '1' AND `Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {

  ?>                                       
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="fname" id="first_name"  placeholder="First Name">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="lname" id="last_name"  placeholder="Last Name">
                                    </div>
                                  
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                    </div>
                                    <?php
                                }
                                ?>
                                    <div class="col-12 mb-3">
                                        <input type="text" name="address" class="form-control mb-3" id="street_address" placeholder="Address" value="" required>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <input type="text" name="town" class="form-control" id="city" placeholder="Town" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" name="zip" class="form-control" id="zipCode" placeholder="Zip Code" value="" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" name="num" class="form-control" id="phone_number" min="0" placeholder="Telephone Number" value="" required>
                                    </div>
                                   

                                    
                                </div>
                           
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                                       <?php
 $sql="SELECT SUM(Product_Price) AS total from ichange_cart WHERE `Buyer_Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $_SESSION['sum'] = $row['total'];
    $a = $_SESSION['sum'];
    
  ?>           
                                <li><span>subtotal:</span> <span>NGN <?php echo $a; ?></span></li>
                                 <?php
 }
 ?>                       
<?php 
$sql="SELECT SUM(delivery) AS deli from ichange_cart WHERE `Buyer_Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
     $d = $row['deli'];
    $s = $d/2;
    $_SESSION['deliv'] = $s;
    $b = $_SESSION['deliv'];
    
  ?>           

   
                             <li><span>delivery:</span> <span>NGN <?php echo $b; ?></span></li>
<?php
}
?>

<?php 
$_SESSION['all'] = $a + $b;
$c = $_SESSION['all'];
    
  ?>   

                                <li><span>total:</span> <span>NGN <?php echo $c; ?>  </span></li>
                            </ul>

                            

                            <div class="cart-btn mt-10">
                                <button type="submit" name="submit" class="btn amado-btn w-100">Checkout</button>
                            </div>
                             </form>
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
  header("location: ./index2");
}

?>