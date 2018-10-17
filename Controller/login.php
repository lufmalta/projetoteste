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


$usuarios = new usuarios();
if($usuarios->verificarExisteUsuario($email) == true){
	if($usuarios->verificarUsuSenha($email, $senha) == true){
		header("Location: ../View/areaRestrita.php");
		exit;
	}else {
		$erro = "Usuario e/ou senha invalidos";
	}// caso a senha ou usuario estejam invalidos

//fim do verificar se existe esse usuario no banco	
}else {
		$erro = "Usuario nao cadastrado no sistema";
} 

