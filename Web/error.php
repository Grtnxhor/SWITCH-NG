<?php
session_start();
if (isset($_SESSION['Username']))
 {

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
                                <h2>Error!</h2>
                                <h6>There was an error processing your payment. <br/>Kindly check your internet connection or try again later.</h6>
                                <br/>
                                <p><i>Switch Team</i></p>
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
  header("location: ./index2");
}

?>