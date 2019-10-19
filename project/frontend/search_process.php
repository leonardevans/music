<?php
require_once('dbconnection.php');
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
					<div id='search_display'>
					<div style='width:400px;'>
					<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
					</div>
					<div class='search_title' style='text-align:left;'>
					<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br><br>
					</div>
					</div>
					";
			}
		}
		else{
			echo "<div id='empty_search' style='background-color:mintcream;'><p>No results found</p></div>";
		}
	}
	elseif(!empty($genre) && empty($title)){
		$sql="select * from movies where genre like '%$genre%'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
			$id=$row['movie_ID'];
				$url=$row['url'];
				$thumbnail=$row['thumbnail'];
				$title=pathinfo($row['movie_name'],PATHINFO_FILENAME);
				echo "
					<div id='search_display'>
					<div style='width:400px;'>
					<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
					</div>
					<div class='search_title'style='text-align:left;'>
					<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br><br>
					</div>
					</div>
					";
				}

		}
		else{
			echo "<div id='empty_search' style='background-color:mintcream;'><p>No results found</p></div>";
		}
	}
	elseif(empty($genre) && empty($title)){
		header("location:index.php");
	}
	elseif(!empty($genre) && !empty($title)){
		$sql="select * from movies where genre like '%$genre%' and movie_name like '%$title%'";
		$result=mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_assoc($result)){
			$id=$row['movie_ID'];
				$url=$row['url'];
				$thumbnail=$row['thumbnail'];
				$title=pathinfo($row['movie_name'],PATHINFO_FILENAME);
				echo "
					<div id='search_display'>
					<div style='width:400px;'>
					<a href='moviewatch.php?id=$id'><img src='$thumbnail' alt='' width='96%' style='margin-top:1px;' height='200'></a><br>
					</div>
					<div class='search_title' style='text-align:left;'>
					<p><a href='moviewatch.php?id=$id' style='color:;'>$title</a></p><br><br>
					</div>
					</div>
					";
				}

		}
		else{
			echo "<div id='empty_search' style='background-color:mintcream;'><p>No results found</p></div>";
		}
	}
	else{
		echo "Error";
	}

?>