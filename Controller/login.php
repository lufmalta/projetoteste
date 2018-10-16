<?php 

require "../Model/classes/usuarios.class.php";
if(empty($_POST['usuario'])){
	header("Location: ../View/index.php");
	exit;
}
//session_start();
$email = addslashes($_POST['usuario']);
//$senha = md5(addslashes($_POST['senha']));
$senha = $_POST['senha'];
$pdo = '';

// $con = new Banco();
// $pdo = $con->conectar($pdo);
$usuarios = new usuarios();
if($usuarios->verificarExisteUsuario($email) == true){
	if($usuarios->verificarUsuSenha($email, $senha) == true){
		//$_SESSION['logado'] = $email;
		//$_SESSION['invalido'] = ''; //tirei teste
		//$erro = ''; //coloquei teste
		header("Location: ../View/areaRestrita.php");
		exit;
	}else {
		//$_SESSION['invalido'] = "Usuario e/ou senha invalidos"; tirei teste
		//header("Location: index.php");
		//exit;
		$erro = "Usuario e/ou senha invalidos";
	}// caso a senha ou usuario estejam invalidos

//fim do verificar se existe esse usuario no banco	
}else {
		//$_SESSION['invalido'] = "Usuario nao cadastrado no sistema"; tirei teste
		//header("Location: index.php");
		//exit;
		$erro = "Usuario nao cadastrado no sistema";
} 

