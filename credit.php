<?php
session_start();
$con = mysqli_connect("localhost","root","","ichange");

$r = $_SESSION['seller'];
$y = $_SESSION['pay'];
$t = date("Y-M-D h-i-sa");
$ref = rand(0, 9999);

$sqll = "UPDATE ichange_product SET `defaulter` ='credited' WHERE `status`= 'delivered'";
$res = mysqli_query($con, $sqll);

$msg  = "Dear " .$r. "<br/> Your account has been credited with NGN " .$y. "<br/> Kindly check your bank account balance to confirm this details.<br/> Incase there was an error, <br/>kindly send back your error message through the support platform on your dashboard<br/> or write to us at support@ichangedelivery.com.ng";

$sql = "INSERT INTO support_reply(`other`, `ref`, `usname`, `msg`, `date`, `status`)";
$sql.= " VALUES('1', '$ref', '$r', '$msg', '$t', 'unread')";
$result = mysqli_query($con, $sql);

$sl = "INSERT INTO seller_pay(`sn`, `username`, `transref`, `payamt`, `paydate`)";
$sl.= " VALUES('1', '$r', '$ref', '$y', '$t')";
$rsult = mysqli_query($con, $sl);
header("location: payh.php");

?>