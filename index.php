<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sorteio de números</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--Bootstrap-->
	    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<!-- Estilo CSS -->
		<link rel="stylesheet" type="text/css" href="../css/estilo.css">
		<link rel="icon" href="../imagens/favicon2.png">

		<!-- Font Awesome -->
	    <script src="https://kit.fontawesome.com/25f8242477.js" crossorigin="anonymous"></script>

	    <style>
			.centralizar{
				margin: auto;
			}
		</style>
	</head>
	<body>

		<div class="container text-center">
		  <div class="row justify-content-md-center">
		  
		    <div class="col-md-auto">
		      <h4 class="centralizar m-4">Sorteie seu número abaixo:</h4>
		    </div>
		    
		  </div>
		</div>

		<form method="post" action="sortear.php">

			<div class="container text-center">
			  <div class="row justify-content-md-center">

			    <div class="col col-12 col-md-8">
			    
					<div class="input-group mb-3">
					  <span class="input-group-text">Sortear</span>
				      	<input class="form-control" type="number" name="quantidade" min="1" value="<?php
						//mantendo a quantidade em sessão
						if(isset($_SESSION['quantidade']) == 1)
							{
								print_r($_SESSION['quantidade']);
							}else if(isset($_SESSION['quantidade']) == 0){
								echo 1;
							}; 
						?>">
					  <span class="input-group-text">Número(s)</span>
					</div>

			    </div>

			    <div class="col col-12 col-md-8">
					<div class="input-group mb-3">
						<span class="input-group-text">Entre</span>
					 			<input class="form-control" type="number" name="entre1" min="1" value="<?php 
								// mantendo o entre1 em sessão
								if(isset($_SESSION['entre1']) == 1)
									{
										print_r($_SESSION['entre1']);
									}else if(isset($_SESSION['entre1']) == 0){
										echo 1;
									}; 
								?>">
					  <span class="input-group-text">até</span>
					  			<input class="form-control" type="number" name="entre2" min="1" value="<?php 
								// mantendo o entre2 em sessão
								if(isset($_SESSION['entre2']) == 1)
									{
										print_r($_SESSION['entre2']);
									}else if(isset($_SESSION['entre2']) == 0){
										echo 10;
									}; 
								?>">
					 
					</div>
					
			    </div>

			  </div>
			</div>

			<div class="container text-center">
			  <div class="row justify-content-md-center">
			  
			    <div class="col-md-auto">
			      <button class="rounded btn-success btn m-2">Sortear</button>
			    </div>
			    
			  </div>
			</div>		
			
		</form>

		<?php 
		//sorteados com sucessso
		if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'sucesso'){
			?>
			<div class="container text-center">
				<div class="row justify-content-md-center">
					  
					<div class="col-md-auto">
					    <p class="text-success bg-light rounded border p-3">Número(s) sorteado(s) com sucesso!</p>
					</div>
					    
				</div>
			</div>	
			<?php 
		}
		?>
		<?php 
		//erro ao sortear
		if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'erro'){
			?>
			<div class="container text-center">
				<div class="row justify-content-md-center">
					  
					<div class="col-md-auto">
					    <p class="text-danger bg-light rounded border p-3">Erro ao sortear o(s) número(s)!</p>
					</div>
					    
				</div>
			</div>	
			<?php 
		}else if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'erro2'){
			?>
			<div class="container text-center">
				<div class="row justify-content-md-center">
					  
					<div class="col-md-auto">
					    <p class="text-danger bg-light rounded border p-3">Erro ao sortear, definição incompatível!</p>
					</div>
					    
				</div>
			</div>
			<?php 
		}
		?>

		<div class="container text-center">
			<div class="row justify-content-md-center">

		<?php
		//verificação se existe números sorteados
		if(isset($_SESSION['numeros']) == 1){
			sort($_SESSION['numeros']);
		}else if(isset($_SESSION['numeros']) == 0){
			
		};

		//percorrendo os números sorteados para exibição
		if(isset($_SESSION['sorteio'])){
			foreach($_SESSION['numeros'] as $indices => $numero){
			if($numero <= 9){
				$numero = '0'.$numero;
			}
			?>

			
			
			<div class="col-12 col-md-auto col-md-3 centralizar">
				<div class="p-2 m-2 rounded border"><?php echo $numero; ?></div>
			</div>

			 <?php
			}
			
		} 
		?>
			</div>
		</div>		
		
		<?php 
		//Verificação se o sorteio foi feito para exibir o botão resetar
		if(isset($_GET['sorteio'])){
			?>
			<div class="container text-center">
			  <div class="row justify-content-md-center">
			  
			    <div class="col-md-auto">
			      <a href="logoff.php"><button class="btn btn-danger">Resetar</button></a>
			    </div>
			    
			  </div>
			</div>
			<?php 
		} ?>

		

		

		<?php
		//sucesso ao resetar
		if(isset($_GET['resetar']) && $_GET['resetar'] == 's'){
			?>
			<div class="container text-center">
			  <div class="row justify-content-md-center">
			  
			    <div class="col-md-auto text-white bg-warning rounded pt-3 pl-2 pr-2">
			      <p>Número(s) resetado(s) com sucesso!</p>
			    </div>
			    
			  </div>
			</div>
			<?php 
		} ?>
		<?php
		//erro ao resetar
		if(isset($_GET['resetar']) && $_GET['resetar'] == 'n'){
			?>
			<div class="container text-center">
			  <div class="row justify-content-md-center">
			  
			    <div class="col-md-auto text-white bg-danger rounded pt-3 pl-2 pr-2">
			      <p>Erro ao resetar o(s) número(s)!</p>
			    </div>
			    
			  </div>
			</div>
			<?php 
		} ?>
		
		
		<footer>
			<div class="container text-center mt-5">
			  <div class="row justify-content-center">
			  	<div class="col-md-auto">
			      <p>Desenvolvido por: </p>
			    </div>

			    <div class="col-md-auto ">
			      <a href="https://github.com/SeredaCoding"><i class="fa-brands fa-square-git fa-xl"></i> Sereda Coding</a>
			    </div>
			    
			  </div>
			</div>
		</footer>
	</body>
</html>
