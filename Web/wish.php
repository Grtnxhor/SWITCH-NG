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
                    <div class="col-12 col-lg-12">
                        <div class="cart-title mt-50">
                            <h2>Wishlist</h2>
                        </div>

                        <div class="cart-table clearfix">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        

                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
<?php
 $sql="SELECT * FROM ichange_wish WHERE `wish_Username` = '".$_SESSION['Username']."'";
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
                                        <td>
                                            <h5><?php echo $row['Product_Name']; ?></h5>
                                            <div class="cart">
                                        <?php echo '
                                        <a href="carter.php?id='.$row['Product_ID'].'" data-toggle="tooltip" data-placement="right" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>'
                                        ?>
                                    </div>
                                        </td>
                                        <td>
                                            <span>NGN <?php echo $row['Product_Price']; ?></span>
                                        </td>
                                        
                                        <td>
                                            <?php echo '
                                            <a style="font-size: 15px; color: red;" href="removew.php?id='.$row['wish_idsn'].'"><span>Remove</span></a>';
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