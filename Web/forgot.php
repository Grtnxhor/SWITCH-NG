<?php include("functions/init.php"); ?>
<?php include("include/head2.php"); ?>
<?php include("include/sidebar2.php"); ?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Forgot Password</h2>
                            </div>
<?php validate_reset_password(); ?>
                            <form enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="mail" placeholder="Input Your Email" required>
                                    </div>                              
                                     <div class="col-12 mb-3">
                                <button type="submit" name="submit" class="btn amado-btn w-100">Recover Password</button>
                            </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ##### Main Content Wrapper End ##### -->

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