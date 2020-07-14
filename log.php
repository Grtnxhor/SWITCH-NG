<?php
session_start();
include("web/functions/init.php");

$lstseen = date("Y-m-d h:i:sa");


$sql = "UPDATE ichange_admin SET `lstseen` ='$lstseen'";
$result = query($sql);
confirm($result);

session_unset();
header("location: web/./index2");

// redirect("login.php");
?>