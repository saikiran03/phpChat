<?php
	session_start();
	include 'config.php';
	if(isset($_POST['to_user'])){
		$sql1 = "SELECT sent_req FROM connections WHERE username = '".$_SESSION['username']."';";
		$sql2 = "SELECT requests FROM connections WHERE username = '".$_POST['to_user']."';";
		$sql3 = "SELECT user_no  FROM users WHERE username = '".$_POST['to_user']."';";
		$recreq = '';
		$sentreq = mysqli_fetch_array(mysqli_query($connection,$sql1))['sent_req'].",";
		$sentreq .= mysqli_fetch_array(mysqli_query($connection,$sql3))['user_no'];
		$sentreq = trim($sentreq,',');
		$recreq = mysqli_fetch_array(mysqli_query($connection,$sql2))['requests'].',';
		$recreq .= $_SESSION['uno'];
		$recreq = trim($recreq,',');
		$sql1 = "UPDATE connections SET sent_req = '$sentreq' WHERE username = '".$_SESSION['username']."';";
		$sql2 = "UPDATE connections SET requests = '$recreq' WHERE username = '".$_POST['to_user']."';";
		$query1 = mysqli_query($connection,$sql1);
		$query2 = mysqli_query($connection,$sql2);
		if($query1 && $query2){
			$_SESSION['sentreq'] = $sentreq;
			echo "Successfully added.";
		}else{
			echo "Failed to add.";
		}
	}

?>