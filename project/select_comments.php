<?php
require_once('dbconnection.php');

$select="select * from comments";
$result=mysqli_query($conn,$select) or die("Error accessing comments. ".mysqli_error($conn));
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
?>