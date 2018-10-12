<?php 
//Primeira coisa que ele vai fazer é verificar se existe esse cadastro no banco.
if(empty($_POST['usuario']) && empty($_POST['senha'])){
	header("Location: ../View/index.php");
	exit;
}
require "../Model/classes/usuarios.class.php";
$usuario = addslashes($_POST['usuario']);
$senha = md5(addslashes($_POST['senha']));

$usuarios = new Usuarios();

if($usuarios->verificarExisteUsuario($usuario) == false){
	//entao aqui vai criar o novo usuario
	echo "Cadastro feito com sucesso";
	exit;
	
}else {
	$erro = "Já existe este usuario cadastrado no sistema";
}
?>