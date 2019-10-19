<?php
require_once('dbconnection.php');
if(isset($_POST['search'])){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$search=test_input($_POST['comment']);
	if(empty($search)){
		$select="select * from comments";
		$result=mysqli_query($conn,$select);
		if(mysqli_num_rows($result)>0){
		echo "<table align='center'><caption><b> Comments </b></caption>
		<tr><th>Comment ID</th><th> Movie ID</th><th> Username </th><th> Comment</th>
		<th> Time</th></tr>";
		while($row=mysqli_fetch_assoc($result) ){
		echo "<tr><td>".$row['comments_id']."</td><td>".$row['movie_ID']."</td><td>".$row['username']."</td><td>".$row['comment']."</td><td>".$row['Time']."</td></tr>";
		}
		echo "</table>";
		}
		else{
		echo "No Comments  available";
		}


	}
	elseif(!empty($search)){
		$select="select * from comments where comments_id like '%$search%' or movie_ID like '%$search%' or username like '%$search%' or comment like '%$search%' order by comments_id";
		$result=mysqli_query($conn,$select);
		if(mysqli_num_rows($result)>0){
		echo "<table align='center'><caption><b> Comments </b></caption>
		<tr><th>Comment ID</th><th> Movie ID</th><th> Username </th><th> Comment</th>
		<th> Time</th></tr>";
		while($row=mysqli_fetch_assoc($result) ){
		echo "<tr><td>".$row['comments_id']."</td><td>".$row['movie_ID']."</td><td>".$row['username']."</td><td>".$row['comment']."</td><td>".$row['Time']."</td></tr>";
		}
		echo "</table>";
		}
		else{
		echo "No Comments  available";
		}


	}
	else{
		echo "Error!";
	}

}
?>