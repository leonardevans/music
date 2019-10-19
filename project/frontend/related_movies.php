<?php
require_once('dbconnection.php');
$sql="select * from movies order by rand() limit 6";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$id=$row['movie_ID'];
	$url=$row['url'];
	$thumbnail=$row['thumbnail'];
	$title=$row['movie_name'];
	echo "
	<div class='related'>
	<div class='movie_title'>
	<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br>
	</div>
	<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='90%' height='200'></a><br><br>
	</div>
	";
}
?>