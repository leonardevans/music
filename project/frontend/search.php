<?php
require_once('dbconnection.php');
if(isset($_POST['search'])){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	$genre=test_input($_POST['genre']);
	$title=test_input($_POST['title']);
	if(empty($genre) && !empty($title)){
		$sql="select * from movies where movie_name like '%$title%'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
				$id=$row['movie_ID'];
				$url=$row['url'];
				$thumbnail=$row['thumbnail'];
				$title=pathinfo($row['movie_name'],PATHINFO_FILENAME);
				echo "
					<div class='search_display'>
					<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
					<div class='search_title'>
					<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br><br>
					</div>
					</div>
					";
			}
		}
		else{
			echo "No Movies found";
		}
	}
	elseif(!empty($genre) && empty($title)){
		$sql="select * from movies where genre like '%$genre%'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$id=$row['movie_ID'];
				$url=$row['url'];
				$thumbnail=$row['thumbnail'];
				$title=pathinfo($row['movie_name'],PATHINFO_FILENAME);
				echo "
					<div class='search_display'>
					<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
					<div class='search_title'>
					<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br><br>
					</div>
					</div>
					";

		}
		else{
			echo "<div id='empty_search'><p>No Movies found</p></div>";
		}
	}
	elseif(empty($genre) && empty($title)){
		header("location:index.php");
	}
	elseif(!empty($genre) && !empty($title)){
		$sql="select * from movies where genre like '%$genre%' and movie_name like '%$title%'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			$id=$row['movie_ID'];
				$url=$row['url'];
				$thumbnail=$row['thumbnail'];
				$title=pathinfo($row['movie_name'],PATHINFO_FILENAME);
				echo "
					<div class='search_display'>
					<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
					<div class='search_title'>
					<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br><br>
					</div>
					</div>
					";

		}
		else{
			echo "No Movies found";
		}
	}
	else{
		echo "Error";
	}
}
?>