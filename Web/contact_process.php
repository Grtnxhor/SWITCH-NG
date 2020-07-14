<?php

    $to = "notify@switch.com.ng";
    $from = $_REQUEST['email'];
    $csubject = "Subscription Notification";
    $cmessage = "Request for email notifications";

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Email Activation";

    $logo = 'http://localhost/switch/img/core-img/ic.png';
    $url  = 'http://switch.com.ng';

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Switch NG</title></head><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #3c3c3c; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='Switch NG'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Subscription Notification</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>{$from} requested for a notification subscription from Switch NG;</p>
		<br/>";	
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
    header("location: ./sent ");
?>