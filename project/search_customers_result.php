<?php
require_once('dbconnection.php');
if(isset($_POST['submit'])){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$search=test_input($_POST['search']);
	if(empty($search)){
		$select="select * from customers";
		$result=mysqli_query($conn,$select) or die("Error accessing your profile. ".mysqli_error($conn));
		if(mysqli_num_rows($result)>0){
		echo "<table align='center'><caption><b> Customers </b></caption><tr><th>ID</th><th> First Name</th><th> Last Name</th><th> User Name</th>
		<th> Gender</th><th> Email </th></tr>";
		while($row=mysqli_fetch_assoc($result) ){
			echo "<tr><td>".$row['customerID']."</td><td><input type='text' name='firstname[".$row['customerID']."]' value='".$row['firstname']."'></td><td><input type='text' name='lastname[".$row['customerID']."]' value='".$row['lastname']."'></td><td><input type='text' name='username[".$row['customerID']."' value='".$row['username']."'></td><td><input type='text' name='gender[".$row['customerID']."' value='".$row['gender']."'></td><td><input type='text' name='email[".$row['customerID']."' value='".$row['email']."'></td></tr>";
		}
		echo "<input type='hidden' name='customerID[]' value='".$row['customerID']."' >";
		echo "<tr><td><input type='submit' name='update' value='Save changes'></td></tr>";
		echo "</table>";
		}
		else{
			echo "No customers available";
		}


	}
	elseif(!empty($search)){
		$select="select * from customers where customerID like '%$search%' or firstname like '%$search%' or lastname like '%$search%' or username like '%$search%' order by firstname";
		$result=mysqli_query($conn,$select);
		if(mysqli_num_rows($result)>0){
			echo "<table align='center'><caption><b> Customers </b></caption><tr><th>ID</th><th> First Name</th><th> Last Name</th><th> User Name</th>
			<th> Gender</th><th> Email </th></tr>";
			while($row=mysqli_fetch_assoc($result) ){
			echo "<tr><td>".$row['customerID']."</td><td><input type='text' name='firstname[".$row['customerID']."]' value='".$row['firstname']."'></td><td><input type='text' name='lastname[".$row['customerID']."]' value='".$row['lastname']."'></td><td><input type='text' name='username[".$row['customerID']."' value='".$row['username']."'></td><td><input type='text' name='gender[".$row['customerID']."' value='".$row['gender']."'></td><td><input type='text' name='email[".$row['customerID']."' value='".$row['email']."'></td></tr>";
		}
		echo "<input type='hidden' name='customerID[]' value='".$row['customerID']."' >";
		echo "<tr><td><input type='submit' name='update' value='Save changes'></td></tr>";
		echo "</table>";

		}
		else{
			echo "No results found";
		}


	}
	else{
		echo "Error!";
	}

}
?>