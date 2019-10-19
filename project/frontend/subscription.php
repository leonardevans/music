<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="description" content="Viking movies">
<meta charset="UTF-8">
<title>my subscription</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
<link rel="stylesheet" href="frontstyle.css">
<style>

</style>
</head>
<body class="">
<div id="holder">

<header>
<br>
<p id="background"><a href="index.php"><b>Viking</b> <br>Movies</a></p>
<div class="search">
<form>
<input type="search" name="search" placeholder="search">
<button><i class="fa fa-arrow-right"></i></button>
</form>
</div>

	<?php if(isset($_SESSION['User'])){ ?>
			<div class="signdropdown">
			<button value=""><i class="fa fa-user"></i><?php echo $_SESSION['User'];?></button>
			<div class="signdcontent">
			<a href="profile.php">My profile</a><br>
			<a href="subscription.php">My subscription</a><br>
			<?php echo '<a href="logout.php?logout">Logout</a>'; ?>
			</div>
			</div>
			
	<?php } else{
				header("location:signin.php");
			}
	?>

<nav>
</br>
<a href="index.php"><i class="fas fa-home">Home</i></a>
<div class="dropdown">Genre<i class="fas fa-caret-down"></i>
<div class="dropdown_content">
	
<a href="">Action</a><br>
<a href="">Horror</a><br>
<a href="">History</a><br>
<a href="">Drama</a><br>
<a href="">Thriller</a><br>
<a href=""></a><br>
<a href=""></a><br>
</div>
</div>
<a href="">Most Viewed</a>
<a href="">latest</a>
</br>
</br>
</nav>
<hr>
</header>

<footer style="clear:both;">
</br>
<div id="links">
<a href="about.php">About</a>
<a href="contact.php">Contact</a>
<a href="help.php">Help</a>
<a href="faqs.php">FAQS</a>
</div>
</br>
<div class="follow">
<a href=""><i class="fab fa-facebook"></i></a>
<a href=""> <i class="fab fa-twitter"></i></a>
</div>
<div id="copy">
<p>&copy Viking Movies <?php echo date("Y");?>.</p>
</div>
</br>
</footer>
</div>
</body>
</html>