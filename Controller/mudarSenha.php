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
?>