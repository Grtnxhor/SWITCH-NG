<?php
session_start();
$data = $_GET['id'];
$con = mysqli_connect("localhost","root","","ichange");
 
$t = date("Y-m-d h:i:sa");

$sqll = "UPDATE product_order SET `status` ='delivered', `statusdate` = '$t' WHERE `Product_ID`= '$data'";
$res = mysqli_query($con, $sqll);

$sql = "UPDATE ichange_product SET `status` ='delivered' WHERE `Product_ID`= '$data'";
$re = mysqli_query($con, $sql);

header("location: delivery.php");

?>