<?php session_start(); ?>
<!DOCTYPE html>
<html>

	<head>

		<title>Sorteio.Fun | Loteria
			<?php
				if(isset($_GET['sorteio'])){
					if($_GET['sorteio'] == 'sucesso'){
						echo ' | Sucesso!';
					}
					if($_GET['sorteio'] == 'erro' || $_GET['sorteio'] == 'erro2' || $_GET['sorteio'] == 'erro3'){
						echo ' | Erro!';
					}
				}
				if(isset($_GET['resetar']) && $_GET['resetar'] == 's'){
					echo ' | Resetado!';
				}
			?>
        </title>

		<?php require "./meta.php"; ?>

		 <style>
                    .flutuar{
            animation: float 5s ease-in-out infinite;
            }

            @keyframes float{
            0%{
                transform: translateY(0px);
            }
            50%{
                transform: translateY(-5px);
            }
            100%{
                transform: translateY(0px);
            }
            }

            .btn-mega-sena {
                    background-color: #209869;
                    color: #fff;
                }

                .btn-lotofacil {
                    background-color: #930089;
                    color: #fff;
                }

                .btn-quina {
                    background-color: #260085;
                    color: #fff;
                }

                .btn-lotomania {
                    background-color: #f78100;
                    color: #fff;
                }

                .btn-timemania {
                    background-color: #00ff48;
                    color: #049645;
                }

                .btn-dupla-sena {
                    background-color: #BF194E;
                    color: #fff;
                }

                .btn-dia-de-sorte {
                    background-color: #cb852b;
                    color: #fff;
                }

                .btn-super-sete {
                    background-color: #a8cf45;
                    color: #fff;
                }
        </style>

        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2335130971900433"
     crossorigin="anonymous"></script>
          
	</head>
	<body>



		<header>
			<div class="container">
            
			    <div class="row justify-content-center">

			    	<nav class="navbar navbar-light bg-white navbar-expand-lg justify-content-center ">

					    <div class="container text-center">

					      <div class="row justify-content-center col-10 col-lg-7 mx-auto flutuar">
					        <div class="mb-2 navbar-brand col-6 col-lg-7">
					          <a href="resetar_auto">
					            <h2 class="text-success mt-3" style="font-family: Caveat; font-size: 40px;">Sorteio.Fun</h2>
					          </a>
					        </div>
					        <div class="col-4">
					          <i><b><p class="text-danger">v_Beta</p></b></i>
					        </div>
					      </div>

					      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
					        <span class="navbar-toggler-icon"></span>
					      </button>

					      <div class="collapse navbar-collapse " id="navbarToggler">
					        <ul class="navbar-nav mx-auto mt-2 mt-lg-0">
					          <li class="nav-item col col-12 col-lg-6">

					            <a class="p-2 m-1 border rounded btn btn-outline-success btn-block" disabled href="index">Números</a>

					          </li>
					          <li class="nav-item col col-12 col-lg-6">

					            <a class="p-2 m-1 border rounded btn btn-outline-success btn-block" disabled href="nomes">Nomes</a>

					          </li>
					          <!--<li class="nav-item col-lg-6">

					            <a class="p-2 m-1 border rounded btn btn-outline-success btn-block" href="sobre">Sobre</a>

					          </li>-->
					        </ul>
					      </div>

					    </div>

				 	</nav>
			    
			    </div>
			</div>

			<div class="container text-center" id="sorteie_abaixo">
			  <div class="row justify-content-md-center">
			  
			    <div class="col-md-auto" >
			      <h5 class="centralizar mt-2 mb-4 text-success">Sorteie seus números da loteria abaixo:</h5>
			    </div>
			    
			  </div>
			</div>
		</header>

		<main>
			<form method="post" action="sortear" id="sortear">

				<div class="container text-center">
				  <div class="row justify-content-center">

				    <div class="col col-12 col-md-8 ">
						<div class="input-group mb-3 form-floating ">
							
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
						
				    </div>
				    
				  </div>
				</div>

				
				<div class="container col-9 col-md-6">
					<div class="mt-1 text-center">
					    <div class="row justify-content-center" >
						        <div class="col-5 mt-1 mb-2 pt-4">
						            <div class="form-check">
						                <input class="form-check-input" type="radio" name="opcao" value="pares">
						                <label class="form-check-label">
						                    Número(s) Pare(s)
						                </label>
						            </div>
						            <div class="form-check">
						                <input class="form-check-input" type="radio" name="opcao" value="impares">
						                <label class="form-check-label">
						                    Número(s) Ímpare(s)
						                </label>
						            </div>
						        </div>

						        <div class="col"></div>

						        <div class="col-5 mt-1 mb-2">
						            <div class="row">
						                <div class="col-12">
						                    <div>Classificação do(s) número(s)</div>
						                </div>
						                <div class="col">
						                    <div class="align-items-center">
						                        <div class="col   ">
						                            <div>Desativar</div>
						                        </div>
						                        <div class="col">
						                            <input type="checkbox" <?php if(isset($_SESSION['class_num'])==1 && $_SESSION['class_num'] == 1){echo 'checked';} ?> name="class_num" value="1">
						                        </div>
						                        <div class="col">
						                            <div>Ativar</div>
						                        </div>
						                    </div>
						                </div>
						               
						            </div>
						        </div>

					    </div>
					</div>
				</div>
				

				<div class="container" id="loteria">
					<div class="row text-center center justify-content-center mb-3">
						<div class="center rounded p-3 ">


							<button class="btn-success rounded btn m-1 btn-mega-sena" <?php if($_SESSION['loteria'] == 1){ ?> disabled <?php } ?> name="loteria" value="1">Mega Sena</button>

							<button class="btn-info rounded btn m-1 btn-quina" <?php if($_SESSION['loteria'] == 2){ ?> disabled <?php } ?> name="loteria" value="2">Quina</button>

							<button class="btn-primary rounded btn m-1 btn-lotofacil" <?php if($_SESSION['loteria'] == 3){ ?> disabled <?php } ?> name="loteria" value="3">Lotofácil</button>

							<button class="btn-warning rounded btn m-1 btn-lotomania" <?php if($_SESSION['loteria'] == 4){ ?> disabled <?php } ?> name="loteria" value="4">Lotomania</button>

							<button class="btn-danger rounded btn m-1 btn-dupla-sena" <?php if($_SESSION['loteria'] == 5){ ?> disabled <?php } ?> name="loteria" value="5">Dupla Sena</button>

							<!--<button class="btn-info rounded btn m-1 btn-super-sete" <?php if($_SESSION['loteria'] == 6){ ?> disabled <?php } ?> name="loteria" value="6">Super Sete</button>-->

							<!--<button class="btn-success rounded btn m-1 btn-timemania" <?php if($_SESSION['loteria'] == 7){ ?> disabled <?php } ?> name="loteria" value="6">Timemania</button>-->

							<!--<button class="btn-dark rounded btn m-1 btn-dia-de-sorte" <?php if($_SESSION['loteria'] == 8){ ?> disabled <?php } ?> name="loteria" value="8">Dia de sorte</button>-->

							


						</div>
					</div>
				</div>
		
				
			</form>

			<?php 

			//se existir o método $_GET['sorteio'] ---------------------------------------------------------
				//diminuindo a verbosidade
				

			
			if(isset($_GET['sorteio'])){ //sorteados com sucessso + mensagem de alerta ?>
				<?php
				if($_GET['sorteio'] == 'sucesso' || isset($_SESSION['numeros'])){
					?>
					<!-- limpando a tela 
					<script>
						document.getElementById('sortear').remove();
						document.getElementById('sorteie_abaixo').remove();
						document.getElementById('loteria').remove();
					</script> -->

				<?php 
				} if($_GET['sorteio'] == 'sucesso'){
					?>
					
					<!-- mensagem de alerta / sucesso -->
					<script>
						Swal.fire(
						  'Números sorteados com sucesso!',
						  'Você sorteou <?php 
						  if(isset($_SESSION['nomeLoteria'])){
						  	echo 'a loteria ';
						  	echo($_SESSION['nomeLoteria']);
						  	echo ' com ';
						  }

						  ?> <?php print($_SESSION['quantidade']);  ?> número(s) <?php if(isset($_SESSION['opcao'])){
						  	if($_SESSION['opcao'] == 'impares'){
						  		echo 'ímpares';
						  	}else if($_SESSION['opcao'] == 'pares'){
						  		echo 'pares';
						  	} 
						  }; ?> entre <?php print($_SESSION['entre1']); ?> até <?php print($_SESSION['entre2']); ?> em ordem <?php 
						  if($_SESSION['ordem_value'] == 1){
						  	echo 'crescente.';
						  }else if($_SESSION['ordem_value'] == 2){
						  	echo 'decrescente.';
						  }else if($_SESSION['ordem_value'] == 3){
						  	echo 'aleatória.';
						  } ?>',
						  'success',


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
				//erro ao sortear
				if($_GET['sorteio'] == 'erro'){
					?>
					<div class="container text-center">
						<div class="row justify-content-md-center">
							  
							<div class="col-md-auto">
							    <p class="text-danger bg-light rounded border p-3">Erro ao sortear o(s) número(s).</p>
							</div>
							    
						</div>
					</div>	
					<?php 
				}else if($_GET['sorteio'] == 'erro2'){
					?>
					<div class="container text-center">
						<div class="row justify-content-md-center">
							  
							<div class="col-md-auto">
							    <p class="text-danger bg-light rounded border p-3">Erro ao sortear, definição incompatível.</p>
							</div>
							    
						</div>
					</div>
					<?php  
				}else if($_GET['sorteio'] == 'erro3'){
					?>
					<div class="container text-center">
						<div class="row justify-content-md-center">
							  
							<div class="col-md-auto">
							    <p class="text-danger bg-light rounded border p-3">Erro ao sortear, limite máximo excedido.</p>
							</div>
							    
						</div>
					</div>
					<?php 
				}else if($_GET['sorteio'] == 'erro4'){
					?>
					<div class="container text-center">
						<div class="row justify-content-md-center">
							  
							<div class="col-md-auto">
							    <p class="text-danger bg-light rounded border p-3">Erro ao sortear, número(s) par(es) ou ímpar(es) são incompatíveis com essa opção de sorteio.</p>
							</div>
							    
						</div>
					</div> 
					<?php
				}
				?> <?php
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
			} //fim resetar?>
			
			


			<!-- exibição dos números sorteados -->
			<div class="container text-center" id="n_sorteados">
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

				
				
				<div class="col-6 col-md-auto col-md-3 col-lg-4 centralizar mt-3">
					<?php if(isset($_SESSION['class_num']) == 1){ ?>
					<div class="col-6 centralizar">
						<div class="rounded border text-success bg-light"><?php echo $id.'º'; ?></div>
					</div>
					<?php }; ?>
					<div class="p-2 m-2 rounded border"><?php echo $numero; ?></div>


					
				</div><?php }} ?>

				<?php 
				//Verificação se o sorteio foi feito para exibir o botão resetar
				if(isset($_SESSION['numeros'])){
					?>
					<div class="container text-center">
					  <div class="row justify-content-md-center">
					  
					    <div class="col-md-auto m-2">
					      <a href="resetar.php"><button class="btn btn-danger">Resetar</button></a>
					    </div>
					    
					  </div>
					</div>
					<?php 
				}  ?> 
			
		</main>	
		
		<footer>
			<div class="container text-center mt-4">
			  <div class="row justify-content-center">
			  	<div class="col-md-auto">
			      <p>Desenvolvido por: </p>
			    </div>
                <div class="col-md-auto mb-2">
			      <a href="https://github.com/SeredaCoding"><i class="fa-brands fa-square-git fa-xl"></i> Sereda Coding</a>
                    <p>
                    &copy;<script>document.write(new Date().getFullYear());</script>
                    </p>
			    </div>

			  </div>
			</div>
            <!--<div class="container text-center">
			  <div class="row justify-content-center">
			  	<div class="col-md-auto">
                  <script id="_waugi8">var _wau = _wau || []; _wau.push(["colored", "wufafl9u8o", "gi8", "ffffff000000"]);</script><script async src="//waust.at/co.js"></script>
                    <p>Usuário(s) online</p>
                    
			    </div>
			  </div>
			</div>-->

		</footer>

	</body>
    
</html>