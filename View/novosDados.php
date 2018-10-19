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
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alterando Dados</title>
	<link 	rel="stylesheet" type="text/css" href="../assets/css/bootstrap4-css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../assets/css/template.css">
	<script type="text/javascript">
		function Nova(){
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
				<a href="../Controller/sair.php" style="color:#CCC;line-height: 50px;">Sair</a>
			</div>
		</div>
	</header>
	<div class="container" style="margin-top:10px;" >
		<form method="POST" action="../Controller/mudarDado.php">
			<?php
				if($dado == 'nome'):
			 ?>
				 	<div class="form-group forms">
				 		<label for="nome"><strong>Nome</strong></label>
				 		<input id="nome" type="text" name="nome" required class="form-control"/ maxlength="50">	
				 	</div>
			 	<?php 
				require "../pages/footer.php";
	 			?>		 	
		
			 <?php 
			  	endif; if($dado == 'objPro'):
			  ?>
					<div class="form-group forms">
					  	<label for="objPro"><strong>Objetivo Profissional</strong></label>
					 	<textarea name="objPro" id="objPro"  maxlength="200" rows="4" cols="40" placeholder="Digite aqui seu objetivo profissional..." required class="form-control"></textarea>
					</div>
			  	<?php 
				require "../pages/footer.php";
	 			?>			 
			
			 <?php 
			  	endif; if($dado == 'endereco'):
			  ?>	
			  		<div class="form-group forms">
			  			<label for="endereco"><strong>Endereco</strong></label>
			 			<input id="endereco" type="text" name="endereco" required class="form-control" maxlength="80"/>	
			  		</div>
			  	<?php 
				require "../pages/footer.php";
	 			?>		 	
			
			 <?php 
			  	endif; if($dado == 'telefone'):
			  ?>
			  	<div class="form-group forms">
			  		<label for="telefone"><strong>Telefone</strong></label>
			 		<input id="telefone" type="text" name="telefone" required class="form-control" style="max-width:200px;"/>
			  	</div>
			  	<?php 
				require "../pages/footer.php";
	 			?>
			 			
			 <?php 
			  	endif; if($dado == 'habilidades'):
			  ?>
			  <div class="col colHabilidades">
						<div class="row">
							<div class="col">
								<?php
									for ($i=1; $i <= 5 ; $i++): ?>
									<div class="form-group">
									      <label for="habilidade<?= $i ?>" data-toggle="tooltip" class="habilidades"><strong>Habilidade</strong></label>
									     <input id="habilidade<?= $i ?>" type="text" name="habilidade<?= $i ?>" class="form-control" maxlength="29">
								    </div>
								 <?php
								 	endfor;
								  ?>											
							</div>
							<div class="col">
								<?php
									for ($i=6; $i <= 10 ; $i++): ?>
									<div class="form-group">
									      <label for="habilidade<?= $i ?>" data-toggle="tooltip" class="habilidades"><strong>Habilidade</strong></label>
									     <input id="habilidade<?= $i ?>" type="text" name="habilidade<?= $i ?>" class="form-control" maxlength="29">
								    </div>
								 <?php
								 	endfor;
								  ?>
							</div>
						</div>							
					</div>	
			  		<footer style="position:absolute;left:0px;right:0px;bottom:-60px;">
						<div class="container">
							<h3>Desenvolvido por Luiz Fernando Malta Martins</h3>
							<h4>Contato: lufmalta@gmail.com</h4>
						</div>
					</footer>
			 <?php endif; ?>	
			 <div class="form-group">
                <input class="btn btn-dark w-100" type="submit" value="Alterar"> 
			 </div>
			 <div class="form-group">
			 	<input type="button" value="Voltar" onClick="Nova()" class="btn btn-dark">
			 </div>		  
		</form>
	</div>
<?php
 require "../pages/end-body.html";
?>
