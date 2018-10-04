<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}

$email = $_SESSION['logado'];

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Curriculum Creation</title>
	
	<link 	rel="stylesheet" type="text/css" href="assets/css/bootstrap4-css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/template.css">

</head>
<body style="margin-top:15px;">
	<header>
		<div class="topoint" style="display:flex;justify-content: space-around;">
			<div class="topoleft">
				<h3 style="line-height: 40px;"><strong>Usuario Logado - <?= $email ?></strong></h3>
			</div>
			
			<div class="toporight">
				<a href="curriculo.php" style="color:#CCC;">Visualizar Curriculo</a> -  
				<a href="sair.php" style="color:#CCC;">Sair</a>
			</div>
		</div>
	</header>
	<div class="container" style="margin-top:10px;">
		<a href="">Alterar Curriculo</a>
	</div>
	
	
<?php
	require "pages/footer.php";
 ?>