<script type="text/javascript">
	function voltar(){
		location.href="index.php";
	}
</script>
<?php
if(!empty($_GET['token'])): //inicia o if
	$hash = addslashes($_GET['token']); //recebe o valor do token

	?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>Redefinindo senha</title>
		<link 	rel="stylesheet" type="text/css" href="../assets/css/bootstrap4-css/bootstrap.min.css"/>
	</head>
	<body>
		<div class="container">
			<h1>Redefinir Senha</h1>
			<hr>
			<form method="POST">
				<div class="form-group">
					<label for="senha" >Nova Senha</label>
					<input id="senha" type="password" name="senha" maxlength="20" class="form-control" required />
				</div>
				<div class="form-group">
					<input type="submit" value="Alterar" class=" btn btn-primary form-control" />
				</div>
				<button onClick="voltar()" class="btn btn-primary">Voltar</button>
			</form>
		</div>
	</body>
	</html>
	
	<?php
	require "../Controller/mudarSenha.php";
	


	

else:
	header("Location: index.php");
	exit;
endif;// encerra o  primeiro if deste codigo
?>