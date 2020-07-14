	<?php

/*************helper functions***************/

function clean($string) {

	return htmlentities($string);
}

function redirect($location) {

	return header("Location: {$location}");
}

function set_message($message) {

	if(!empty($message)) {

		$_SESSION['message'] = $message;

		}else {

			$message = "";
		}
}



function display_message() {

	if(isset($_SESSION['message'])) {

		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
}

function token_generator() {

	$token = $_SESSION['token'] = md5(uniqid(mt_rand(), true));

	return $token; 
}

function validation_errors($error_message) {

$error_message = <<<DELIMITER

<div class="alert alert-danger alert-mg-b alert-success-style6 alert-st-bg3 alert-st-bg14">
    <button type="button" class="close sucess-op" data-dismiss="alert" aria-label="Close">
		<span class="icon-sc-cl" aria-hidden="true">&times;</span>
									</button>
                 <p><strong>$error_message </strong></p>
                            </div>
DELIMITER;

   return $error_message;     

}


function email_exist($email) {

	$sql = "SELECT * FROM ichange_signup WHERE email = '$email'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}

function activated($username) {

	$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".clean($_POST['usrname'])."' AND `Active` = '0'" ;
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}

function email_dexist($mail) {

	$sql = "SELECT * FROM ichange_signup WHERE email = '$mail'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return false;

	}else {

		return true;
	} 
}

function username_exist($usrname) {

	$sql = "SELECT * FROM ichange_signup WHERE Username = '$usrname'";
	$result = query($sql);

	if(row_count($result) == 1) {

		return true;

	}else {

		return false;
	} 
}


/*******validate user reg*****/
function validate_user_registration() {

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST") {

$fname 			= clean($_POST['fname']);
$lname	 		= clean($_POST['lname']);
$tel	 		= clean($_POST['tel']);
$email    		= clean($_POST['email']);
$address 		= clean($_POST['address']);
$gender    		= clean($_POST['gender']);
$usrname 		= clean($_POST['usrname']);
$pword    		= clean($_POST['pword']);
$cpword	 		= clean($_POST['cpword']);


if(email_exist($email)) {

			$errors[] = "Sorry! That email already has an account.";
		} else {

if(username_exist($usrname)) {

			$errors[] = "That username has been registered!";
		} else {


if($pword != $cpword) {

			$errors[] = "Password doesn`t match!";
		}
	}
}

		if(!empty($errors)) {

			foreach ($errors as $error) {
		
                echo validation_errors($error); 

			}

		} else {

			if(register_user($fname, $lname, $tel, $email, $address, $gender, $usrname, $pword, $cpword)) {

				redirect("./create");

							} else {
								
				redirect("./okk?id=$usrname");
							}

		}


	} // post request

} // function
/****register user*****/
function register_user($fname, $lname, $tel, $email, $address, $gender, $usrname, $pword, $cpword) {

	$fname 				= escape($fname);
	$lname 				= escape($lname);
	$tel 				= escape($tel);
	$email   			= escape($email);
	$address 			= escape($address);
	$gender				= escape($gender);
	$usrname   			= escape($usrname);
	$pword 				= md5($pword);

	$datereg = date("Y-m-d h:i:sa");


$sql = "INSERT INTO ichange_signup(`sn`, `First Name`, `Last Name`, `Telephone`, `Email`, `Address`, `Gender`, `Username`, `Password`, `Datereg`, `Active`)";
$sql.= " VALUES('1', '$fname', '$lname', '$tel', '$email', '$address', '$gender', '$usrname', '$pword', '$datereg', '0')";
$result = query($sql);
confirm($result);
	 }

