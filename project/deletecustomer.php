<?php
require_once('dbconnection.php');
if(isset($_POST['delete'])){
		function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if(empty($_POST['customerid'])){
		header("location:customers.php?delete_empty= Please enter customer ID to delete. ");
	}else{
		$id=test_input($_POST['customerid']);
		//check is the customer select exixts
		$select="select * from customers where customerID='$id'";
		$selectresult=mysqli_query($conn,$select);
		if(mysqli_num_rows($selectresult)>0){
			$delete="delete from customers where customerID='$id' ";
			
			if(mysqli_query($conn,$delete)){
				header("location:customers.php?delete_true= Customer whose ID = $id deleted successfully ");
			}
			else{
				header("location:customers.php?delete_err= Failed to delete Customer whose ID = $id ");
			}
		}
		else{
			header("location:customers.php?select_err= No such Customer whose ID = $id ");
		}
		
	}
}
?>