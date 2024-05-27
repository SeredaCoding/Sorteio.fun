<?php
	session_start();

	$resetar = session_destroy();

	if($resetar){
			header('location: nomes?resetar=s');
		}else {
			header('location: nomes?resetar=n');
		};

	
?>