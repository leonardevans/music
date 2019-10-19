<?php
require_once('dbconnection.php');
if(isset($_POST['addmovie']) ){
	function test_input($data){ //prevent mysql injection
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	if(isset($_POST['addmovie'])){
		if(empty($_FILES['movie']['name'])){
			header("location:movies.php?movieerr= Please select a movie ");
		}
		elseif(empty($_FILES['thumbnail']['name'])){
			header("location:movies.php?thumbnailerr= Please select thumbnail  of the movie ");
		}
		elseif(empty($_POST['genre'])){
			header("location:movies.php?genreerr= Please enter genre of the movie ");
		}
		elseif(empty($_POST['date'])){
			header("location:movies.php?dateerr= Please enter date of release ");
		}
		elseif(empty($_POST['actors'])){
			header("location:movies.php?actorserr= Please enter the actors ");
		}
		else{
			$moviename=test_input($_FILES['movie']['name']);
			$movietmp=$_FILES['movie']['tmp_name'];
			$thumbnailname=test_input($_FILES['thumbnail']['name']);
			$thumbnailtmp=$_FILES['thumbnail']['tmp_name'];
			$genre=test_input($_POST['genre']);
			$date=test_input($_POST['date']);
			$actors=test_input($_POST['actors']);
			$thumbnail_content=file_get_contents($_FILES['thumbnail']['tmp_name']);
			move_uploaded_file($movietmp, "frontend/uploaded_videos/".$moviename);
			move_uploaded_file($thumbnailtmp, "frontend/uploaded_thumbnails/".$thumbnailname);
			$url="http://127.0.0.1/project/frontend/uploaded_videos/$moviename";
			$thumbnailurl="http://127.0.0.1/project/frontend/uploaded_thumbnails/$thumbnailname";
			$sql="INSERT INTO movies (movie_name,url,thumbnail,genre,actors,Release_date) VALUES ('$moviename','$url','$thumbnailurl','$genre','$actors','$date')";
			if(mysqli_query($conn,$sql )){
				header("location:movies.php?addsuccess= Movie added successfully.");
			}
			else{
				die(mysqli_error($conn));
			}
		}
	}
}
?>