<?php
	if(isset($_POST['usuario']) && !empty($_POST['usuario'])){
		require "../Controller/cadastroDados.php";
	}else {
		$erro = '';
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Usuário</title>
	<link 	rel="stylesheet" type="text/css" href="../assets/css/bootstrap4-css/bootstrap.min.css"/>
</head>
<script type="text/javascript">
	function Nova(){
		location.href="index.php";
	}
</script>
<body>
	<div class="container">
		<h1>Cadastro de Usuário</h1>
		<hr>
				<?php
				if($erro != ''):
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">	
					<h4 style="color:#000;"><?= $erro ?></h4>
					<button class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
				endif;
				 ?>
		<form method="POST" action="cadastrar.php">
			<div class="form-group">
				<label for="usuario"><strong>Usuario</strong></label>
				<input id="usuario" type="email" name="usuario" maxlength="50" required class="form-control">
			</div>
			<div class="form-group">
				<label for="senha"><strong>Senha</strong></label>
				<input id="senha" type="password" name="senha" maxlength="20" required class="form-control">
			</div>
			
			<div class="form-group">
				<input type="submit" value="Cadastrar" class="btn btn-primary">
				<input type="button" value="Voltar" onClick="Nova()" class="btn btn-primary">
			</div>
			
		</form>
	</div>
</body>
<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
</html>