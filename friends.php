<?php
	session_start();
	include 'includes/config.php';
	include 'header.php';
	include 'includes/sidebar.php';
?>

<div class='container'>
	<div class='sd'></div>
	<div class='col-md-3'></div>
	<div class='col-md-6 friends'>
	<?php
		$sql = "SELECT friends from connections WHERE username = '".$_SESSION['username']."';";
		$query = mysqli_query($connection,$sql);
		if($query){
			$ids = mysqli_fetch_array($query)['friends'];
			$sql = "SELECT username FROM users WHERE user_no IN ($ids);";
			$query = mysqli_query($connection, $sql);
			if($query){
				while($result = mysqli_fetch_array($query)){
					echo $result['username'];
				}
			}
		}else{
			echo "you don't have any friends";
		}
	?>
	</div>
	<div class='col-md-3'></div>
</div>

<?php
	include 'footer.php';
?>