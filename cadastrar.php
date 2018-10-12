<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastro de Usuário</title>
</head>
<script type="text/javascript">
	function Nova(){
		location.href="index.php";
	}
</script>
<body>
	<div class="formulario">
		<h1>Cadastro de Usuário</h1>
		<hr>
		<form method="POST">
			<label for="usuario"><strong>Usuario</strong></label><br/><br/>
			<input id="usuario" type="email" name="usuario" maxlength="50" required>
			<br/><br/>
			<label for="senha"><strong>Senha</strong></label><br/><br/>
			<input id="senha" type="password" name="senha" maxlength="20" required><br/><br/>
			<input type="submit" value="Cadastrar">
			<input type="button" value="Voltar" onClick="Nova()">
		</form>
	</div>
</body>
</html>