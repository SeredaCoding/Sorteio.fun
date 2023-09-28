<?php
	session_start();
	$resetar = session_destroy();
	if($resetar){
		header('location: index.php');
	}
?>