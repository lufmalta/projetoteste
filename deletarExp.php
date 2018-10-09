<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
require "classes/experiencia.class.php";
$expAtual = $_GET['exp'];
$id_pessoa = $_SESSION['id_pessoa'];

$experiencia = new Experiencia($id_pessoa);
$experiencia->deletarExp($expAtual);
header("Location: index.php");
exit;


 ?>