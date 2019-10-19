<?php
require_once('dbconnection.php');
if(isset($_POST['addadmin']) ){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	if(empty($_POST['firstname'])){
		header("location:admins.php?admfirstnameerr= Please enter first name ");
	}
	elseif(empty($_POST['lastname'])){
		header("location:admins.php?admlastnameerr= Please enter last name ");
	}
	elseif(empty($_POST['username'])){
		header("location:admins.php?admusernameerr= Please enter user name ");
	}
	elseif(empty($_POST['gender'])){
		header("location:admins.php?admgendererr= Please enter gender ");
	}
	elseif(empty($_POST['email'])){
		header("location:admins.php?admemailerr= Please enter email ");
	}
	elseif(empty($_POST['password'])){
		header("location:admins.php?admpassworderr= Please enter password ");
	}
	elseif($_POST['gender'] != "male" && $_POST['gender'] != "female"){
		header("location:admins.php?admgendererr= Gender should be male or female ");
	}
	else{
		$firstname=test_input($_POST['firstname']);
		$lastname=test_input($_POST['lastname']);
		$username=test_input($_POST['username']);
		$gender=test_input($_POST['gender']);
		$email=test_input($_POST['email']);
		$password=test_input($_POST['password']);
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)){ //filter_var() function to validate email
			header("location:admins.php?admemailerr= Please enter a valid email ");
		
		}else{
				$checkusername="select * from admin where username='$username'";
				$usernameresult = mysqli_query($conn,$checkusername);
				if(mysqli_fetch_assoc($usernameresult)){
					header("location:admins.php?admcheckusernameerr= User name exists. ");
				}
				else{
					$checkemail="select * from admin where email='$email'";
					$emailresult = mysqli_query($conn,$checkemail);
					if(mysqli_fetch_assoc($emailresult)){
						header("location:admins.php?admcheckemailerr= Email exists. ");
					}
					else{
						$sql = "INSERT INTO admin (firstname,lastname,username,gender,email,password) 
								VALUES ('$firstname','$lastname','$username','$gender','$email','$password')";
						if(mysqli_query($conn,$sql )){
							
							header("location:admins.php?addadminsuccess= Admin added successfully.");
						}else{
							header("location:admins.php?addadminerr= Error adding admin ");
						}
					}
				}
			}
		}
	
}
?>