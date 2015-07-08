<?php
	session_start();
	include 'config.php';
	if(isset($_POST['to_user'])){
		$sql1 = "SELECT user_no FROM users WHERE username = '".$_POST['to_user']."';";
		$sql2 = "SELECT requests FROM connections WHERE username = '".$_SESSION['username']."';";
		$sql3 = "SELECT sent_req FROM connections WHERE username = '".$_POST['to_user']."';";
		$id = mysqli_fetch_array(mysqli_query($connection,$sql1))['user_no'];
		$requests = mysqli_fetch_array(mysqli_query($connection,$sql2))['requests'];
		$sent_req = mysqli_fetch_array(mysqli_query($connection,$sql3))['sent_req'];
		$arr = split(',',$requests);
		$arr = array_diff($arr,[$id]);
		$requests = join(',',$arr);
		$arr = split(',',$sent_req);
		$arr = array_diff($arr,[$_SESSION['uno']]);
		$sent_req = join(',',$arr);
		$sql1 = "UPDATE connections SET sent_req = '$sent_req' WHERE username = '".$_POST['to_user']."';";
		$sql2 = "UPDATE connections SET requests = '$requests' WHERE username = '".$_SESSION['username']."';";
		$query = mysqli_multi_query($connection,$sql1.$sql2);
		if($_POST['task'] == 1){
			$a = '<br>';
			$friends = trim($_SESSION['fid'].','.$id,',');
			$sql = "UPDATE connections SET friends = '$friends' WHERE username = '".$_SESSION['username']."';";
			echo $sql.$a;
			$query = mysqli_query($connection,$sql);
			if($query){
				echo "query1 completed.<br>";
			}else{
				echo "query1 error.<br>";
			}
			//done with user 1.
			$sql = "SELECT friends FROM connections WHERE username = '".$_POST['to_user']."';";
			$query = mysqli_query($connection,$sql);
			if($query){
				$friends = mysqli_fetch_array($query)['friends'];
			}else{
				$friends = '';
			}
			$friends .= trim(','.$_SESSION['uno'],',');;
			$sql = "UPDATE connections SET friends = '$friends' WHERE username = '".$_POST['to_user']."';";
			echo $sql.$a;
			$query = mysqli_query($connection,$sql); 
			if($query){
				echo "query2 completed.<br>";
			}else{
				echo "query2 error.<br>";
			}
		}else{
			echo "SOME ERROR OCCURED";
		}
	}
?>