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
			echo "<table align='center'><caption><b> Movies </b></caption><tr><th>ID</th><th> Movie Name</th><th> URL</th><th> Genre</th>
			<th> Actors</th><th>  Release date </th></tr>";
			while($row=mysqli_fetch_assoc($result) ){
				echo "<tr><td>".$row['movie_ID']."</td><td><input type='text' name='userid' value='".$row['movie_name']."'></td><td><input type='text' name='userid' value='".$row['url']."'></td><td><input type='text' name='userid' value='".$row['genre']."'></td><td><input type='text' name='userid' value='".$row['actors']."'></td><td><input type='text' name='userid' value='".$row['Release_date']."'></td></tr>";
			}
			echo "<tr><td><input type='submit' name='update' value='Save changes'></td></tr>";
			echo "</table>";
			}
			else{
			echo "No results found";
			}
	}
	elseif(!empty($genre) && empty($title)){
		$sql="select * from movies where genre like '%$genre%'";
		$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
				echo "<table align='center'><caption><b> Movies </b></caption><tr><th>ID</th><th> Movie Name</th><th> URL</th><th> Genre</th>
				<th> Actors</th><th>  Release date </th></tr>";
					while($row=mysqli_fetch_assoc($result) ){
						echo "<tr><td>".$row['movie_ID']."</td><td><input type='text' name='userid' value='".$row['movie_name']."'></td><td><input type='text' name='userid' value='".$row['url']."'></td><td><input type='text' name='userid' value='".$row['genre']."'></td><td><input type='text' name='userid' value='".$row['actors']."'></td><td><input type='text' name='userid' value='".$row['Release_date']."'></td></tr>";
					}
					echo "<tr><td><input type='submit' name='update' value='Save changes'></td></tr>";
					echo "</table>";
				}
				else{
				echo "No results found.";
				}

		
	}
	elseif(empty($genre) && empty($title)){
		header("location:movies.php");
	}
	elseif(!empty($genre) && !empty($title)){
		$sql="select * from movies where genre like '%$genre%' and movie_name like '%$title%'";
		$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
			echo "<table align='center'><caption><b> Movies </b></caption><tr><th>ID</th><th> Movie Name</th><th> URL</th><th> Genre</th>
			<th> Actors</th><th>  Release date </th></tr>";
			while($row=mysqli_fetch_assoc($result) ){
				echo "<tr><td>".$row['movie_ID']."</td><td><input type='text' name='userid' value='".$row['movie_name']."'></td><td><input type='text' name='userid' value='".$row['url']."'></td><td><input type='text' name='userid' value='".$row['genre']."'></td><td><input type='text' name='userid' value='".$row['actors']."'></td><td><input type='text' name='userid' value='".$row['Release_date']."'></td></tr>";
			}
				echo "<tr><td><input type='submit' name='update' value='Save changes'></td></tr>";
				echo "</table>";
			}
			else{
				echo "No results found";
			}

		
	}
	else{
		echo "Error";
	}

?>