<?php
require_once('dbconnection.php');
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="select * from comments where movie_ID=$id order by Time desc";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)<1){
		echo "No comments for this movie.";
	}
	while($row=mysqli_fetch_assoc($result)){
		$user=$row['username'];
		$comment=$row['comment'];
		$time=$row['Time'];
		echo"
		<center>
		<p style='border:0.5px solid black;border-radius:5px;width:96%;'><b>@$user </b>$comment<br>$time</p>
		</center>
		";
	}
}

?>