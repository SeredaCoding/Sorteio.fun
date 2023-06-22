<?php
	
	session_start();

	/*echo '<pre>';
	print_r($_POST);
	echo '</pre>';*/

	if($_POST['entre1'] > $_POST['entre2'] || $_POST['quantidade'] > $_POST['entre2']){
		header('location: index.php?sorteio=erro2');
		exit;
	}


	$numeros = [];

	$quantidade = $_POST['quantidade'] - 1;

	$quantidade = intval($quantidade);

	$_SESSION['quantidade'] = $_POST['quantidade'];

	$entre1 = $_POST['entre1'];

	$entre2 = $_POST['entre2'];

	$entre1 = intval($entre1);

	$entre2 = intval($entre2);

	$_SESSION['entre1'] = $_POST['entre1'];

	$_SESSION['entre2'] = $_POST['entre2'];

	while(count($numeros) <= $quantidade){
		$num = rand($entre1, $entre2);

		if(!in_array($num, $numeros)){
			$numeros[] = $num;
		}
	}

	$_SESSION['numeros'] = $numeros;

	$sorteio = false;

	if(isset($numeros)){
		$sorteio = true;
		$_SESSION['sorteio'] = $sorteio;
		header('Location: index.php?sorteio=sucesso');
	}else{
		header('Location: index.php?sorteio=erro');
	}
	
	
?>