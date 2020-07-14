<?php
session_start();
$con = mysqli_connect("localhost","root","","ichange");

                    $us = $_SESSION['Username'];
                    
                    $h = $_POST['num'];
                    $e = $_POST['address'];
                    $p = $_POST['town'];
                    $z = $_POST['zip'];
                    $cv = $_SESSION['deliv'];
                    $ref = rand(0, 99999);
                    $amount = $_SESSION['all'];

                    $cons = mysqli_query($con,"SELECT * FROM ichange_signup WHERE `Username` = '$us'");
                    while ($row = mysqli_fetch_array($cons)) {
                        $y = $row['First Name']." ".$row['Last Name'];
                        $g = $row['Email'];

                      }

                    $conts = mysqli_query($con,"SELECT * FROM ichange_cart WHERE `Buyer_Username` = '$us'");
                    while ($roww = mysqli_fetch_array($conts)) {
                       
                        $v = date("Y-m-d h:i:sa");

                         $sql = "INSERT INTO product_order(`sn`, `Product_ID`, `Product_Name`, `Product_Pix`, `Paydate`, `status`, `Buyer_Username`, `Buyer_Name`, `TransRef`, `amount`, `total`, `email`, `zip code`, `address`, `town`, `tel`, `dfee`)";
                    $sql.= "VALUES('1' ,'".$roww['Product_ID']."', '".$roww['Product_Name']."', '".$roww['Product_Pic']."', '$v', 'in transit', '$us', '$y', '$ref', '".$roww['Product_Price']."', '$amount', '$g', '$z', '$e', '$p', '$h', '$cv')";
                    $result = mysqli_query($con, $sql);
                    $last_id = mysqli_insert_id($con);
                    $_SESSION["id"] = $last_id;


                    $mm = "Hello <b>".$us."</b>!<br/>Your Product with Product_ID.: ".$roww['Product_ID']." and <br/> Product_Name.: ".$roww['Product_Name']." <br/> has been bought today.: ".$v." <br/> Your Payment Account shall be credited 3 days from ".$v."<br/><b>Kindly note that service fee shall be deducted before you are credited!</b><br/><br/><i>iChange Team</i>";


                    $sll = "UPDATE ichange_product SET `Sold` ='Sold' WHERE `Product_ID`= '".$roww['Product_ID']."'";
                    $rs = mysqli_query($con, $sll);

                    $tk = "INSERT INTO support_reply(`ref`, `msg`, `date`, `usname`, `via`, `status`, `other`)";
                    $tk.= " VALUES('$ref', '$mm', '$v', '$us', 'frontend', 'unread', '1')";
                    $r = mysqli_query($con, $tk);
                 

                      }    


          $sqll = "DELETE FROM ichange_cart WHERE `Buyer_Username` = '$us'";
                    $res = mysqli_query($con, $sqll);        

          $wish = "DELETE FROM ichange_wish WHERE `wish_Username` = '$us'";
                    $wishes = mysqli_query($con, $sqll);                    

          header("location: ./success");
?>
