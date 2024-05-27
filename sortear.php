<?php
	
	session_start();

	//print_r($_POST);


	if($_POST['entre1'] > $_POST['entre2'] || $_POST['quantidade'] > $_POST['entre2']){
		header('location: index?sorteio=erro2');
		exit;
	}
    if($_POST['quantidade'] >= 10000){
		header('location: index?sorteio=erro3');
		exit;
	}



	/*loteria -----------------------------------------
	
	loteria[1] = Mega Sena
	loteria[2] = Quina
	loteria[3] = Lotofácil

	*/
	function parametrosPost($quantidade, $entre1, $entre2){
		$_POST['quantidade'] = $quantidade;
		$_POST['entre1'] = $entre1;
		$_POST['entre2'] = $entre2;
	}

	if(isset($_POST['loteria'])){/* obs: ao selecionar a opção de números pares e impares os números 
	sorteados precisam ser <= (menor ou igual a) o máximo de números sorteados divididos por 2.
	 Se não, ocorrerá um looping infinito ($quantidade <= entre2 / 2 )*/
		$_SESSION['loteria'] = $_POST['loteria'];
		if($_POST['loteria'] == 1){
				parametrosPost(6, 1, 60);
				$_SESSION['nomeLoteria'] = 'Mega Sena';
				
		}
		if ($_POST['loteria'] == 2) {
				parametrosPost(5, 1, 80);
				$_SESSION['nomeLoteria'] = 'Quina';
				
		}
		if ($_POST['loteria'] == 3) {

				parametrosPost(15, 1, 25);
				$_SESSION['nomeLoteria'] = 'Lotofácil';
				
		}
		if ($_POST['loteria'] == 4) {
				if(isset($_POST['opcao'])){
					if(isset($_POST['loteria'])){
						header('location: loteria?sorteio=erro4');
						$resetar = session_destroy();
						exit;
					}else{
						header('location: index?sorteio=erro4');
						$resetar = session_destroy();
						exit;
					}
				}
				parametrosPost(50, 1, 100);
				$_SESSION['nomeLoteria'] = 'Lotomania';
				
		}
		if ($_POST['loteria'] == 5) {
				parametrosPost(6, 1, 50);
				$_SESSION['nomeLoteria'] = 'Dupla Sena';
				
		}
		if ($_POST['loteria'] == 6) {
				parametrosPost(7, 1, 50);
				$_SESSION['nomeLoteria'] = 'Super Sete';
				
		}
	}
	// fim loteria

	
	//print_r($_POST);
	
	//fim loteria ---------------------------

	/*
	ordens:
	1 = crescente
	2 = descrescente
	3 = aleatório
	*/

	$numeros = [];

	$quantidade = $_POST['quantidade'];
	
	$entre1 = $_POST['entre1'];

	$entre2 = $_POST['entre2'];

	$quantidade = intval($quantidade) - 1;

	$entre1 = intval($entre1);

	$entre2 = intval($entre2);

	$_SESSION['quantidade'] = $quantidade + 1;

	$_SESSION['entre1'] = $entre1;

	$_SESSION['entre2'] = $entre2;

	$_SESSION['opcao'] = $_POST['opcao'];


	/*echo $quantidade;
	echo '<br>';
	echo ($entre2 / 2);
	echo '<br>';
	echo $entre1;
	echo '<br>';
	echo count($numeros);*/
	//print_r($_POST);
	//print_r($_SESSION);
	//exit;




	while(count($numeros) <= $quantidade){
		$num = mt_rand($entre1, $entre2);

		/*condição de sortear números pares e ímpares de acordo com a seleção do usuário ---------*/

		if (isset($_POST['opcao'])) {

			if ($quantidade <= ($entre2 / 2)) { /* tratamento do erro de looping*/
				if ($_POST['opcao'] == 'impares') {
					if (!in_array($num, $numeros) && $num % 2 == 1) { 
					$numeros[] = $num;
					}
				}else if($_POST['opcao'] == 'pares'){
					if (!in_array($num, $numeros) && $num % 2 == 0) { 
						$numeros[] = $num;
					}
				}
			}else{
				if(isset($_POST['loteria'])){
					header('location: loteria?sorteio=erro4');
					$resetar = session_destroy();
					exit;
				}else{
					header('location: index?sorteio=erro4');
					$resetar = session_destroy();
					exit;
				}
			}
			
		/*Fim números pares e ímpares -----------------*/

		/* condição sorteio normal */

		}else if(!in_array($num, $numeros)){
			$numeros[] = $num;
		}
	}


    // Inicialização das variáveis de sessão
    $_SESSION['numeros'] = $numeros;
    $_SESSION['ordem_value'] = 1;
    $_SESSION['ordem'] = 0;
    $_SESSION['class_num'] = $_POST['class_num'];

    // Verifica se foi enviado um valor de ordem via POST e executa a ordenação correspondente
    if(isset($_POST['ordem'])) {
        $ordem = $_POST['ordem'];
        switch($ordem) {
            case 1:
                asort($_SESSION['numeros']);
                $_SESSION['ordem_value'] = 1;
                break;
            case 2:
                arsort($_SESSION['numeros']);
                $_SESSION['ordem_value'] = 2;
                break;
            case 3:
                $_SESSION['ordem_value'] = 3;
                break;
            default:
                asort($_SESSION['numeros']);
                break;
        }
    }


	$sorteio = false;

    // Verifica se a variável $numeros está definida
    if(isset($numeros)) {
        $sorteio = true;
        $_SESSION['sorteio'] = $sorteio;

        // Define a URL de redirecionamento com base na presença do parâmetro 'loteria' em $_POST
        $redirect_url = isset($_POST['loteria']) ? 'loteria' : 'index';

        // Redireciona para a URL adequada com o parâmetro 'sorteio=sucesso'
        header("Location: $redirect_url?sorteio=sucesso");
        exit;
    } else {
        // Redireciona para a página inicial com o parâmetro 'sorteio=erro'
        header('Location: index?sorteio=erro');
        exit;
    }
?>