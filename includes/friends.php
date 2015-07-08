<?php
	session_start();
	require 'config.php';
	require 'functions.php';

	$_SESSION['friends'] = [];

	$sql = "SELECT friends from connections where username = '".$_SESSION['username']."';";
	$query = mysqli_query($connection,$sql);
	if($query){
		$result = mysqli_fetch_array($query);
		if($result['friends'] == ''){
			echo "You don't have any friends.";
		}else{
			if(strcmp($_SESSION['fid'],$result['friends']) == 0){
				if(!empty($_SESSION['friends'])){
					foreach($_SESSION['friends'] as  $a){
						echo $a;
					}
				}else{
					str_replace($_SESSION['fid'],'',$result['friends']);
					$result = split(',', $result['friends']);
					foreach($result as $a){
						$sql = "SELECT username FROM users where user_no = $a;";
						$query = mysqli_query($connection,$sql);
						if($query){
							$res = mysqli_fetch_array($query);
							array_push($_SESSION['friends'], $res['username']);
						}
					}
					foreach($_SESSION['friends'] as $a){
						echo $a;
					}
				}
			}else{
				foreach($_SESSION['friends'] as $a){
					echo $a;
				}
			}	
		}
	}
		
	
?>