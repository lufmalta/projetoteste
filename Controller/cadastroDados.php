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
	require "../Model/classes/dadosPessoais.class.php";
	$dadosPessoais = new DadosPessoais();
	if($dadosPessoais->verificarEmail($usuario) == true){
		$id_pessoa = $dadosPessoais->pegarIDBanco($usuario);
		$usuarios->inserirDadosObj($id_pessoa, $usuario, $senha);
		$usuarios->inserirObjBanco();
		//ja existe cadastro desse usuario nos dadosPessoais, experiencia, educacao
	}else {
		$dadosPessoais->setEmail($usuario);
		$dadosPessoais->inserirBancoEmail();
		$id_pessoa = $dadosPessoais->pegarIDBanco($usuario);
		$usuarios->inserirDadosObj($id_pessoa, $usuario, $senha);
		$usuarios->inserirObjBanco();
	}
	
}else {
	$erro = "Usuário ja existente no sistema";
}
?>