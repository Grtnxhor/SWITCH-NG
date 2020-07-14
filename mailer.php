<?php
session_start();


    $to = $_GET['id'];
    $from = "noreply@ichangedelivery.com.ng";
    $subject = "iChange Delivery";
    $cmessage = $_POST['msg'];

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

   
    $logo = 'img/core-img/c.png';
    $link = 'https://ichangedelivery.com.ng/';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>iChange Delvery</title></head><body>";
	$body .= "<a href='{$link}'><img src='{$logo}' alt=''></a><br><br>";
	$body .= "<p><strong>Email:</strong> {$from}</p><br/>";
	$body .= "<p><strong>Subject:</strong> {$subject}</p>";
	$body .= "<br/><br/><br/>";
	$body .= "<p>{$cmessage}</p>";
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
    header("location: product.php");

?>