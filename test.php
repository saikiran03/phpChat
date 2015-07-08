<?php
	session_start();
	$string = 'saikiRa';
	$string1 = 'saikira';
	echo strcmp($string1,$string);
	$_SESSION['fid'] = '';
	echo $_SESSION['fid'];
?>
