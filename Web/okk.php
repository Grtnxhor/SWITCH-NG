<?php
session_start();
if (!isset($_GET['id'])) {
   
   header("location: ./404");
}else {
$data = $_GET['id'];
$conn = mysqli_connect("localhost","root","","ichange");
$cont = mysqli_query($conn, "SELECT * from `ichange_signup` where `Username` = '$data'");
while ($row = mysqli_fetch_array($cont)) {
		$z = $row['Email'];
		
	}
$_SESSION['verify'] 	    = md5(rand(0, 99999999999999));
$verify 					= $_SESSION['verify'];


$sqll = "UPDATE ichange_signup SET `activator` = '$verify' WHERE `Username`= '$data'";
$res = mysqli_query($conn, $sqll);

$email 		= $z;

	if(!isset($verify)) {
   header("location: ./wrong");
} else {

	
	$to 		= $z;
    $from 		= "noreply@switch.com.ng";
    $cmessage 	= "Best Regards<br/> <i>Switch Team</i>";

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Email Activation";

    $logo = 'http://localhost/switch/img/core-img/ic.png';
    $url  = 'http://switch.com.ng';
    $link = 'http://localhost/switch/web/./activate?id='.$verify;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Switch NG</title></head><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #3c3c3c; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='Switch NG'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Activate your email to continue</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>Thank you for creating an account with us. Kindly activate your email address;</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to activate your email Address</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'>Do not bother replying this email. This is a virtual email</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>For Support, call: 09070903614, 08103171902</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>or write to: support@switch.com.ng</p>
		<br/>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>Best Regards</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left; padding-bottom: 50px;'><i>Switch Team</i></p>";	
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
    header("location: ./verify");
			}
		}
?>