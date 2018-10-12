<?php
if(empty($_SESSION['logado'])){
	header("Location: ../View/index.php");
	exit;
}
$cursos = '';
require "../Model/classes/educacao.class.php";
$formacao = addslashes($_POST['formacao']);
$instituicao = addslashes($_POST['instituicao']);
$instituCidade = addslashes($_POST['instituCidade']);
$anoConcl = addslashes($_POST['anoConcl']);
$cursos = addslashes($_POST['cursos']);

$educacao = new Educacao($id_pessoa);
$edusBanco = '';
$dadosEduBanco = $educacao->pegarEdu();
$qtEduBanco = count($dadosEduBanco);
$qtEduBanco--;
for ($i=0; $i <= $qtEduBanco; $i++) { 
	$edusBanco[$i] = $dadosEduBanco[$i]['id_edu'];
}
if(in_array($eduAtual, $edusBanco)){
	//caso exista essa educacao no id dessa pessoa faça:
	$educacao->editarEdu($eduAtual, $formacao, $instituicao, $instituCidade,
	 $anoConcl, $cursos);
	header("Location: ../View/index.php");
	exit;
}else{
	//caso nao exista essa educacao no id da pessoa, entao saia
	header("Location: ../View/index.php");
	exit;
}