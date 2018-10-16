<script type="text/javascript">
	function voltar(){
		location.href="index.php";
	}
</script>
<?php
if(!empty($_GET['token'])): //inicia o if
	$hash = addslashes($_GET['token']); //recebe o valor do token

	?>
	<form method="POST">
		<label for="senha" >Nova Senha</label>
		<input id="senha" type="password" name="senha" maxlength="20" /><br/><br/>
		<input type="submit" value="Alterar"/>
		<button onClick="voltar()">Voltar</button>
	</form>
	<?php
	require "../Model/classes/userToken.class.php";
	$userToken = new userToken();
	if($userToken->verificaExistencia($hash) == true){
		session_start();
		$id_user = $_SESSION['id_user'];


		if(isset($_POST['senha']) && !empty($_POST['senha'])){
		$senha = addslashes($_POST['senha']);
		require "../Model/classes/usuarios.class.php";
		$usuarios = new Usuarios();
		$usuarios->mudarSenha($id_user, $senha);

		$userToken->invalidarToken($hash);

		echo "Senha alterada com sucesso";
	}

	}else {
		header("Location: index.php");
		exit;
	}
	


	

else:
	header("Location: index.php");
	exit;
endif;// encerra o  primeiro if deste codigo
?>