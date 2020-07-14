<?php
session_start();
if (isset($_SESSION['Username']))
 {
?>



<?php
$con = mysqli_connect("localhost","root","","ichange");

$data = $_GET['id'];

$cons = mysqli_query($con,"DELETE FROM ichange_cart where `cart_idsn` = '$data'");

  header("location: cart.php");
}
?>