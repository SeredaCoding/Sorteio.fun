<?php
	session_start();
	$logoff = session_destroy();

	if($logoff){
		header('location: index.php?resetar=s');
	}else{
		header('location: index.php?resetar=n');
	};
	
?>