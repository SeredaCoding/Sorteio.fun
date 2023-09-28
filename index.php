<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sorteio de números | 
            <?php if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'sucesso'){
			?>Sucesso!<?php }?>
            <?php if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'erro' || $_GET['sorteio'] == 'erro2' || $_GET['sorteio'] == 'erro3'){
			?>Erro!<?php }?>
            <?php if(isset($_GET['resetar']) && $_GET['resetar'] == 's'){
			?>Resetado!<?php }?>
        </title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!--Bootstrap-->
	    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<!-- Estilo CSS -->
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!-- Font Awesome -->
	    <script src="https://kit.fontawesome.com/25f8242477.js" crossorigin="anonymous"></script>
        <!-- Google Fonts -->
	    <!-- Sweet Alert -->
	    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2335130971900433"
     crossorigin="anonymous">
        </script>
        <script async custom-element="amp-auto-ads"
        src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js">
        </script>
        <script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>

	    <style>
			.centralizar{
				margin: auto;
			}
			a:link{
				text-decoration: none;
			}
		</style>
	</head>
	<body>
        <amp-ad width="100vw" height="320"
            type="adsense"
            data-ad-client="ca-pub-2335130971900433"
            data-ad-slot="3057233204"
            data-auto-format="rspv"
            data-full-width="">
        <div overflow=""></div>
        </amp-ad>

        <amp-auto-ads type="adsense"
        data-ad-client="ca-pub-2335130971900433">
        </amp-auto-ads>
		<header>
			<div class="container">
			  <div class="row justify-content-center">
		   
		    	<div class="text-center mb-2"><a href="resetar_auto.php"><h2 class="text-success mt-4" style="margin-top: 10px;">Sorteio de números</h2></a></div>
                <div class="text-center mb-2"><i><b><p class="text-danger mt-4"">v.Beta</p></i></b></div>
			    
			  </div>
			</div>


			<div class="container text-center">
			  <div class="row justify-content-md-center">
			  
			    <div class="col-md-auto">
			      <h5 class="centralizar mt-2 mb-4">Sorteie seu número abaixo:</h5>
			    </div>
			    
			  </div>
			</div>
		</header>
		<main>
			<form method="post" action="sortear.php">

				<div class="container text-center">
				  <div class="row justify-content-center">

				    <div class="col col-12 col-md-8">
				    
						<div class="input-group mb-3">
						  <span class="input-group-text bg-light">Sortear</span>
					      	<input style="text-align:center;" class="form-control" type="number" name="quantidade" min="1" value="<?php
							//mantendo a quantidade em sessão
							if(isset($_SESSION['quantidade']) == true)
								{
									print_r($_SESSION['quantidade']);
								}else if(isset($_SESSION['quantidade']) == false){
									echo 10;
								}; 
							?>">
						  <span class="input-group-text bg-light">Número(s)</span>
						</div>

				    </div>

				    <div class="col col-12 col-md-8">
						<div class="input-group mb-3">
							<span class="input-group-text bg-light">Entre</span>
						 			<input  style="text-align:center;" class="form-control" type="number" name="entre1" min="1" value="<?php 
									// mantendo o entre1 em sessão
									if(isset($_SESSION['entre1']) == 1)
										{
											print_r($_SESSION['entre1']);
										}else if(isset($_SESSION['entre1']) == 0){
											echo 1;
										}; 
									?>">
						  <span class="input-group-text bg-light">até</span>
						  			<input  style="text-align:center;" class="form-control" type="number" name="entre2" min="1" value="<?php 
									// mantendo o entre2 em sessão
									if(isset($_SESSION['entre2']) == 1)
										{
											print_r($_SESSION['entre2']);
										}else if(isset($_SESSION['entre2']) == 0){
											echo 100;
										}; 
									?>">
						 
						</div>
						
				    </div>

				    <div class="col col-12 col-md-8">
						<div class="input-group mb-3">
							
						 	<select style="text-align:center;" class="form-select form-control" name="ordem" required>
							  <option value="" disabled hidden <?php 
							  if(isset($_SESSION['ordem_value']) == 0){
							  	echo 'selected';
							  }
							   ?>>Selecione a ordem de exposição dos números</option>
							  <option value="1" <?php 
							  if(isset($_SESSION['ordem_value']) == true){
							  	if($_SESSION['ordem_value'] == 1){
							  		echo 'selected';
							  	}
							  }
							   ?>>Crescente</option>
							  <option value="2" <?php 
							  if(isset($_SESSION['ordem_value']) == 1){
							  	if($_SESSION['ordem_value'] == 2){
							  		echo 'selected';
							  	}
							  }
							   ?>>Decrescente</option>
							  <option value="3"
							   <?php 
							  if(isset($_SESSION['ordem_value']) == 1){
							  	if($_SESSION['ordem_value'] == 3){
							  		echo 'selected';
							  	}
							  }
							   ?>>Aleatório</option>
							</select>

						</div>
						
				    </div>
				    <div class="col col-12 col-md-8">
				  		<div>
				  			<div class="col">Desativar</div>
						    <div class="col"><input type="checkbox" <?php if(isset($_SESSION['class_num'])==1 && $_SESSION['class_num'] == 1){echo 'checked';} ?> name="class_num" value="1"></div>
						   	<div class="col">Ativar</div>
						</div>

					    <div class="col mb-3">
					      <div>Classificação dos números</div>
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
			//sorteados com sucessso + mensagem de alerta
			if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'sucesso'){
				?>
				<script>
					Swal.fire(
					  'Números sorteados com sucesso!',
					  'Você sorteou <?php print($_SESSION['quantidade']);  ?> número(s) entre <?php print($_SESSION['entre1']); ?> até <?php print($_SESSION['entre2']); ?> em ordem <?php 
					  if($_SESSION['ordem_value'] == 1){
					  	echo 'crescente.';
					  }else if($_SESSION['ordem_value'] == 2){
					  	echo 'decrescente.';
					  }else if($_SESSION['ordem_value'] == 3){
					  	echo 'aleatória.';
					  } ?>',
					  'success'
					)
				</script>
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
						    <p class="text-danger bg-light rounded border p-3">Erro ao sortear o(s) número(s).</p>
						</div>
						    
					</div>
				</div>	
				<?php 
			}else if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'erro2'){
				?>
				<div class="container text-center">
					<div class="row justify-content-md-center">
						  
						<div class="col-md-auto">
						    <p class="text-danger bg-light rounded border p-3">Erro ao sortear, definição incompatível.</p>
						</div>
						    
					</div>
				</div>
				<?php  
			}else if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'erro3'){
				?>
				<div class="container text-center">
					<div class="row justify-content-md-center">
						  
						<div class="col-md-auto">
						    <p class="text-danger bg-light rounded border p-3">Erro ao sortear, limite máximo excedido.</p>
						</div>
						    
					</div>
				</div>
				<?php 
			}
			?>

			<div class="container text-center">
				<div class="row justify-content-md-center">

			<?php
			$id= 0;
			$ads = 1;
			//verificação se existe números sorteados
			if(isset($_SESSION['numeros']) == 1){
				$_SESSION['ordem'];
			}else if(isset($_SESSION['numeros']) == 0){
				
			};



			//percorrendo os números sorteados para exibição
			if(isset($_SESSION['sorteio'])){
				foreach($_SESSION['numeros'] as $indices => $numero){
				if($numero <= 9){
					$numero = '0'.$numero;
				}

				$id = ++$id;



				?>

				
				
				<div class="col-6 col-md-auto col-md-3 col-lg-4 centralizar ">
					<?php if(isset($_SESSION['class_num']) == 1){ ?>
					<div class="col-6 centralizar">
						<div class="rounded border text-success bg-light"><?php echo $id.'º'; ?></div>
					</div>
					<?php }; ?>
					<div class="p-2 m-2 rounded border"><?php echo $numero; ?></div>


					
				</div>
				<?php
				if($_SESSION['quantidade'] == 10 && $id == 10){ ?>
					<div class="container text-center">
					  <div class="row justify-content-center">

						<script type="text/javascript">
							var infolinks_pid = 3406060;
							var infolinks_wsid = 0;
						</script>
						<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>
					  
					    <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2335130971900433"
						     crossorigin="anonymous"></script>
						 sorteio-anúncios 
						<ins class="adsbygoogle"
						     style="display:block"
						     data-ad-client="ca-pub-2335130971900433"
						     data-ad-slot="3057233204"
						     data-ad-format="auto"
						     data-full-width-responsive="true"></ins>
						<script>
						     (adsbygoogle = window.adsbygoogle || []).push({});
						</script>-->
					    
					  </div>
					</div><?php }else if($_SESSION['quantidade'] > 9){
						if($id == 9 || $id == 54 || $id == 81){
					?>
					<div class="container text-center">
					  <div class="row justify-content-center">
					  
					    <div class="border rounded col-12 m-3">

					    	<script type="text/javascript">
							var infolinks_pid = 3406060;
							var infolinks_wsid = 0;
							</script>
							<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>
					      <!--<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2335130971900433"
						     crossorigin="anonymous"></script>
						 sorteio-anúncios 
						<ins class="adsbygoogle"
						     style="display:block"
						     data-ad-client="ca-pub-2335130971900433"
						     data-ad-slot="3057233204"
						     data-ad-format="auto"
						     data-full-width-responsive="true"></ins>
						<script>
						     (adsbygoogle = window.adsbygoogle || []).push({});
						</script>-->
					    </div>
					    
					  </div>
					</div><?php  } } ?>
				 <?php
				 
				}
				
			} 
			?>
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
			
			<?php 
			//Verificação se o sorteio foi feito para exibir o botão resetar
			if(isset($_GET['sorteio']) || isset($_SESSION['numeros'])){
				?>
				<div class="container text-center">
				  <div class="row justify-content-md-center">
				  
				    <div class="col-md-auto">
				      <a href="resetar.php"><button class="btn btn-danger">Resetar</button></a>
				    </div>
				    
				  </div>
				</div>
				<?php 
			} ?>

			

		</main>	
		
		<footer>
			<div class="container text-center mt-5">
			  <div class="row justify-content-center">
			  	<div class="col-md-auto">
			      <p>Desenvolvido por: </p>
			    </div>

			    <div class="col-md-auto mb-2">
			      <a href="https://github.com/SeredaCoding"><i class="fa-brands fa-square-git fa-xl"></i> Sereda Coding</a>
			    </div>

                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2335130971900433"
                crossorigin="anonymous"></script>
			    
			  </div>
			</div>
		</footer>
		<script type="text/javascript">
			var infolinks_pid = 3406060;
			var infolinks_wsid = 0;
		</script>
		<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>
	</body>
</html>