<?php session_start();
require_once('dbconnection.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Viking movies">
<meta charset="UTF-8">
<title>my profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="frontstyle.css">
<style>

</style>
</head>
<body class="">
<div id="holder">

<?php require('header.html'); ?>

<center>
<div id="profile">
	<?php require 'profile_update_errors.php';?>

	<form action="profilechangeprocess.php" method="post">
		<?php
		if(isset($_SESSION['User'])){
			$username=$_SESSION['User'];
			$getdetails="SELECT customerID,firstname,lastname,username,gender,email,password FROM customers where 
			username='$username'";
			$result=mysqli_query($conn,$getdetails) or die("Error accessing your profile. ".mysqli_error($conn));
			$row=mysqli_fetch_assoc($result);
			echo "<table><caption>My profile</caption>";
			echo "<tr><td> ID : </td><td>".$row['customerID']."</td></tr>";
			echo "<tr><td> First Name : </td><td> <input type='text' name='firstname' value='".$row['firstname']."'> </td></tr>";
			echo "<tr><td> Last Name : </td><td> <input type='text' name='lastname' value='".$row['lastname']."'> </td></tr>";
			echo "<tr><td> User  Name : </td><td> <input type='text' name='username' value='".$row['username']."'> </td></tr>";
			echo "<tr><td> Gender : </td><td> <input type='text' name='gender' value='".$row['gender']."'> </td></tr>";
			echo "<tr><td> Email : </td><td><input type='text' name='email' value='".$row['email']."'> </td></tr>";
			echo "<tr><td> Password : </td><td><input type='password' name='password' value='".$row['password']."'> </td></tr>";
			echo "<tr><td > <input type='submit' name='savechanges' value='Save Changes'> </td></tr>";
			echo "</table>";
		}
		?>
	</form>
</div>
</center>
<?php require('footer.html');?>
</div>
</body>
</html>