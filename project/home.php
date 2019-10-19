<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>home</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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
<input type="search" name="search" value="search">
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
<div id="add">
	<?php require 'addcusterrors.php';?>
	<form action="addcust.php" method="post">
		<table align='center'>
			<th>Add a customer</th>
			<tr><td>First Name</td><td>Last Name</td><td>User Name</td> <td>Gender</td> <td>Email</td> <td>Password</td></tr>
			<tr><td><input type="text" name="firstname"></td><td><input type="text" name="lastname"></td><td><input type="text" name="username"></td> <td><input type="text" name="gender"></td> <td><input type="text" name="email"></td> <td><input type="password" name="password"></td>
			<td><input type="submit" name="addcust" value="Add Customer"></td></tr>
		</table>
	</form>
	<br>
</div>

<hr>
<div id="add">
<?php require 'addadminerrors.php'?>

	<form action="adminadd.php" method="post">
		<table align='center'>
			<th>Add an Admin</th>
			<tr><td>First Name</td><td>Last Name</td><td>User Name</td> <td>Gender</td> <td>Email</td> <td>Password</td></tr>
			<tr><td><input type="text" name="firstname"></td><td><input type="text" name="lastname"></td><td><input type="text" name="username"></td> <td><input type="text" name="gender"></td> <td><input type="text" name="email"></td> <td><input type="password" name="password"></td>
			<td><input type="submit" name="addadmin" value="Add Admin"></td></tr>
		</table>
	</form>
	<br>
</div>

<?php
?>
<footer>
</footer>
</body>
</html>