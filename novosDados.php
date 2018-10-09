<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
$email = $_SESSION['logado'];
$dado = $_GET['dado']; // aqui recebe qual o dado sera alterado dos dadosPessoais
//aqui tem um array com todos os dados possiveis, se não for nenhum deles, ira sair desta pagina.


$dadosPossiveis = array('nome','objPro','endereco','telefone','habilidades');


if($dado != ''){
	if(in_array($dado, $dadosPossiveis)){
		
	}else {
		header("Location: index.php");
		exit;
	}
}else {
	header("Location: index.php");
	exit;
}
//<link rel="stylesheet" type="text/css" href="assets/css/template.css">
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>AlterandoDados</title>
	<link 	rel="stylesheet" type="text/css" href="assets/css/bootstrap4-css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/template.css">
	<script type="text/javascript">
		function voltar(){
		location.assign('areaRestrita.php');
		}
	</script>
</head>
<body style="">
	<header style="margin-top:10px;">
		<div class="topoint" style="display:flex;justify-content: space-around;background-color:#EEE;">
			<div class="topoleft">
				<h3 style="line-height: 40px;color:#CCC;"><strong>Usuario Logado - <?= $email ?></strong></h3>
			</div>
			
			<div class="toporight">				
				<a href="sair.php" style="color:#CCC;line-height: 50px;">Sair</a>
			</div>
		</div>
	</header>
	<div class="container" style="margin-top:10px;" >
		<form method="POST" action="mudarDado.php">
			<?php
				if($dado == 'nome'):
			 ?>
				 	<div class="form-group forms">
				 		<label for="nome"><strong>Nome</strong></label>
				 		<input id="nome" type="text" name="nome" required class="form-control"/ maxlength="50">	
				 	</div>
			 	<?php 
				require "pages/footer.php";
	 			?>		 	
		
			 <?php 
			  	endif; if($dado == 'objPro'):
			  ?>
					<div class="form-group forms">
					  	<label for="objPro"><strong>Objetivo Profissional</strong></label>
					 	<textarea name="objPro" id="objPro"  maxlength="200" rows="4" cols="40" placeholder="Digite aqui seu objetivo profissional..." required class="form-control"></textarea>
					</div>
			  	<?php 
				require "pages/footer.php";
	 			?>			 
			
			 <?php 
			  	endif; if($dado == 'endereco'):
			  ?>	
			  		<div class="form-group forms">
			  			<label for="endereco"><strong>Endereco</strong></label>
			 			<input id="endereco" type="text" name="endereco" required class="form-control" maxlength="80"/>	
			  		</div>
			  	<?php 
				require "pages/footer.php";
	 			?>		 	
			
			 <?php 
			  	endif; if($dado == 'telefone'):
			  ?>
			  	<div class="form-group forms">
			  		<label for="telefone"><strong>Telefone</strong></label>
			 		<input id="telefone" type="text" name="telefone" required class="form-control" style="max-width:200px;"/>
			  	</div>
			  	<?php 
				require "pages/footer.php";
	 			?>
			 			
			 <?php 
			  	endif; if($dado == 'habilidades'):
			  ?>
			  
			  <div class="col colHabilidades"> <!-- aqui dentro esta os form groups de habilidades -->
						<div class="row"> <!-- aqui dentro esta os form groups de habilidades -->
							<div class="col"> <!-- aqui esta os form-group das 5 primeiras habilidades -->
								<div class="form-group">
									<label for="habilidade1" data-toggle="tooltip" class="habilidades"><strong>Habilidade 1</strong></label>
									<input id="habilidade1" type="text" name="habilidade1" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade2" data-toggle="tooltip" class="habilidades"><strong>Habilidade 2</strong></label>
									<input id="habilidade2" type="text" name="habilidade2" class="form-control" maxlength="29">	
								</div>
								<div class="form-group">
									<label for="habilidade3" data-toggle="tooltip" class="habilidades"><strong>Habilidade 3</strong></label>
									<input id="habilidade3" type="text" name="habilidade3" class="form-control" maxlength="29">			
								</div>
								<div class="form-group">
									<label for="habilidade4" data-toggle="tooltip" class="habilidades"><strong>Habilidade 4</strong></label>
									<input id="habilidade4" type="text" name="habilidade4" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade5" data-toggle="tooltip" class="habilidades"><strong>Habilidade 5</strong></label>	
									<input id="habilidade5" type="text" name="habilidade5" class="form-control" maxlength="29">			
								</div>
							</div>
							<div class="col"> <!-- aqui esta os form-group das ultimas 5 habilidades -->
								<div class="form-group">
									<label for="habilidade6" data-toggle="tooltip" class="habilidades"><strong>Habilidade 6</strong></label>
									<input id="habilidade6" type="text" name="habilidade6" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade7" data-toggle="tooltip" class="habilidades"><strong>Habilidade 7</strong></label>	
									<input id="habilidade7" type="text" name="habilidade7" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade8" data-toggle="tooltip" class="habilidades"><strong>Habilidade 8</strong></label>	
									<input id="habilidade8" type="text" name="habilidade8" class="form-control" maxlength="29">		
								</div>
								<div class="form-group">
									<label for="habilidade9" data-toggle="tooltip" class="habilidades"><strong>Habilidade 9</strong></label>
									<input id="habilidade9" type="text" name="habilidade9" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade10" data-toggle="tooltip" class="habilidades"><strong>Habilidade 10</strong></label>	
									<input id="habilidade10" type="text" name="habilidade10" class="form-control" maxlength="29">			
								</div>
							</div> <!-- aqui encerra a col das 5 ultimas habilidades -->
						</div>	 <!-- aqui encerra a linha que esta todas as 10 habilidades	 -->							
					</div> <!-- aqui esta a coluna que dentro tem a linha das habilidades -->	
			  		<footer style="position:absolute;left:0px;right:0px;bottom:-60px;">
						<div class="container">
							<h3>Desenvolvido por Luiz Fernando Malta Martins</h3>
							<h4>Contato: lufmalta@gmail.com</h4>
						</div>
					</footer>
			  	
			  
			  	
				
			  		
			  	
			 	
			 <?php endif; ?>	
			 <div class="form-group">
			 	 <input class="btn btn-primary w-100" type="submit" value="Alterar">			 	 
			 </div>
			 <div class="form-group">
			 	<button class="btn btn-primary"><a href="areaRestrita.php" style="text-decoration:none;color:#FFF;">Voltar</a></button>
			 </div>
				  
		</form>

	</div>
	

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/javascript.js"></script>
</body>
</html>
