<?php
if(empty($_SESSION['logado'])){
	header("Location: ../View/index.php");
	exit;
}
$descCargo = '';
require "../Model/classes/experiencia.class.php";
$cargo = addslashes($_POST['cargo']);
$empresa = addslashes($_POST['empresa']);
$cidade = addslashes($_POST['cidade']);
$dataEnt = addslashes($_POST['dataEnt']);
$dataSai = addslashes($_POST['dataSai']);
$descCargo = addslashes($_POST['descCargo']);

$experiencia = new Experiencia($id_pessoa);
$expsBanco = '';
$dadosExpBanco = $experiencia->pegarExp();
$qtExpBanco = count($dadosExpBanco);
$qtExpBanco--;
for ($i=0; $i <= $qtExpBanco; $i++) { 
	$expsBanco[$i] = $dadosExpBanco[$i]['id_exp'];
}
if(in_array($expAtual, $expsBanco)){
	//caso exista essa experiencia no id dessa pessoa faça:
	$dadosEmpresa[0] = $cargo;
	$dadosEmpresa[1] = $empresa;
	$dadosEmpresa[2] = $cidade;
	$dadosEmpresa[3] = $dataEnt;
	$dadosEmpresa[4] = $dataSai;
	$dadosEmpresa[5] = $descCargo;

	$experiencia->inserirEmpObj($dadosEmpresa);
	$experiencia->editarExp($expAtual);
	header("Location: ../View/index.php");
	exit;
}else{
	//caso nao exista essa experiencia no id da pessoa, entao saia
	header("Location: ../View/index.php");
	exit;
}