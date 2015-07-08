<?php
	session_start();
	include 'includes/config.php';
	include 'header.php';
	include 'includes/sidebar.php';
?>

<div class='container'>
	<div class='sd'></div>
	<div class='col-md-3'></div>
	<div class='col-md-6 white'>
		<?php
			$userno = '';
			$arr = [$_SESSION['uno'],$_SESSION['fid'],$_SESSION['requests'],$_SESSION['sent_req']];
			foreach($arr as $a){
				$userno .= $a;
				if(substr($userno,-1) != ','){
					$userno .= ',';
				}
			}
			$userno = trim($userno,',');
			$sql = "SELECT username, user_no from users WHERE user_no NOT IN ($userno);";
			echo $sql;
			$query = mysqli_query($connection,$sql);
			if($query){
				while($result = mysqli_fetch_array($query)){
					?>
					<div class='friend'>
						<h4><?php echo $result['username']; ?></h4>
						<button class='btn btn-sm btn-default' onclick='sendreq("<?php echo $result["username"]; ?>")'>Send Request</button>
					</div>
					<?php
				}
			}

		?>
	</div>
	<div class='col-md-3'></div>
</div>


<script>
	
</script>
<?php
	include 'footer.php';
?>