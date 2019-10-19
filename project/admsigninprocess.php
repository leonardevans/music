<?php
session_start();
require_once('dbconnection.php');
if(isset($_POST['signin'])){
	
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
		if(empty($_POST['username'])){
			header("location:admsignin.php?usernameerr= Please enter your username ");
		}		
		elseif(empty($_POST['password'])){
			header("location:admsignin.php?passworderr= Please enter your password ");
		}
		elseif(empty($_POST['username']) && empty($_POST['password'])){
			header("location:admsignin.php?emptyerr= Please enter your user name and  password ");
		}
		else{
			$username=test_input($_POST['username']);
			$password=test_input($_POST['password']);
				$checkusername="select * from admin where username='$username'";
				$usernameresult = mysqli_query($conn,$checkusername);
				if(mysqli_fetch_assoc($usernameresult)){
						$sql="select * from admin where username = '$username' and password = '$password' ";
						$result = mysqli_query($conn,$sql);
						if(mysqli_fetch_assoc($result)){
							$_SESSION['Admin']=$username;
							header("location:home.php");
						}else{
							header("location:admsignin.php?signinerr= Please enter correct user name and password ");
						}
				}
				else{
					header("location:admsignin.php?userexisterr= User name does not exist. You are not admin. ");
				}
		
		}
}
else{
	echo "file not working!";
}

?>