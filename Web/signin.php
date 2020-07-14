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
                                <h2>Welcome back!</h2>
                            </div>
  <?php validate_usrlogin() ?>                          
                            <form enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="usrname" placeholder="Username" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pword" placeholder="Password" required>
                                    </div>
                                   
                                   &nbsp;&nbsp;&nbsp;&nbsp;<p><a style="color: red; font-size: 15px;" href="./forgot">Forgot Password</a></p>
                                 
                                     <div class="col-12 mb-3">
                                <button type="submit" name="submit" class="btn amado-btn w-100">Sign in</button>
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