/***************Validate reset password********************/
function validate_reset_password() {

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST") {

$email 				= clean($_POST['mail']);

session_start();
$_SESSION['reset']  =  md5(rand(0, 999999999));
$reset  			=  $_SESSION['reset'];

if(email_dexist($email)) {

			$errors[] = "sorry that email is not registered";
		}

		if(!empty($errors)) {

			foreach ($errors as $error) {
		
                echo validation_errors($error); 

			}

		} else  {

	if(!isset($reset)) {
   redirect("./wrong");
} else {

	$to 		= $_REQUEST['mail'];
    $from 		= "noreply@switch.com.ng";

    $headers = "From: $from";
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $from . "\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $subject = "Password Reset";

    $logo = 'http://localhost/switch/img/core-img/ic.png';
    $url  = 'http://switch.com.ng';
    $link = 'http://localhost/switch/web/./recover?id='.$reset;

	$body = "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Switch NG</title></head><body style='text-align: center;'>";
	$body .= "<section style='margin: 30px; margin-top: 50px ; background: #3c3c3c; color: white;'>";
	$body .= "<img style='margin-top: 35px' src='{$logo}' alt='Switch NG'>";
	$body .= "<h1 style='margin-top: 45px; color: #fbb710'>Reset your Password</h1>
		<br/>";
	$body .= "<p style='margin-left: 45px; margin-top: 34px; text-align: left; font-size: 17px;'>You requested to reset your password. Kindly use the link below to reset your password;</p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'><a href='{$link}' style='color: #fbb710; text-decoration: none'>Click here to reset your password</a></p>
		<br/>";
	$body .= "<p style='margin-left: 45px; text-align: left;'>Kindly discard this mail, if you didn`t request for a password reset.</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>For Support, call: 09070903614, 08103171902</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>or write to: support@switch.com.ng</p>
		<br/>";	
	$body .= "<p style='margin-left: 45px; text-align: left;'>Best Regards</p>";	
	$body .= "<p style='margin-left: 45px; text-align: left; padding-bottom: 50px;'><i>Switch Team</i></p>";	
	$body .= "</section>";	
	$body .= "</body></html>";

    $send = mail($to, $subject, $body, $headers);
    header("location: ./recovery");
			}
		}

	}
	}
 // post request
  // function


/***************Validate update password********************/
function validate_update_password() {

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST") {

$email	 		= clean($_POST['email']);
$new    		= clean($_POST['pword']);
$conf    		= clean($_POST['cpword']);

	if(email_dexist($email)) {

			$errors[] = "sorry that email is not registered";
		} else {

if($new != $conf) {

			$errors[] = "Password doesn`t match";
		}
	}

		if(!empty($errors)) {

			foreach ($errors as $error) {
		
                echo validation_errors($error); 

			}

		} else {

			if(update($email, $new, $conf)) {

				redirect("./index");

							} else {

								
				redirect("./recover");
							}

		}


	} // post request

} // function

/******************************update***************/

function update($email, $new, $conf) {

	$email 				= escape($email);
	$new   				= md5($new);
	$conf   			= md5($conf);

$sql = "UPDATE `ichange_signup` SET `Password` = '$new', `Active` = '1' WHERE `Email` = '$email'";
$result = query($sql);
confirm($result);

$sql2 = "SELECT * FROM `ichange_signup` WHERE `Email` = '$email'";
$result2 = query($sql2);
if(row_count($result2) == 1) {
	$row2 = mysqli_fetch_array($result2);

	$user3 = $row2['Email'];
	$active3 =  $row2['Active'];

	if ($active3 == 0) {
		redirect("./okk?id=$usrname");
	} else {

	if($email == $user3) {
		session_start();
		$_SESSION['Username'] = $row2['Username'];
		unset($_SESSION['reset']);
		return true;
	}
}
}
}


/************************validate user login functions**********/
function validate_usrlogin() {

	$errors = [];

	

	if($_SERVER['REQUEST_METHOD'] == "POST") {

			$username        = clean($_POST['usrname']);
			$password   	 = clean($_POST['pword']);

			if(empty($username)) {

				$errors[] = "Username cannot be empty";
			}


			if(empty($password)) {

				$errors[] = "Password cannot be empty";
			}


			if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(login_user($username, $password)) {
					redirect("./index");

				} else {

					echo validation_errors("Wrong Password or Username!");
				}
			} 

		}

} //function


/************************ user login functions**********/

