<?php
$firstname=$lastname=$username=$email=$password=$confirmpassword="";
$firstnameerr=$lastnameerr=$usernameerr=$emailerr=$passworderr=$confirmpassworderr=$passmatcherr=$connecterr="";

//connect to the database
$servername="localhost";
$user="root";
$pass="";
$dbname="xflix";

$conn=mysqli_connect($servername,$user,$pass,$dbname);
//check connection
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_POST['signin'])){
			function test_input($data){
			$data=trim($data);
			$data=stripslashes($data);
			$data=mysql_real_escape_string($data);
			$data=htmlspecialchars($data);
			return $data;
		}
	
		//to ensure that form fields are field properly and not empty
		if(empty($_POST['firstname'])){
			$firstnameerr="First name is required";
		}
		else{
			$firstname = test_input($_POST['firstname']);
		}
		if(empty($_POST['lastname'])){
			$lastnameerr="Lastname name is required";
		}
		else{
			$lastname = test_input($_POST['lastname']);
		}
		if(empty($_POST['username'])){
			$usernameerr="Username is required";
		}else{
			$username = test_input($_POST['username']);
		}
		if(empty($_POST['email'])){
			$emailerr = "Email is required";
		}
		else{
			$email =$_POST['email'];
			if (!filter_var($email,FILTER_VALIDATE_EMAIL)){ //filter_var() function to validate email
			$emailErr = "Invalid email format";
		}
		}
		if(empty($_POST['password'])){
			$passworderr="Password is required";
		}else{
			$password=$_POST['password'];
		}
		if(empty($_POST['confirmpassword'])){
			$confirmpassworderr = "You need to confirm password";
		}else{
			$confirmpassword=$_POST['confirmpassword'];
		}
	
			if($password != $confirmpassword) {
				$passmatcherr="The two passwords do not match";
			}else{
				
				$sql = "INSERT INTO customers (firstname,lastname,username,email,password) 
				VALUES ('$firstname','$lastname','$username','$email','$password')";
				if(mysqli_query($conn,$sql )){
					header("Location:index.php");
				}else{
					$connecterr="Error creating account".mysqli_error($conn);
				}
			}
		
	}
	
}

?>