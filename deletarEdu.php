<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
require "classes/educacao.class.php";

$eduAtual = $_GET['edu'];
$id_pessoa = $_SESSION['id_pessoa'];
$educacao = new Educacao($id_pessoa);
//Primeiro vou pegar todas as educacoes do banco
//para depois verificar se a educacao que esta no get é valida.
$edusBanco = '';
$dadosEduBanco = $educacao->pegarEdu();
$qtEduBanco = count($dadosEduBanco);
$qtEduBanco--;
for ($i=0; $i <= $qtEduBanco; $i++) { 
	$edusBanco[$i] = $dadosEduBanco[$i]['id_edu'];
}

if(in_array($eduAtual, $edusBanco)){
	//caso exista essa educacao no id dessa pessoa faça:
	$educacao->deletarEdu($eduAtual);
	header("Location: index.php");
	exit;
}else{
	//caso nao exista essa educacao no id da pessoa, entao saia
	header("Location: index.php");
	exit;
}