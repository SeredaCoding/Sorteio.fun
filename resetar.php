<?php
	session_start();

	$nomes = false;
	if (isset($_SESSION['nomes'])) {
		$nomes = true;

	}

	$loteria = false;
	if (isset($_SESSION['loteria'])) {
		$loteria = true;
	}

	$resetar = session_destroy();

	if($resetar){
		if($loteria == true){
			header('location: loteria?resetar=s');
		}else if($nomes == true){
			header('location: nomes?resetar=s');
		}
		else{
			header('location: index?resetar=s');
		}
	}else{
		header('location: index?resetar=n');
	};
	
?>