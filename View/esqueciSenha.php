<?php
$erro = '';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Recuperar Senha</title>
	<link 	rel="stylesheet" type="text/css" href="../assets/css/bootstrap4-css/bootstrap.min.css"/>
</head>
<script type="text/javascript">
	function voltar(){
		location.href="index.php";
	}
</script>
<body>
	<div class="container">
		<form method="POST" action = "../Controller/recuperarSenha.php">
			<h1>Recuperar Senha</h1>
			<hr>
			<?php
				if($erro != ''):
			 ?>
			 <div class="alert alert-danger alert-dismissible fade show" role="alert">
			 	<?= $erro ?>
			 	<button class="close" data-dismiss="alert">
			 		<span aria-hidden="true">&times;</span>	
			 	</button>
			 </div>
			 <?php
			 	endif;
			  ?>
			<div class="form-group">
				<label for="email" data-toggle="tooltip" title="Aqui você coloca o usuario para recuperar sua senha." data-placement="right" ><strong>Email</strong></label>
				<input id="email" type="email" name="email"/ class="form-control" required >	
			</div>
			<div class="form-group">
				<input type="submit" value="Enviar" class="btn btn-primary form-control">	
			</div>	
			<div class="form-group">
				<input onClick="voltar()" type="button" class="btn btn-primary" value="Voltar">
			</div>	
		</form>
	</div>
</body>

<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="../assets/js/scriptSenha.js"></script>
</html>