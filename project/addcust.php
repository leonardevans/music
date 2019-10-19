<?php
require_once('dbconnection.php');
if(isset($_POST['addcust']) ){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	if(empty($_POST['firstname'])){
		header("location:home.php?firstnameerr= Please enter first name ");
	}
	elseif(empty($_POST['lastname'])){
		header("location:home.php?lastnameerr= Please enter last name ");
	}
	elseif(empty($_POST['username'])){
		header("location:home.php?usernameerr= Please enter user name ");
	}
	elseif(empty($_POST['gender'])){
		header("location:home.php?gendererr= Please enter gender ");
	}
	elseif(empty($_POST['email'])){
		header("location:home.php?emailerr= Please enter email ");
	}
	elseif(empty($_POST['password'])){
		header("location:home.php?passworderr= Please enter password ");
	}elseif($_POST['gender'] != "male" && $_POST['gender'] != "female"){
		header("location:home.php?gendererr= Gender should be male or female ");
	}
	else{
		$firstname=test_input($_POST['firstname']);
		$lastname=test_input($_POST['lastname']);
		$username=test_input($_POST['username']);
		$gender=test_input($_POST['gender']);
		$email=test_input($_POST['email']);
		$password=test_input($_POST['password']);
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)){ //filter_var() function to validate email
			header("location:home.php?emailerr= Please enter a valid email ");
		
		}else{
				$checkusername="select * from customers where username='$username'";
				$usernameresult = mysqli_query($conn,$checkusername);
				if(mysqli_fetch_assoc($usernameresult)){
					header("location:home.php?checkusernameerr= User name exists. ");
				}
				else{
					$checkemail="select * from customers where email='$email'";
					$emailresult = mysqli_query($conn,$checkemail);
					if(mysqli_fetch_assoc($emailresult)){
						header("location:home.php?checkemailerr= Email exists. ");
					}
					else{
						$sql = "INSERT INTO customers (firstname,lastname,username,gender,email,password) 
								VALUES ('$firstname','$lastname','$username','$gender','$email','$password')";
						if(mysqli_query($conn,$sql )){
							
							header("location:home.php?addcustsuccess= Customer added successfully.");
						}else{
							header("location:home.php?addcusterr= Error adding customer ");
						}
					}
				}
			}
		}
	
}

?>