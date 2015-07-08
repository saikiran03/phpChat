<?php
	session_start();
	include 'includes/config.php';
	include 'header.php';
	include 'includes/sidebar.php';
?>

<div class='container'>
	<div class='sd'></div>
	<div class='col-md-6'>
		<h3>Received Requests</h3>
		<?php
			$sql = "SELECT requests FROM connections WHERE username = '".$_SESSION['username']."';";
			$ids = mysqli_fetch_array(mysqli_query($connection,$sql))['requests'];
			$sql = "SELECT username FROM users WHERE user_no IN ($ids);";
			$query = mysqli_query($connection,$sql);
			if($query){
			while($result = mysqli_fetch_array($query)){
				?>
				
				<div class='friend'>
					<h4><?php echo $result['username']; ?></h4>
					<button class='btn btn-primary' onclick='acceptreq("<?php echo $result['username']; ?>")'>Accept</button>
					<button class='btn btn-default' onclick='declinereq("<?php echo $result['username']; ?>")'>Decline</button>
				</div>

		<?php    }}else{
			echo "You have no requests.";
		}
		?>
	</div>
	<div class='col-md-6'>
		<h3>Sent Requests</h3>
		<?php
			$sql = "SELECT sent_req FROM connections WHERE username = '".$_SESSION['username']."';";
			$query = mysqli_query($connection,$sql);
			if($query){
				$ids = mysqli_fetch_array($query)['sent_req'];
				$sql = "SELECT username FROM users WHERE user_no IN ($ids);";
				$query = mysqli_query($connection,$sql);
				if($query){
					while($result = mysqli_fetch_array($query)){ ?>
						
						<div class='friend'>
							<h4><?php echo $result['username']; ?></h4>
						</div>

					<?php }
				}
			}
		?>
	</div>
</div>



<?php
	include 'footer.php';
?>