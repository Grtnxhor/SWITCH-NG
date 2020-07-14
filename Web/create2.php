<?php include("functions/init.php"); ?>
<?php include("include/head2.php"); ?>
<?php include("include/sidebar2.php"); ?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Sign up to Continue</h2>
                            </div>
<?php validate_user_registration(); ?>
                            <form enctype="multipart/form-data" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                                    </div>
                                   <div class="col-12 mb-3">
                                        <input type="number" class="form-control" name="tel" placeholder="Telephone Number" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" name="gender">
                                        <option name="gender" required>Select Gender</option>
                                        <option name="gender">Male</option>
                                        <option name="gender">Female</option>
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" name="usrname" placeholder="Choose Username" required>
                                    </div>
                                    
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pword" placeholder="Create Password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="cpword" placeholder="Confirm Password"required>
                                    </div>
                                   
                                     <a href="./signin2"><p class="col-12 mb-3" style="color: red; font-size: 15px;">Already have an account? Click here to login.</p></a>
                                  
                                     <div class="col-12 mb-3">
                                <button type="submit" name="submit" class="btn amado-btn w-100">Create Account</button>
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