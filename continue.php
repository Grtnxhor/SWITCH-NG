<?php
session_start();
if (isset($_SESSION['Username'])) {

?>


<?php include("include/head.php"); ?>
<?php include("include/sidebar.php"); ?>

        <div class="cart-table-area section-padding-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Become a Seller</h2>
                            </div>
<?php validate_seller(); ?>
                            <form enctype="multipart/form-data" method="post">
                                <div class="row">
                                  
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" name="pname" placeholder="Product Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" name="pcat" required>
                                        <option name="pcat" required>Product Category</option>
                                        <option name="pcat">Bags</option>
                                        <option name="pcat">Phones</option>
                                        <option name="pcat">Laptops</option>
                                        <option name="pcat">Shoes</option>
                                        <option name="pcat">Jewelleries</option>
                                        <option name="pcat">Cakes</option>
                                        <option name="pcat">Clothes</option>
                                        <option name="pcat">Cosmetics</option>
                                        <option name="pcat">Artworks</option>
                                        <option name="pcat">Electronics Gadgets</option>
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="number" class="form-control mb-3" name="price" placeholder="Product Price (input only the digit not with the currency)" required>
                                    </div>
                                        <div class="col-12 mb-3">
                                        <textarea name="fault" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Give some details about the product and specify product fault(s), if any..."></textarea>
                                    </div>
                                    
                                          <div class="col-12 mb-3">
                                        <input type="number" class="form-control" name="acct" placeholder="Input Bank Account Number" required>
                                    </div>    

                                    <div class="col-12 mb-3">
                                        <select class="w-100" name="bank" required>
                                        <option name="bank"> Access Bank Plc</option>
                                        <option name="bank">Fidelity Bank Plc</option>
                                        <option name="bank">First City Monument Bank Limited</option>
                                        <option name="bank">First Bank of Nigeria Limited</option>
                                        <option name="bank">Guaranty Trust Bank Plc</option>
                                        <option name="bank">Union Bank of Nigeria Plc</option>
                                        <option name="bank">United Bank for Africa Plc</option>
                                        <option name="bank">Zenith Bank Plc</option>
                                        <option name="bank">Citibank Nigeria Limited</option>
                                        <option name="bank">Ecobank Nigeria Plc</option>
                                        <option name="bank">Heritage Banking Company Limited</option>
                                        <option name="bank">Keystone Bank Limited</option>
                                        <option name="bank">Polaris Bank Limited</option>
                                        <option name="bank">Stanbic IBTC Bank Plc</option>
                                        <option name="bank">Standard Chartered</option>
                                        <option name="bank">Sterling Bank Plc</option>
                                        <option name="bank">Unity Bank Plc</option>
                                        <option name="bank">Wema Bank Plc</option>
                                    </select>
                                </div>
                                    <div class="col-12 mb-3">
                                        <input type="file" class="form-control" name="fileToUpload" required>
                                    </div>                                       
                                   
                                    <div class="col-12 mb-3">
                                         <p style="color: red;">Please Kindly go back and recheck all details for any errors. iChange Delivery shall not be responsible for any mistakes.<br/><br/>
                                        Note that service fee shall be deducted on all product once sold before you are credited.
                                        <br/><br/>

                                        <span style="color: black;">Below are the service fee charged on every categories;
                                        <br/>
                                        Bags (Service Fee = NGN200)<br/>
                                        Phones (Service Fee = NGN500)<br/>
                                        Laptops (Service Fee = NGN1,000)<br/>
                                        Shoes (Service Fee = NGN500)<br/>
                                        Jewelleries (service Fee = NGN200)<br/>
                                        Cakes (Service Fee = NGN200)<br/>
                                        Clothes (Service Fee = NGN500)<br/>
                                        Cosmetics (Service Fee = NGN150)<br/> 
                                        Artworks (Service Fee = NGN500)<br/>
                                        Electronics Gadgets (Service Fee = NGN1,500)<br/><br/></span>
                                         </p>
                                <input type="submit" name="submit" class="btn amado-btn w-100" value="Continue>>">
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
<?php
}
else{
  header("location: web/./index2");
}

?>