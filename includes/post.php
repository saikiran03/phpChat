<?php
	require_once 'config.php';

	$sql = "SELECT * FROM posts;";
	$query = mysqli_query($connection,$sql);
	if($query){
		$validate = mysqli_num_rows($query);
		if($validate){
			while($result = mysqli_fetch_array($query)){
				echo "<div class='post'>";
				echo "<h4>".$result['username']."</h4>";
				echo "<p>".$result['content']."</p></div>";
			}
		}else{
			echo "failed to load posts";
		}
	}

?>