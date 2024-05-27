<?php session_start(); ?>
<!DOCTYPE html>
<html>

	<head>

		<title>Sorteio.Fun | Nomes
			<?php
				if(isset($_GET['sortear'])){
					if($_GET['sortear'] == 's'){
						echo ' | Sucesso!';
					}
				}
				if(isset($_GET['erro']) ){
					echo ' | Erro!';
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

					            <a class="p-2 m-1 border rounded btn btn-outline-success btn-block" disabled href="loteria">Loteria</a>

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
			      <h5 class="centralizar mt-2 mb-4 text-success">Sorteie seus nomes abaixo:</h5>
			    </div>
			    
			  </div>
			</div>
		</header>

		<main>
			<div class="container text-center">
				<div class="row justify-content-md-center">
					<div class="col col-md-10 col-lg-8 justify-content-md-center">

						<div class="text-center">
							<!-- Formulário para adicionar nomes -->
								<form method="post" action="sorteio_nomes">

									<div class="mb-3">
									  
										<div class="row">
											<div class="col  mt-2 mb-2">
									  		<input style="text-align:center;" class="form-control" type="text" name="novoNome" minlength="3" maxlength="28" placeholder="Digite aqui um nome para ser sorteado..." required>
										  	</div>
									      	<div class="col-12 col-md-3  mt-2">
									      		<button class="btn btn-info " type="submit" name="adicionarNome">+ Adicionar Nome</button>	
									      	</div>
										</div>
									</div>

								    
								</form>
						</div>
						
					</div>

					<?php
					        
					    	if (isset($_SESSION['$nomeSorteado'])) { ?>

					    	<div class="col-12">
					    		<h5 style="margin: 0px;">Nome sorteado:</h5>
						    	<div class="container text-center">
									<div class="row justify-content-md-center">
										<div class="col-6 col-md-auto col-md-3 col-lg-4 centralizar">
								            <div class="bg-success text-white p-2 rounded border mb-2 mt-4 flutuar " id="nome_sorteado">
												<?php
											    //exibir nome sorteado
											    	echo $_SESSION['$nomeSorteado'];
											     ?>
										    </div>
									    </div>
									</div>
								</div>
					    	</div>
					    	

					    <?php } ?>
					

					<?php
					    if(isset($_GET['adicionar'])){
					        if ($_GET['adicionar'] == 's') {
					        ?> <script>
					        	Swal.fire({
								  position: "center-mid",
								  icon: "success",
								  title: "Nome adicionado!",
								  text: "<?php if(isset($_SESSION["novoNome"])){
								  	echo $_SESSION['novoNome']; };?> está na lista!",
								  showConfirmButton: false,
								  timer: 1500
								});
					        </script>
					            <?php
					        }
					    }

					?>

					<div class="col-12">
					 	<!-- Botão para sortear um nome -->
						<form method="post" action="sorteio_nomes">
						    
					    	<?php
					    	if (count($_SESSION['nomes']) == 0) { ?>
						    	<script>
									document.getElementById('btnSortear').remove();
								</script>
							<?php } ?>
							<?php	
					    	
					    	if (!isset($_SESSION['$nomeSorteado'])){ ?>
				    			<button id="btnSortear" class="btn btn-success mb-3 mt-3" type="submit" name="sortear">
				    				<?php echo 'Sortear'; ?> 
				    			</button>
				    			<?php
					    		
							}else if(isset($_SESSION['$nomeSorteado'])){ ?>
				    			<button id="btnSortear" class="btn btn-outline-warning mb-3 mt-3" type="submit" name="sortear">
				    				<?php echo 'Sortear novamente'; ?> 
				    			</button>
				    		<?php }; ?>
							
						</form>
					</div>	

					<?php
					    // Exibir a lista de nomes adicionados, o sorteio será feito em sorteio_nomes.php
					    
					    if (isset($_SESSION['nomes']) && !empty($_SESSION['nomes'])) { ?>
					    	<div class="col-12">
					    		<h5 style="margin: 0px;" class="mt-3">Nome(s) adicionado(s):</h5>
					    		<div class="container text-center">
									    <div class="row justify-content-md-center">  

							                <?php
							                $id = 0;
							                // percorrendo os nomes da lista
							                foreach ($_SESSION['nomes'] as $key => $nome) {


												$id = ++$id;


							                    ?>
							                    <div class="mt-4 col-12  col-md-10 col-lg-4 ml-1 mr-1 centralizar ">
							                        <div class="p-2 rounded border row" id="nome_adicionado_<?php echo $key; ?>">
							                        	<div class="col-9 mt-2 text-center">
							                        		<?php 
							                        		echo $id;
							                        		echo '. ';
							                        		echo $nome; 
							                        		?>
							                        	</div>
							                            
							                            <div class="col-3 text-right">
							                            	<!-- Adicionar botão de remover -->
								                            <button class="btn btn-outline-danger btn-remover-nome" data-nome="<?php echo $key; ?>"><i class="fa-regular fa-trash-can"></i>
								                            </button>
							                            </div>
							                            
							                        </div>
							                    </div>
							    			<?php } ?>
									    </div>
									</div>
								</div>
						<?php } ?>

					<div class="col-12">
						<!-- Link para a página de resetar nomes -->
						<form method="post" action="resetar_nomes.php">
						    <button class="btn btn-danger m-4 mb-2" type="submit" name="resetar" id="btnResetar">Resetar</button>
						</form>
					</div>
					<?php
					 //Apagar botão de resetar    
					    if (isset($_GET['resetar']) || !isset($_SESSION['nomes']) || count($_SESSION['nomes']) == 0 || !isset($_SESSION['$nomeSorteado']) && !isset($_SESSION['nomes']) || !isset($_SESSION['$nomeSorteado'])){?>
					    	<script>
								document.getElementById('btnResetar').remove();
							</script><?php } ?>
					<?php 

					    if (isset($_GET['resetar'])) {
					            if ($_GET['resetar'] == 's') { ?>
					            	<div class="container text-center">
									  <div class="row justify-content-md-center">
									  
									    <div class="col-md-auto text-white bg-warning rounded pt-3 pl-2 pr-2">
									      <p>Lista de nomes resetada com sucesso!</p>
									    </div>
									    
									  </div>
									</div>
					                
					                <!-- excluindo botão -->
									<script>
										document.getElementById('btnResetar').remove();
									</script> 
					                <?php
					            } else if($_GET['resetar'] == 'n'){?>
					                <h4 class="mt-3">Erro ao resetar.</h4>
					                <?php
					            }
					            
					        }
					    
					    if (isset($_GET['sortear'])) {
					      	if ($_GET['sortear'] == 's') { ?>

					      		<!-- mensagem de alerta / sucesso -->
								<script>
									Swal.fire(
										'<?php if(isset($_SESSION['$nomeSorteado'])){
									  	echo $_SESSION['$nomeSorteado'];
									  } ?>',
									  'Nome sorteado com sucesso!<br>',
									  'success',
									)
								</script>

					      		<div class="container text-center">
									<div class="row justify-content-md-center">
										  
										<div class="col-md-auto">
										    <p class="text-success bg-light rounded border p-3">Nome(s) sorteado(s) com sucesso!</p>
										</div>
										    
									</div>
								</div>

					      		<?php
					      	} else if($_GET['sortear'] == 'n'){ ?>
					      			<div class="container text-center">
									  <div class="row justify-content-md-center">
									  
									    <div class="col-md-auto text-white bg-danger rounded pt-3 pl-2 pr-2">
									      <p>Erro ao sortear, não existem nomes!</p>
									    </div>
									    
									  </div>
									</div>
					      		<?php
					      	} 
					      }

					      if(isset($_GET['erro'])){ ?>

					      	<div class="container text-center">
								  <div class="row justify-content-md-center">
								  
								    <div class="col-md-auto text-white bg-danger rounded pt-3 pl-2 pr-2">
								      <p>Erro ao sortear, definição incompatível!</p>
								    </div>
								    
								  </div>
							</div>

					      	<?php
					      }

					?>

				</div>
			</div>

			

			<!--<form method="post" action="sortear" id="sortear">

				

				
				<div class="container col-9 col-md-6">
					<div class="mt-1 text-center">
					    <div class="row justify-content-center" >
						        

				        	<div class=""></div>

							        <div class="col-5 mt-1 mb-2">
							            <div class="row">
							                <div class="col-12 mb-2">
							                    <div>Classificação dos Nomes</div>
							                </div>
							                <div class="col">
							                    <div class="align-items-center">
							                        <div class="col">
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
			</form>-->

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
            

		</footer>

		<script>
		    document.addEventListener('DOMContentLoaded', function () {
		        // Adicionar um evento de clique para cada botão de remover
		        var btnsRemoverNome = document.querySelectorAll('.btn-remover-nome');
		        btnsRemoverNome.forEach(function (btn) {
		            btn.addEventListener('click', function () {
		                // Obter o índice do nome a ser removido
		                var indiceNome = this.getAttribute('data-nome');

		                // Enviar uma solicitação AJAX para remover o nome
		                var xhr = new XMLHttpRequest();
		                xhr.open('GET', 'remover_nome.php?indice=' + indiceNome, true);
		                xhr.onload = function () {
		                    if (xhr.status === 200) {
		                        // Atualizar a página após a remoção bem-sucedida
		                        location.reload();

		                        // Agora, redirecione a página para nomes?remover=s
		                        window.location.href = 'nomes?remover=s';
		                    }
		                };
		                xhr.send();
		            });
		        });
		    });
		</script>



	</body>
    
</html>