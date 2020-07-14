<?php
session_start();
$data = $_GET['id'];

if (isset($_POST['sub'])) {

$a = urlencode("Greatnessabolade@outlook.com"); //Note: urlencodemust be added forusernameand
$b = urlencode("securemelikekilode"); // passwordas encryption code for security purpose.

$c = $_POST['msg'];
$d = "iChange";
$e = "$data";

$url = "https://portal.nigeriabulksms.com/api/?username=".$a."&password=
".$b."&message=".$c."&sender=".$d."&mobiles=".$e;

$ch = curl_init();
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HEADER, 0);
$resp = curl_exec($ch);
echo $resp; // Add double slash or delete “echo”
curl_close($ch);
}
header("location: product.php");
?>