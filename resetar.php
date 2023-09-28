<?php
	session_start();
	$resetar = session_destroy();

	if($resetar){
		header('location: index.php?resetar=s');
	}else{
		header('location: index.php?resetar=n');
	};
	
?>