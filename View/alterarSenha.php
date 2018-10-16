<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
if(isset($_POST['senha']) && !empty($_POST['senha'])){
	require "../Controller/alterandoSenha.php";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Alterar senha</title>
	<link 	rel="stylesheet" type="text/css" href="../assets/css/bootstrap4-css/bootstrap.min.css"/>
	<script type="text/javascript">
		function voltar(){
			location.href="index.php";
		}
	</script>
</head>
<body>
	<div class="container" >
		<h1 style="margin-top:30px;">Alterar Senha</h1>
		<hr>
		<form method="POST">
			<div class="form-group">
				<label for="senha">Nova Senha</label>
				<input id="senha" type="password" name="senha" maxlength="20" class="form-control" required>
			</div>
			<div class="form-group">
				<input type="submit" value="Enviar" class="btn btn-primary form-control"/>	
			</div>			
		</form>
		<button onClick="voltar()" class="btn btn-primary">Voltar</button>
	</div>
</body>
<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
</html>