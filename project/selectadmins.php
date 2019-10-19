<?php
require_once('dbconnection.php');

$select="select * from admin";
$result=mysqli_query($conn,$select) or die("Error accessing your profile. ".mysqli_error($conn));
if(mysqli_num_rows($result)>0){
	echo "<table align='center'><caption><b> Admins </b></caption><tr><th>ID</th><th> First Name</th><th> Last Name</th><th> User Name</th>
	<th> Gender</th><th> Email </th></tr>";
	while($row=mysqli_fetch_assoc($result) ){
		echo "<tr><td>".$row['adminID']."</td><td><input type='text' name='firstname' value='".$row['firstname']."'></td><td><input type='text' name='lastname' value='".$row['lastname']."'></td><td><input type='text' name='username' value='".$row['username']."'></td><td><input type='text' name='gender' value='".$row['gender']."'></td><td><input type='text' name='email' value='".$row['email']."'></td></tr>";
	}
	echo "<tr><td><input type='submit' name='update' value='Save changes'></td></tr>";
	echo "</table>";
}
else{
	echo "No admins available";
}
?>