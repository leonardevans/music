<?php
require_once('dbconnection.php');

$select="select * from movies";
$result=mysqli_query($conn,$select) or die("Error accessing your profile. ".mysqli_error($conn));
if(mysqli_num_rows($result)>0){
	echo "<table align='center' class='pure-table-striped'><caption><b> Movies </b></caption><tr><th>ID</th><th> Movie Name</th><th> URL</th><th> Genre</th>
	<th> Actors</th><th>  Release date </th></tr>";
	while($row=mysqli_fetch_assoc($result) ){
		echo "<tr><td>".$row['movie_ID']."</td><td><input type='text' name='userid' value='".$row['movie_name']."'></td><td><input type='text' name='userid' value='".$row['url']."'></td><td><input type='text' name='userid' value='".$row['genre']."'></td><td><input type='text' name='userid' value='".$row['actors']."'></td><td><input type='text' name='userid' value='".$row['Release_date']."'></td></tr>";
	}
	echo "<tr><td><input type='submit' name='update' value='Save changes'></td></tr>";
	echo "</table>";
}
else{
	echo "No movies  available";
}
?>