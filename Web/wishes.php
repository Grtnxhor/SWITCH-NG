<?php
session_start();
if (isset($_SESSION['Username']))
 {
?>



<?php
$con = mysqli_connect("localhost","root","","ichange");

$data = $_GET['id'];

$cons = mysqli_query($con,"select * from ichange_product where `Product_ID` = '$data'");
while ($row = mysqli_fetch_array($cons)) {
		$x = $row['Product_ID'];
		$y = $row['Product_Name'];
		$z = $row['Product_Price'];
		$a = $row['prodpix'];
		$i = $row['service_fee'];
	}
?>


<?php

$b = $_SESSION['Username'];
$c = date("Y-m-d h:i:sa");
$r = rand(0, 99999);

$j = "1";

$sql = "INSERT INTO ichange_wish(`wish_idsn`, `Product_Pic`, `wish_sn`, `Product_Name`, `Product_ID`, `Product_Price`, `wish_Username`, `Datesub`, `delivery`)";
$sql.= " VALUES('$r', '$a', '$j', '$y', '$x', '$z', '$b', '$c', '$i')";
$result = mysqli_query($con, $sql);
header("location: ./wish");
?>


<?php
}
else{
  header("location: ./index2");
}
?>