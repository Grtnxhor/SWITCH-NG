<?php
session_start();
if (isset($_SESSION['Username'])) {

?>

<?php include("functions/init.php"); ?>
<?php include("include/head.php"); ?>
<?php include("include/sidebar.php"); ?>

        <!-- Product Details Area Start -->
        <div class="single-product-area section-padding-100 clearfix">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                               
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="row">
                  
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">Seller Center</p>
                                <a href="product-details.html">
                                    <h6>Terms and Conditions</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    
                                    <div class="review">
                                        <a href="#">Kindly read all terms and conditions</a>
                                    </div>
                                </div>
                             
                            </div>

                            <div class="short_overview my-5">
                                <p style="font-size: 13px;"><strong>(1)</strong> iChange Delivery owns and operates a platform in Nigeria that allows merchants to sell their products to the public over the internet. This platform is currently provided on the website <span style="color: red;">www.ichangedelivery.com.ng</span>, but may be provided on different websites or applications in the future.<br/><br/>

<strong>(2)</strong> The merchant will have the opportunity to sell their products on the iChange Delivery platform. iChange Delivery is entitled to accept purchases on behalf of the seller. The service provided by iChange Delivery is limited to referring customers to the merchant and accepting orders and payments on their behalf. In addition to this at iChange Delivery's discretion they may provide the merchant with analytics about the performance of the merchants's products and additional marketing support. This support may be reflective of the agreed level of commission.<br/><br/>

<strong>(3)</strong> The merchant authorises iChange Delivery to accept binding orders from customers on their behalf.<br/><br/>

<strong>(4)</strong> iChange Delivery may carry out changes to the website or service, or suspend the service, without notice.<br/><br/>

<strong><span style="color: red;"> iChange Delivery's rights and obligations</span></strong><br/><br/>

<strong>(1)</strong> The merchant acknowledges that the relationship between customers and iChange Delivery is governed by the privacy policy and the general terms and conditions, both available on the website.
<br/><br/>

<strong>(2)</strong> iChange Delivery will present on the website the products listed by the seller. The merchant will be responsible for listing their own products.<br/><br/>

<strong>(3)</strong> iChange Delivery is authorised to accept binding sales on behalf of the merchant and will be careful to pass order data on to the merchant as well as technology allows.<br/><br/>

<strong>(4)</strong> In order to maintain its reputation for quality and high standard of service, iChange Delivery reserves the right to terminate the relationship with the merchant if the merchant repeatedly receives bad reviews or complaints, or fails to comply with our recommendations.<br/><br/>

<strong><span style="color: red;"> Merchant's rights and obligations</span></strong><br/><br/>

<strong>(1)</strong> The merchant is obliged to provide all the information necessary when listing a product on iChange Delivery.com.ng. This should include but is not limited to, a detailed title and sub-title, price, quantity, picture and description. The merchant must never knowingly deceive a potential customer by misrepresenting their product/s. The merchant must notify iChange Delivery of any changes to the detail of their listings while uploaded on the site.
<br/><br/>

<strong>(2)</strong> The merchant guarantees that information listed on iChange Delivery relating to his products satisfies all legal requirements, and in particular satisfies information requirements for consumer protection.<br/><br/>

<strong>(3)</strong> The merchant will be responsible for keeping an up-to-date inventory of all their products listed on iChange Delivery.<br/><br/>

<strong>(4)</strong> The merchant guarantees that the information provided by him does not violate any third party's copyright.<br/><br/>

<strong>(5)</strong> The merchant will contact the customers no more than is necessary for processing the transactions referred by iChange Delivery. In particular, the merchant will not send any advertising email or other commercial advertisements to the customer without prior agreement from iChange Delivery or the expressed wish of the customer. When delivering products sold via iChange Delivery, the merchant will not advertise any of iChange Delivery's competitors.<br/><br/>

<strong>(6)</strong> The merchant will process orders and arrange delivery with all reasonable care the moment receipt of confirmation of sale is received through the iChange Delivery site via email and/or text message. The delivery options and time indicated on their listing is binding, orders should be fulfilled within 1 working day. The merchant is required to keep his advertised products and services available to the best of his ability. Repeated stock-outs will result in the removal of the merchant and all their products from the iChange Delivery platform.
<br/><br/>

<strong>(7)</strong> If the merchant cannot fulfill an order submitted to him, he must notify iChange Delivery as soon as possible, and within 1 day of receiving the order at the latest.<br/><br/>

<strong>(8)</strong> The merchant agrees to adhere to his range of products and prices as provided to iChange Delivery and as described on their listing on the website. The merchant guarantees that there are no ongoing criminal, bankruptcy or tax proceedings or other penalties outstanding in relation to the products they are selling through the platform. The merchant further guarantees to take great care to keep up-to- date his range of products, stock count, prices and associated terms and conditions, like delivery fees.<br/><br/>

<strong>(9)</strong> The merchant representative is to provide iChange Delivery with a copy of his/her valid Identity Card at the contract signature.<br/><br/>

<strong><span style="color: red;"> Commission</span></strong><br/><br/>

<strong>(1)</strong> The merchant agrees to pay iChange Delivery a fixed percentage commission on the gross revenue from their sales made through the iChange Delivery platform. Depending on the category it may be appropriate to agree different commission percentages for certain items or product categories.<br/><br/>

<strong>(2)</strong> iChange Delivery may start charging additional fees for the sale of goods through the iChange Delivery platform at any point. These may include but are not limited to, listing fees, multiple photos fees and enhanced marketing fees. In the event of the introduction of further fees, the merchant will be notified prior to their commencement in writing and they will have the option to opt out.<br/><br/>

<strong>(3)</strong> iChange Delivery reserves the right to adjust the percentage commission, providing suitable notice is served in advance to the merchant. iChange Delivery will give the merchant adequate notice of any commission changes, in writing. This does not cover adjustments that constitute a material change of the contract terms, which would require an additional agreement on the change.<br/><br/>

<strong><span style="color: red;">Customer online payment</span></strong><br/><br/>

<strong>(1)</strong> In case of electronic payment by the customer (e.g. by credit card, debit card, or Wireless online Transfer), iChange Delivery collects the payment for the relevant order in iChange Delivery's name on behalf of the merchant, and pays it out to the merchant according to the invoicing agreement.<br/><br/>

<strong>(2)</strong> The merchant will keep receipts of deliveries to customers for at least 13 months and make those available on request. In case of problems that may cause the order to be rescinded, or in case of a delivery failure, the merchant must immediately notify iChange Delivery by phone so that the credit card payment may be cancelled.<br/><br/>

<strong>(3)</strong> The merchant bears the risk of abuse of the payment medium (e.g. of credit card or debit card fraud). If a fraudulent payment has been credited to the merchant, iChange Delivery reserves the right to correct the amount the merchant is invoiced to offset this payment.<br/><br/>

<strong><span style="color: red;">Invoicing and merchant payment</span></strong><br/><br/>

<strong>(1)</strong> iChange Delivery's invoices may be delivered by email, online, fax, post or in person. They include iChange Delivery's claims on the merchant, commission, and, if applicable, other fees<br/><br/>

<strong>(2)</strong> iChange Delivery is to send a monthly statement of confirmed orders to the Supplier by the 10th of each month after which the supplier will have 5 days for verification and commission settlement.<br/><br/>


<strong><span style="color: red;">Liability</span></strong><br/><br/>

<strong>(1)</strong> The merchant indemnifies iChange Delivery from all claims arising in relation to matters outside iChange Delivery's control, including but not limited to the quality of goods and services provided by the seller. The merchant further indemnifies iChange Delivery from third parties' claims resulting from any violation of laws and regulations by the seller.<br/><br/>

<strong>(2)</strong> iChange Delivery cannot guarantee that its service will be free from all malfunctions, but will exercise all reasonable care and skill to resolve any such case.<br/><br/>

<strong>(3)</strong> VAT liability rests with the merchant and iChange Delivery will not be responsible for any VAT issues.<br/><br/>

<strong><span style="color: red;">Privacy</span></strong><br/><br/>

Both parties are obliged to treat confidentially the content of this agreement, as well as all other information and data they acquire in connection with the partnership, and not use it for purposes outside the scope of this contract or pass it on to third parties. This obligation is in force for 1 year after the termination of the contract. Both parties are obliged to follow privacy laws and handle accordingly all data related to customers, suppliers and business partners.<br/><br/>

<strong><span style="color: red;">Licence</span></strong><br/><br/>

<strong>(1)</strong> iChange Delivery has the right to freely maintain the merchant's listing and its ranking on the website. iChange Delivery offers customers the opportunity to give ratings and reviews of the merchant's goods and services on the website, and has the right but not the obligation to publish these online and make them visible to all customers. iChange Delivery reserves the right to delete ratings and reviews.<br/><br/>

<strong>(2)</strong> iChange Delivery may scan, transcribe, and publish online the merchant's listings, logos and other materials required. The merchant grants to iChange Delivery a royalty- free, perpetual, unrestricted licence to use and distribute any materials provided by him, for the purpose of advertising iChange Delivery's service. In particular, this includes use in Google AdWords campaigns, domain name registrations and other online marketing and search engine optimization measures.<br/><br/>

<strong><span style="color: red;">Terms and termination</span></strong><br/><br/>

<strong>(1)</strong> This agreement is valid as soon as the merchant signs the contract, or fulfils an order referred by iChange Delivery, and remains valid indefinitely, until termination by either party. Termination can occur at any time, with a period of notice of one month, in writing, by email, post or fax. The revenues generated during this notice period are still subject to the partnership agreement. The right to immediate termination by either party for important cause remains unaffected.<br/><br/>

<strong>(2)</strong> The right to immediate termination in particular covers the case where the merchant repeatedly receives negative ratings and reviews on the website, and when these are not obviously unjustified. Repeatedly providing misleading information or withholding information required to present the merchant's items is also grounds for immediate termination. Typos, mistakes and transmission errors are excluded from this, as long as they are not caused with intent or by gross negligence.<br/><br/>

<strong><span style="color: red;">General</span></strong><br/><br/>

<strong>(1)</strong> If a single clause in this agreement is invalid, both parties will endeavor to replace the invalid clause by a valid one that reproduces as closely as possible the intended economic meaning of the invalid clause. The validity of the rest of the agreement remains unaffected. This applies in particular if the agreement is found to be incomplete.<br/><br/>

<strong>(2)</strong> iChange Delivery reserves the right to modify his general terms and conditions without giving any justification. In that case, iChange Delivery will give the merchant adequate notice via email. The notice will contain advice on the right and period of objection to the changes, and on the consequences of leaving unexercised the right to object.<br/><br/>

<strong>(3)</strong> The changed terms and conditions are considered agreed by the merchant if he does not object to them in writing within 2 weeks of receiving notice of the changes.<br/><br/>

<strong>(4)</strong> Any terms and conditions of the merchant are not part of this agreement unless iChange Delivery expressly agrees to adhere to them in writing</p>
                            </div>

                          <a style="width: 100%;" href="continue.php" class="btn amado-btn">Accept and Continue</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
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