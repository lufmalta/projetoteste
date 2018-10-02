<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}

$email = $_SESSION['logado'];


?>
<a href="sair.php"><button>Sair</button></a>