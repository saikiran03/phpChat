<?php
	function formdata($data){
		$data = mysql_real_escape_string($data);
		$data = trim($data);
		$data = htmlspecialchars($data);
		return $data;
	}

?>