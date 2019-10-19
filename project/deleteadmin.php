<?php
require_once('dbconnection.php');
if(isset($_POST['delete'])){
		function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if(empty($_POST['adminid'])){
		header("location:admins.php?delete_empty= Please enter Admin ID to delete. ");
	}else{
		$id=test_input($_POST['adminid']);
		//check is the customer select exixts
		$select="select * from admin where adminID='$id'";
		$selectresult=mysqli_query($conn,$select);
		if(mysqli_num_rows($selectresult)>0){
			$delete="delete from admin where adminID='$id' ";
			
			if(mysqli_query($conn,$delete)){
				header("location:admins.php?delete_true= Admin whose ID = $id deleted successfully ");
			}
			else{
				header("location:admins.php?delete_err= Failed to delete Admin whose ID = $id ");
			}
		}
		else{
			header("location:admins.php?select_err= No such Admin whose ID = $id ");
		}
		
	}
}
?>