<?php
require_once('dbconnection.php');

echo "<h4>Latest Movies</h4>";
$sql_1="select * from movies order by Release_date desc limit 4";
$result_1=mysqli_query($conn,$sql_1);
while($row_1=mysqli_fetch_assoc($result_1)){
	$id_1=$row_1['movie_ID'];
	$url_1=$row_1['url'];
	$thumbnail_1=$row_1['thumbnail'];
	$title_1=pathinfo($row_1['movie_name'],PATHINFO_FILENAME);
	echo "
	<div class='movie_display'>
	<a href='moviewatch.php?id=$id_1'><img src='$thumbnail_1' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
	<div class='movie_title'>
	<p><a href='moviewatch.php?id=$id_1' style='color:;'>$title_1</a></p><br><br>
	</div>
	</div>
	";
}

echo "<h4>Most viewed Movies</h4>";
$sql="select * from movies order by rand() limit 12";
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