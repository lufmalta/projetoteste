<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Curriculum Creation</title>
	<link 	rel="stylesheet" type="text/css" href="../assets/css/bootstrap4-css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="../assets/css/template.css">
</head>
<body style="margin-top:15px;">
	<header>
		<div class="topoint" style="display:flex;justify-content: space-around;">
			<?php
				if(isset($_SESSION['logado']) && !empty($_SESSION['logado'])): ?>
				<div class="topoleft">
				   <h3 style="line-height: 40px;"><strong>Usuario Logado - <?= $email ?></strong></h3>
			    </div>
			    <div class="toporight">
				    <a href="curriculo.php" style="color:#AAA;">Visualizar Curriculo</a>
				    - 
				    <a href="../Controller/sair.php" style="color:#AAA;">Sair</a>
			    </div>
			    <?php
			    else:
			     ?>
			    <div class="topoleft">
				<h2><strong>Criando seu Currículo</strong></h2>
			    </div>		
			    <div class="toporight">
				<a href="#" style="color:#CCC;" data-toggle="modal" data-target="#modal">Fazer Login</a> -  
				<a href="cadastrar.php" style="color:#CCC;">Cadastre-se</a>
			    </div>
			    <?php
                   endif;
			     ?>
		</div>
	</header>