function login_user($username, $password) {

	$pword  	= md5($password);
	$usrname 	= escape($username);
	
$sql = "SELECT * FROM `ichange_signup` WHERE `Username` = '$usrname' AND `Password` = '$pword'";
$result = query($sql);
if(row_count($result) == 1) {
	$row = mysqli_fetch_array($result);

	$user = $row['Username'];
	$active =  $row['Active'];

	if ($active == 0) {
		redirect("./okk?id=$usrname");
	} else {

	if($usrname == $user) {
		session_start();
		$_SESSION['Username'] = $usrname;
		unset($_SESSION['verify']);
		return true;
	}
}
}

} //end of function 

/**********************logged in***************/

function logged_in() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Username"];
return true;
		} 
	}
/**********log***********/
function user() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["First Name"]." ".$row["Last Name"];
return true;
		} 
	}	

/**********add***********/
function add() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Address"];
return true;
		} 
	}		

/**********tel***********/
function tel() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Telephone"];
return true;
		} 
	}		


/**********Gend***********/
function gend() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Gender"];
return true;
		} 
	}		

/***lstseen****/
function lstseen() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["lstseen"];
return true;
		} 
	}		


/***test****/
function tst() {

$sql = "SELECT * FROM ichange_product WHERE `Username` = 'Grtnxhor'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Datesub"];
return true;
		} 
	}		



/*********product picture****/
function dpix() {

$sql = "SELECT * FROM ichange_product WHERE Sold='0' AND `Approved` = '0'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
 echo '
 <img src= "uploads/product/'.$row['prodpix'].'" alt="product picture">';
return true;
		} 
	}		


/**********date***********/
function dat() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Datereg"];
return true;
		} 
	}			

/**********email***********/
function ead() {

$sql = "SELECT * FROM ichange_signup WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Email"];
return true;
		} 
	}

/**********seller***********/
function seller_score() {
$sql = "SELECT * FROM ichange_product WHERE `Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row["Product_ID"];
return true;
		} 
	}


/***********chck********/

function chck() {
$sql = "SELECT * FROM ichange_cart WHERE `Buyer_Username` = '".$_SESSION['Username']."'";
$result = query($sql);
if(row_count($result) == 1) {
$row = mysqli_fetch_array($result);
echo $row['Product_Price'];
return true;
		} 
	}

/*******validate_seller*****/
function validate_seller() {

$errors = [];

if($_SERVER['REQUEST_METHOD'] == "POST") {

$pname 			= clean($_POST['pname']);
$pcat	 		= clean($_POST['pcat']);
$price	 		= clean($_POST['price']);
$fault    		= clean($_POST['fault']);
$acct 	 		= clean($_POST['acct']);
$bank    		= clean($_POST['bank']);



			$target_dir = "web/upload/product/";
			$target_file =  basename($_FILES["fileToUpload"]["name"]);
			$targetFilePath = $target_dir . $target_file;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"]) && !empty($_FILES["fileToUpload"]["name"])){
			   
			// Check if file already exists
			if (file_exists($targetFilePath)) {
			    $errors[] = "Sorry, this product Image is already registered on our database. Kindly rename your file and try again later.";
			    $uploadOk = 0;
			} else {

			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "jpeg") {
			    $errors[] = "Sorry, only JPG and JPEG files are allowed.";
			    $uploadOk = 0;
			} else {
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			    $errors[] = "Sorry, your Product Image was not uploaded.";
			// if everything is ok, try to upload file
			} else {
			    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFilePath)) {
			          if(seller($pname, $pcat, $price, $fault, $acct, $bank, $target_file)) {

				redirect("./continue");

							} else {

				redirect("./approval");
							}
			    } else {
			        $errors[] = "Sorry, the size of your image is large.";
			    }
			}
			}
		}
	}

if(!empty($errors)) {

			foreach ($errors as $error) {
		
                echo validation_errors($error); 

			}
}			




		}


	} // post request
 // function
