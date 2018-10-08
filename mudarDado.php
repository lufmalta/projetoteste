<?php
require "classes/dadosPessoais.class.php";
session_start();
if(!empty($_SESSION['logado'])){
	
}else {
	header("Location: index.php");
	exit;
}


if(isset($_POST['nome']) && !empty($_POST['nome'])){
	$dado = addslashes($_POST['nome']);
	$dadoAlt = "nome"; 
}else if(isset($_POST['objPro']) && !empty($_POST['objPro'])){
	$dado = addslashes($_POST['objPro']);
	$dadoAlt = "descricao";
}else if(isset($_POST['endereco']) && !empty($_POST['endereco'])){
	$dado = addslashes($_POST['endereco']);
	$dadoAlt = "endereco";
}else if(isset($_POST['telefone']) && !empty($_POST['telefone'])){
	$dado = addslashes($_POST['telefone']);
	$dadoAlt = "telefone";
}else if(isset($_POST['habilidades']) && !empty($_POST['habilidades'])){
	$dado = addslashes($_POST['habilidades']);
	$dadoAlt = "habilidades";
}else {
	header("Location: index.php");
	exit;
}
$email = addslashes($_SESSION['logado']);
$dadosPessoais = new dadosPessoais();

?>