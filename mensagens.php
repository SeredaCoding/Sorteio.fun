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

	
	<div class="p-2 m-2 rounded border"><?php echo $numero; ?></div>
	

	 <?php
	}
	
} 
?>
<?php 
//sorteados com sucessso
if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'sucesso'){
	?>
	<div class="container text-center">
		<div class="row justify-content-md-center">
			  
			<div class="col-md-auto">
			    <p class="text-success">Número(s) sorteado(s) com sucesso!</p>
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
	<div class="centralizar text-danger">
		<p>Erro ao sortear o(s) número(s)!</p>
	</div>
	<?php 
}else if(isset($_GET['sorteio']) && $_GET['sorteio'] == 'erro2'){
	?>
	<div class="centralizar text-danger">
		<p>Erro ao sortear, definição incompatível!</p>
	</div>
	<?php 
}
?>
<?php 
//Verificação se o sorteio foi feito para exibir o botão resetar
if(isset($_GET['sorteio'])){
	?>
	<div class="centralizar col-12">
		<a href="logoff.php"><button class="btn btn-danger">Resetar</button></a>
	</div>
	<?php 
} ?>

<?php 
//sucesso ao resetar
if(isset($_GET['resetar']) && $_GET['resetar'] == 's'){
	?>
	<div class="centralizar text-white bg-warning rounded pt-3 pl-2 pr-2">
		<p>Número(s) resetado(s) com sucesso!</p>
	</div>
	<?php 
} ?>
<?php
//erro ao resetar
if(isset($_GET['resetar']) && $_GET['resetar'] == 'n'){
	?>
	<div class="centralizar text-white bg-danger rounded pt-3 pl-2 pr-2">
		<p>Erro ao resetar o(s) número(s)!</p>
	</div>
	<?php 
} ?>