/****register user*****/
function seller($pname, $pcat, $price, $fault, $acct, $bank, $target_file) {
 	$errors 			= [];

	$pname 				= escape($pname);
	$pcat 				= escape($pcat);
	$price 				= escape($price);
	$fault   			= escape($fault);
	$acct 	 			= escape($acct);
	$bank				= escape($bank);
	$id 				= mt_rand(1000, 9999);
	$name 				= $_SESSION['Username'];
    $datesub 			= date("Y-m-d h:i:sa");

$sql = "INSERT INTO ichange_product(`Product_sn`, `Product_ID`, `Product_Name`, `Product_Fault`, `Product_Price`, `Product_Category`, `Username`, `Seller_Acct`, `Seller_Bank`, `Approved`, `Sold`, `prodpix`, `Datesub`, `status`, `defaulter`)";
$sql.= " VALUES('1' ,'$id', '$pname', '$fault', '$price', '$pcat', '$name', '$acct', '$bank', 'Pending', 'In Stock', '$target_file', '$datesub', 'undelivered', 'uncredited')";
$result = query($sql);
confirm($result);
	 }

/***********admin**************/

function admin($fname, $lname, $uname, $pword, $tel, $email) {

 $fname = "Obiwale";
 $lname = "Ayomide";
 $uname = "AyLandlord";
 $pword = md5("securemelikekilode");
 $tel   = "07016169889";
 $email = "Greatnessabolade@outlook.com";

 $sql = "INSERT INTO ichange_admin(`Username`, `Password`, `Email`, `First Name`, `Last Name`, `Tel`)";
$sql.= " VALUES('$uname' ,'$pword', '$email', '$fname', '$lname', '$tel')";
$result = query($sql);
confirm($result); 
}

/************************validate Admin login functions**********/
function validate_admlogin() {

	$errors = [];

	

	if($_SERVER['REQUEST_METHOD'] == "POST") {

			$password   	 = clean($_POST['pword']);

			
			if(empty($password)) {

				$errors[] = "Password cannot be empty";
			}


			if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(login_admin($password)) {
					redirect("./admdex");

				} else {

					echo validation_errors("Wrong Password or Username!");
				}
			} 

		}

} //function


/************************ user login functions**********/

function login_admin($password) {

	$pword  	= md5($password);
	
	
$sql = "SELECT * FROM `ichange_admin` WHERE `Password` = '$pword'";
$result = query($sql);
if(row_count($result) == 1) {
	$row = mysqli_fetch_array($result);
		session_start();
		$_SESSION['Password'] = md5($pword);

		return true;
	}
}
 //end of function 



/************validate update password*******/
function validate_update() {
$errors = [];

	

	if($_SERVER['REQUEST_METHOD'] == "POST") {

			$pword           = md5($_POST['pword']);
			$cpword      	 = md5($_POST['cpword']);


if($pword != $cpword) {

			$errors[] = "Password doesn`t match!";
		}

			if(!empty($errors)) {

				foreach ($errors as $error) {
			
	                echo validation_errors($error); 

				}

			} else {

				if(updte($pword, $cpword)) {
					
					echo validation_errors("Wrong Password or Username!");
				} else {

					
					echo validation_errors("Your Password has been Updated Successfully");
				}
			} 

		}

} //function

/************************ user login functions**********/

function updte($pword, $cpword) {

	$us 		= $_SESSION['Username'];
	
$sqll = "UPDATE ichange_signup SET `Password` ='$pword' WHERE `Username`= '$us'";
$res = query($sqll);
	}

/****/

function rev() {
	$errors = [];
if($_SERVER['REQUEST_METHOD'] == "POST") {

$msg 			= $_POST['msg'];
$ref	 		= rand(0, 9999999);
$usname	 		= $_SESSION['Username'];
$date    		= date("Y-m-d h-i-sa");
$stat 	 		= "Open";


$sql = "INSERT INTO support(`sn`, `SupportRef`, `Username`, `Msg`, `Datesent`, `Status`)";
$sql.= " VALUES('1', '$ref', '$usname', '$msg', '$date', '$stat')";
$result = query($sql);
redirect("./sent");
}
}
?>