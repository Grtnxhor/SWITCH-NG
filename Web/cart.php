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
                                        <th></th>
                                       
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
 <img src= "upload/product/'.$row['Product_Pic'].'" alt="product picture">';
 ?>
                                        </td>
                                        <td class="cart_product_desc">
                                            <h5><?php echo $row['Product_Name']; ?></h5>
                                           
                                        </td>
                                        <td class="price">
                                            <span>NGN <?php echo $row['Product_Price']; ?></span>
                                        </td>
                                         <td class="qty">
                                           <?php echo '
                                            <a style="font-size: 15px; color: red;" href="./remove?id='.$row['cart_idsn'].'"><span>Remove</span></a>';
                                            ?>
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
$c = $a + $b;
    
  ?>   

                                <li><span>total:</span> <span>NGN <?php echo $c; ?>  </span></li>                                       
                           
                            </ul>
             <div class="cart-btn mt-100">
                                <a href="./Checkout" class="btn amado-btn w-100">Checkout</a>
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
    <script>
function newDoc() {
    window.location.assign("./move?id=value");
}
</script>
</body>

</html>
<?php
}
else{
  header("location: ./index2");
}

?>