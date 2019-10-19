<?php
require_once('dbconnection.php');
if(isset($_POST['delete'])){
		function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if(empty($_POST['movie_id'])){
		header("location:movies.php?delete_empty= Please enter movie ID to delete. ");
	}else{
		$id=test_input($_POST['movie_id']);
		//check is the customer select exixts
		$select="select * from movies where movie_ID='$id'";
		$selectresult=mysqli_query($conn,$select);
		if(mysqli_num_rows($selectresult)>0){
			$delete="delete from movies where movie_ID='$id' ";
			
			if(mysqli_query($conn,$delete)){
				header("location:movies.php?delete_true= Movie whose ID = $id deleted successfully ");
			}
			else{
				header("location:movies.php?delete_err= Failed to delete Movie whose ID = $id ");
			}
		}
		else{
			header("location:movies.php?select_err= No such Movie whose ID = $id ");
		}
		
	}
}
?>