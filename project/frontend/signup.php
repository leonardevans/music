<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Viking movies">
<meta charset="UTF-8">
<title>sign up</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="frontstyle.css">
<style>

</style>
</head>
<body class="">
<br>
<div id="sign" >
	<p id="signbackground"><a href="index.php"><b>XFLIX</b></a></p>
<h4>Sign Up</h4>
<br>
<?php require 'signuperrors.php';?>

<br>
<Form action="signupprocess.php" method="post">
	<label>First Name : </label><input type="text" name="firstname">
	<br><br>
	<label>Last Name : </label><input type="text" name="lastname" >
	<br><br>
	<label>Username : </label><input type="text" name="username">
	<br><br>
	<label>Gender:</label><br>
	<input type="radio" name="gender" <?php if(isset($gender) && $gender=="female"){echo "checked";}?>value="female">Female 
	<input type="radio" name="gender" <?php if(isset($gender) && $gender=="male"){echo "checked";}?> value="male">Male 
	<input type="radio" name="gender" <?php if(isset($gender) && $gender=="other"){echo "checked";}?> value="other">Other
	<br><br>
	<label>Email : </label><input type="text" name="email" >
	<br><br>
	<label>Password : </label><input type="password" name="password">
	<br><br>
	<label>Confirm Password : </label><input type="password" name="confirmpassword">
	<br><br>
	<input type="submit" name="signup" value="Sign Up">
	<br>
	<br>
	<p>Already have an account?<a href="signin.php">Sign In.</a></p><br><br>
</Form>
</div>
</body>
</html>