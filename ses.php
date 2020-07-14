<?php
session_start();
$data = $_GET['id'];
$con = mysqli_connect("localhost","root","","ichange");

$cons = mysqli_query($con,"select * from support where `SupportRef` = '$data'");
while ($row = mysqli_fetch_array($cons)) {
		$x = $row['Username'];
		
	}


if($_SERVER['REQUEST_METHOD'] == "POST") {

$msg 			= $_POST['msg'];
$ref	 		= $data;
$repl			= rand(0, 99999);
$usname	 		= $x;
$date    		= date("Y-m-d h-i-sa");
$stat 	 		= "Closed";


$sqll = "UPDATE support SET `Status` ='Closed' WHERE `SupportRef`= '$data'";
$res = mysqli_query($con, $sqll);



$sql = "INSERT INTO support_reply(`ref`, `usname`, `msg`, `date`, `via`)";
$sql.= " VALUES('$repl', '$usname', '$msg', '$date', '$data')";
$result = mysqli_query($con, $sql);
header("location: enter.php");
	 }
?>