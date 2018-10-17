<?php 
session_start();
if(empty($_SESSION['logado'])){
	header("Location: ../View/index.php");
	exit;
}

if(empty($_POST['descCargo'])){
	header("Location: ../View/index.php");
	exit;
}
require "../Model/classes/experiencia.class.php";
$newExp = '';
$id_pessoa = $_SESSION['id_pessoa'];
$experiencia = new Experiencia($id_pessoa);

$cargo = addslashes($_POST['cargo']);
$descCargo = addslashes($_POST['descCargo']);
$empresa = addslashes($_POST['empresa']); 
$cidade = addslashes($_POST['cidade']);
$dataEnt = addslashes($_POST['dataEnt']);
$dataSai = addslashes($_POST['dataSai']);

$newExp[0] = $cargo;
$newExp[1] = $empresa;
$newExp[2] = $cidade;
$newExp[3] = $dataEnt;
$newExp[4] = $dataSai;
$newExp[5] = $descCargo;
$experiencia->inserirEmpObj($newExp);
$experiencia->inserirEmpObjBanco();
header("Location: ../View/index.php");
exit;
?>