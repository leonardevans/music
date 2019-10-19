<?php
require_once('dbconnection.php');
if(isset($_POST['delete'])){
		function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if(empty($_POST['comment_id'])){
		header("location:admcomments.php?delete_empty= Please enter Comment ID to delete. ");
	}else{
		$id=test_input($_POST['comment_id']);
		//check is the customer select exixts
		$select="select * from comments where comments_id='$id'";
		$selectresult=mysqli_query($conn,$select);
		if(mysqli_num_rows($selectresult)>0){
			$delete="delete from comments where comments_id='$id' ";
			
			if(mysqli_query($conn,$delete)){
				header("location:admcomments.php?delete_true= Comment whose ID = $id deleted successfully ");
			}
			else{
				header("location:admcomments.php?delete_err= Failed to delete Comment whose ID = $id ");
			}
		}
		else{
			header("location:admcomments.php?select_err= No such Comment whose ID = $id ");
		}
		
	}
}
?>