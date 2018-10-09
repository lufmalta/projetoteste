<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
if(!empty($_POST['formacao'])){
	
}else {
	header("Location: index.php");
	exit;
}
$cursos = '';
require "classes/educacao.class.php";
$id_pessoa = $_SESSION['id_pessoa'];
$educacao = new Educacao($id_pessoa);

$formacao = addslashes($_POST['formacao']);
$instituicao = addslashes($_POST['instituicao']);
$instituCidade = addslashes($_POST['instituCidade']);
$anoConcl = addslashes($_POST['anoConcl']);
$cursos = addslashes($_POST['cursos']);
$educacao->inserirEducacaoObj($formacao, $instituicao, $instituCidade, $anoConcl, $cursos);
$educacao->inserirEducacaoObjBanco();
header("Location: index.php");
exit;