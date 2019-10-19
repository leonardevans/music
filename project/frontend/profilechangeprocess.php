<?php
session_start();
require_once('dbconnection.php');
if(isset($_POST['savechanges']) ){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}

	if(empty($_POST['firstname'])){
		header("location:profile.php?firstnameerr= Please enter your first name ");
	}
	elseif(empty($_POST['lastname'])){
		header("location:profile.php?lastnameerr= Please enter your last name ");
	}
	elseif(empty($_POST['username'])){
		header("location:profile.php?usernameerr= Please enter your user name ");
	}
	elseif(empty($_POST['gender'])){
		header("location:profile.php?gendererr= Please select your gender ");
	}
	elseif(empty($_POST['email'])){
		header("location:profile.php?emailerr= Please enter your email ");
	}
	elseif(empty($_POST['password'])){
		header("location:profile.php?passworderr= Please enter your password ");
	}
	else{
		$firstname=test_input($_POST['firstname']);
		$lastname=test_input($_POST['lastname']);
		$username=test_input($_POST['username']);
		$gender=test_input($_POST['gender']);
		$email=test_input($_POST['email']);
		$password=test_input($_POST['password']);
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)){ //filter_var() function to validate email
			header("location:profile.php?emailerr= Please enter a valid email ");
		}

		else{
			$username=$_SESSION['User'];
			$select="select * from customers where username='$username'";
			$result=mysqli_query($conn,$select);
			while($row=mysqli_fetch_assoc($result)){
				$id=$row['customerID'];
			}
			$sql = "UPDATE customers SET  firstname='$firstname',lastname='$lastname',username='$username',gender='$gender',email='$email',password='$password' WHERE customerID='$id'";
			if(mysqli_query($conn,$sql )){
							
				header("location:profile.php?update_success= Profile updated successfully.");
			}else{
				echo mysqli_error($conn);
				}
					}
		}
			
	
	
}
?>