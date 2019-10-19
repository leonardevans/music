<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>home</title>
<link rel="stylesheet" href="backstyle.css">
<style>

</style>
</head>
<body>
<header >
<br>
<p id="background"><a href="home.php"><b>XFLIX</b></a></p>
<div class="search">
<form>
<input type="search" name="search" placeholder="search">
<input type="submit" value="Go">
</form>
</div>
<div class="signin">

	<?php if(isset($_SESSION['Admin'])){ ?>
			<div class="signdropdown">
			<button value=""><i class="fa fa-user"></i><?php echo $_SESSION['Admin'];?></button>
			<div class="signdcontent">
			<a href="">My profile</a><br>
			<?php echo '<a href="logout.php?logout">Logout</a>'; ?>
			</div>
			</div>
			
	<?php } else{
				header("location:admsignin.php");
			}
	?>

</div>
<nav>
<br>
<a href="home.php">Home</a>
<a href="movies.php">Movies</a>
<a href="admcomments.php">Comments</a>
<a href="customers.php">Customers</a>
<a href="admins.php">Admins</a>
<a href="frontend\index.php">Front End</a>
<br>
<br>
</nav>
</header>
<hr>
<div id="admins">
	<div style="background-color: mintcream;">
		<p><b>Delete Admin</b></p>
		<?php if(@$_GET['delete_empty']==true) { ?>
		<div style="color:red;"> <?php echo $_GET['delete_empty'];?> </div>
		<?php } ?>
		<?php if(@$_GET['delete_true']==true) { ?>
		<div style="color:green;"> <?php echo $_GET['delete_true'];?> </div>
		<?php } ?>
		<?php if(@$_GET['select_err']==true) { ?>
		<div style="color:red;"> <?php echo $_GET['select_err'];?> </div>
		<?php } ?>
		<?php if(@$_GET['delete_err']==true) { ?>
		<div style="color:red;"> <?php echo $_GET['delete_err'];?> </div>
		<?php } ?>
		<form action="deleteadmin.php" method="post">
			<table align='center'>
				<tr><td>Admin ID </td><td><input type="text" name="adminid"></td><td><input type="submit" value="Delete Admin" name="delete"></td></tr>
			</table>
		</form>
	</div>
<hr>
	<div id="add">
		<p><b>Add an admin</b></p>
	<?php require 'addadminerrors.php'?>
		<form action="adminadd_ap.php" method="post">
			<table align='center'>
				<tr><td>First Name</td><td>Last Name</td><td>User Name</td> <td>Gender</td> <td>Email</td> <td>Password</td></tr>
				<tr><td><input type="text" name="firstname"></td><td><input type="text" name="lastname"></td><td><input type="text" name="username"></td> <td><input type="text" name="gender"></td> <td><input type="text" name="email"></td> <td><input type="password" name="password"></td>
				<td><input type="submit" name="addadmin" value="Add Admin"></td></tr>
			</table>
		</form>
		<br>
	</div>
<hr>

	<div style="background-color: mintcream;">
		<form>
			<?php require 'selectadmins.php'; ?>
		</form>
	</div>

</div>
<footer>
</footer>
</body>
</html>