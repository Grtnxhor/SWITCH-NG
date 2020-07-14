 <?php
 session_start();
 $con = mysqli_connect("localhost","root","","ichange");
 $mm = $_SESSION['m'];
                 
$v = $_SESSION['v'];
$ref = rand(0, 9999);
$d = date("Y-m-d h:i:sa");


$x 			= $_POST['serv'];	


$y = $_GET['id'];

$sq = "UPDATE ichange_product SET `Approved` ='Approved', `service_fee` = '$x' WHERE `Product_ID`= '$y'";
$res = mysqli_query($con, $sq);

$sql = "INSERT INTO support_reply(`ref`, `msg`, `date`, `usname`, `via`, `status`, `other`)";
$sql.= " VALUES('$ref', '$mm', '$d', '$v', '$y', 'unread', '1')";
$result = mysqli_query($con, $sql);
header("location: ./detm?id=".$y."");
?>