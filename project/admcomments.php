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
<form action="admcomments.php" method="post">
	
	<input type="search" name="comment" placeholder="search">
	<button type="submit" name="search"><i class="fa fa-arrow-right"></i></button>
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
<div id="comments">
	<div style="background-color: mintcream;">
		<p><b>Delete Comment</b></p>
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
		<form action="delete_comment.php" method="post">
			<table align='center'>
				<tr><td>Comment ID </td><td><input type="text" name="comment_id"></td><td><input type="submit" value="Delete Comment" name="delete"></td></tr>
			</table>
		</form>
		<br>
	</div>
<hr>
<div id="comments" style="background-color: mintcream;">
<?PHP
	if(isset($_POST['search'])){
		require('search_comment.php');
	}
	else{
		require('select_comments.php');
	}
?>
		<br>
	</div>

</div>
</body>
</html>