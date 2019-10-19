<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Viking movies">
<meta charset="UTF-8">
<title>sign in</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>home</title>
<link rel="stylesheet" href="backstyle.css">
<style>

</style>
</head>
<body class="">
<br>

<div id="sign">
	<p id="signbackground"><br><a href="home.php"><b>XFLIX</a></p>
<h4>Sign In</h4>
<br>

<?php if(@$_GET['usernameerr']==true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['usernameerr'];?> </div>
<?php } ?>

<?php if(@$_GET['userexisterr']==true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['userexisterr'];?> </div>
<?php } ?>

<?php if(@$_GET['passworderr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['passworderr'];?> </div>
<?php } ?>

<?php if(@$_GET['signinerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['signinerr'];?> </div>
<?php } ?>

<?php if(@$_GET['emptyerr'] == true) { ?>
<div class="alert-light text-danger text-center" style="color:red;"> <?php echo $_GET['emptyerr'];?> </div>
<?php } ?>

<br>
<Form action="admsigninprocess.php" method="POST">
<label>Username : </label> <input type="text" name="username"><br><br>
<label>Password : </label> <input type="password" name="password"><br><br>
<input type="submit" value="Sign In" name="signin"><br><br>
<p>Forgot Password?<a href="passwordrecover.php">Get a new password.</a></p>
</Form>
</div>
</body>
</html>