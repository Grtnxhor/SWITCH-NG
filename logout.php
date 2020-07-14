<?php
session_start();
include("web/functions/init.php");

$lstseen = date("Y-m-d h:i:sa");
$username = $_SESSION['Username'];

$sql = "UPDATE ichange_signup SET `lstseen` ='$lstseen' WHERE `Username`= '$username'";
$result = query($sql);
confirm($result);

session_unset();
header("location: web/./index2");

// redirect("login.php");
?>