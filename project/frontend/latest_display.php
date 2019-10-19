<?php
require_once('dbconnection.php');
$sql="select * from movies order by Release_date DESC limit 16";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
	$id=$row['movie_ID'];
	$url=$row['url'];
	$thumbnail=$row['thumbnail'];
	$title=pathinfo($row['movie_name'],PATHINFO_FILENAME);
	echo "
	<div class='movie_display'>
	<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
	<div class='movie_title'>
	<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br><br>
	</div>
	</div>
	";
}
?>