<?php
	
	session_start();

	print_r($_POST);


	if($_POST['entre1'] > $_POST['entre2'] || $_POST['quantidade'] > $_POST['entre2']){
		header('location: index.php?sorteio=erro2');
		exit;
	}

	if($_POST['entre2'] >= 10000){
		header('location: index.php?sorteio=erro3');
		exit;
	}

	/*
	ordens:
	1 = crescente
	2 = descrescente
	3 = aleatório
	*/

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
	$_SESSION['ordem_value'] = 1;

	//ordem de exposição.
	$_SESSION['ordem'] = 0;

	if($_POST['ordem'] == 1){
		$_SESSION['ordem'] = asort($_SESSION['numeros']);
		$_SESSION['ordem_value'] = 1;
	}else if ($_POST['ordem'] == 2) {
		$_SESSION['ordem'] = rsort($_SESSION['numeros']);
		$_SESSION['ordem_value'] = 2;

	}else if($_POST['ordem'] == 3){
		$_SESSION['ordem_value'] = 3;
	}else{
		$_SESSION['ordem'] = asort($_SESSION['numeros']);
	};

	$_SESSION['class_num'] = $_POST['class_num'];


	$sorteio = false;

	if(isset($numeros)){
		$sorteio = true;
		$_SESSION['sorteio'] = $sorteio;
		header('Location: index.php?sorteio=sucesso');
	}else{
		header('Location: index.php?sorteio=erro');
	}
	
	
?>