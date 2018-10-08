<?php 
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}

?>