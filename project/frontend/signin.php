<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Viking movies">
<meta charset="UTF-8">
<title>sign in</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="frontstyle.css">
<style>

</style>
</head>
<body class="">
<br>

<div id="sign">
	<p id="signbackground"><a href="index.php"><b>XFLIX</b></a></p>
<h4>Sign In</h4>
<br>

<?php if(@$_GET['userexisterr']==true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['userexisterr'];?> </div>
<?php } ?>

<?php if(@$_GET['signinerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['signinerr'];?> </div>
<?php } ?>

<?php if(@$_GET['emptyerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['emptyerr'];?> </div>
<?php } ?>

<br>
<Form action="signinprocess.php" method="POST">
<label>Username : </label> <input type="text" name="username"><br><br>
<label>Password : </label> <input type="password" name="password"><br><br>
<input type="submit" value="Sign In" name="signin"><br><br>
<p>Forgot Password?<a href="passwordrecover.php">Get a new password.</a></p>
<p>New User?<a href="signup.php">Sign Up.</a></p><br><br>
</Form>
</div>
</body>
</html>