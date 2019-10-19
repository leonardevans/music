<?php
	//connect to database
	$conn=mysqli_connect('localhost','root','','xflix');
	
	if(!$conn){
		$connerror=die("Error while signing in.");
	}
?>