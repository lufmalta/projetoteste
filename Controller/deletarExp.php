<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: ../View/index.php");
	exit;
}
require "../Model/classes/experiencia.class.php";

$expAtual = $_GET['exp'];
$id_pessoa = $_SESSION['id_pessoa'];
$experiencia = new Experiencia($id_pessoa);
//Primeiro vou pegar todas as experiencias do banco
//para depois verificar se a experiencia que esta no get é valida.


$expsBanco = '';
$dadosExpBanco = $experiencia->pegarExp();
$qtExpBanco = count($dadosExpBanco);
$qtExpBanco--;
for ($i=0; $i <= $qtExpBanco; $i++) { 
	$expsBanco[$i] = $dadosExpBanco[$i]['id_exp'];
}

if(in_array($expAtual, $expsBanco)){
	//caso exista essa experiencia no id dessa pessoa faça:
	$experiencia->deletarExp($expAtual);
	header("Location: ../View/index.php");
	exit;
}else{
	//caso nao exista essa experiencia no id da pessoa, entao saia
	header("Location: ../View/index.php");
	exit;
}




