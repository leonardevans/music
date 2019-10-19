<?php
session_start();
require_once('dbconnection.php');
if(isset($_POST['signup']) ){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	if(empty($_POST['firstname'])){
		header("location:signup.php?firstnameerr= Please enter your first name ");
	}
	elseif(empty($_POST['lastname'])){
		header("location:signup.php?lastnameerr= Please enter your last name ");
	}
	elseif(empty($_POST['username'])){
		header("location:signup.php?usernameerr= Please enter your user name ");
	}
	elseif(empty($_POST['gender'])){
		header("location:signup.php?gendererr= Please select your gender ");
	}
	elseif(empty($_POST['email'])){
		header("location:signup.php?emailerr= Please enter your email ");
	}
	elseif(empty($_POST['password'])){
		header("location:signup.php?passworderr= Please enter your password ");
	}
	elseif(empty($_POST['confirmpassword'])){
		header("location:signup.php?confirmpasserr= Please confirm your password ");
	}else{
		$firstname=test_input($_POST['firstname']);
		$lastname=test_input($_POST['lastname']);
		$username=test_input($_POST['username']);
		$gender=test_input($_POST['gender']);
		$email=test_input($_POST['email']);
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)){ //filter_var() function to validate email
			header("location:signup.php?emailerr= Please enter a valid email ");
		}
		else{
			$password=test_input($_POST['password']);
			$confirmpassword=test_input($_POST['confirmpassword']);
			if($password != $confirmpassword) {
					header("location:signup.php?passmatcherr= Passwords do not match. ");
			}
			else{
				$checkusername="select * from customers where username='$username'";
				$usernameresult = mysqli_query($conn,$checkusername);
				if(mysqli_fetch_assoc($usernameresult)){
					header("location:signup.php?checkusernameerr= User name exists. ");
				}
				else{
					$checkemail="select * from customers where email='$email'";
					$emailresult = mysqli_query($conn,$checkemail);
					if(mysqli_fetch_assoc($emailresult)){
						header("location:signup.php?checkemailerr= Email exists. ");
					}
					else{
						$sql = "INSERT INTO customers (firstname,lastname,username,gender,email,password) 
								VALUES ('$firstname','$lastname','$username','$gender','$email','$password')";
						if(mysqli_query($conn,$sql )){
							$_SESSION['User']=$username;
							header("location:index.php");
						}else{
							header("location:signup.php?registererr= Error creating account. ");
						}
					}
				}
			}
		}
	}
}
?>