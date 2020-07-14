<?php
session_start();

$data = $_GET['id'];
$con = mysqli_connect("localhost","root","","ichange");

$sql = "DELETE FROM `ichange_product` WHERE `Product_ID` = '$data'";
$result = mysqli_query($con, $sql);

$msg = $_SESSION['msg'];
$v = $_SESSION['v'];
$ref = rand(0, 9999);
$d = date("Y-m-d h:i:sa");

$sql = "INSERT INTO support_reply(`ref`, `msg`, `date`, `usname`, `via`, `status`, `other`)";
$sql.= " VALUES('$ref', '$msg', '$d', '$v', '$y', 'unread', '1')";
$result = mysqli_query($con, $sql);

header("location: ./product");
?>