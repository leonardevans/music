<?php
session_start();
require_once('dbconnection.php');
if(isset($_SESSION['User'])){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$user=$_SESSION['User'];
	$id=test_input($_POST['movieid']);
	$comment=test_input($_POST['comment']);
	if(empty($_POST['comment'])){
		header("location:moviewatch.php?id=$id&error=Comment is empty!");
	}
	else{
		$sql="insert into comments(movie_ID,username,comment) values('$id','$user','$comment')";
		if(mysqli_query($conn,$sql)){
			header("location:moviewatch.php?id=$id&success=Comment added");
		}
		else{
			echo "error adding comment".mysqli_error($conn);
		}
	}

}
else{
	header("location:signin.php");
}
?>
