<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
$expAtual = "";

$id_pessoa = $_SESSION['id_pessoa'];
$email = $_SESSION['logado'];
if(!empty($_POST['cargo'])){
	$expAtual = addslashes($_POST['exp']);
	require "../Controller/validarExp.php"; // aqui ele faz a alteracao da educacao, caso ela exista no banco.
	exit;
}else {
	$expAtual = $_GET['exp'];

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alterar Experiencia</title>
	<link 	rel="stylesheet" type="text/css" href="../assets/css/bootstrap4-css/bootstrap.min.css"/>
	<script type="text/javascript">
		function Nova(){
		location.assign('areaRestrita.php');
		}
	</script>
</head>
<body style="">
	<header style="margin-top:10px;">
		<div class="topoint" style="display:flex;justify-content: space-around;background-color:#EEE;">
			<div class="topoleft">
				<h3 style="line-height: 40px;color:#CCC;"><strong>Usuario Logado - <?= $email ?></strong></h3>
			</div>
			
			<div class="toporight">				
				<a href="../Controller/sair.php" style="color:#CCC;line-height: 50px;">Sair</a>
			</div>
		</div>
	</header>
	<div class="container">
		<h2>Editar Experiencia</h2>
		<hr/>
		<form method="POST" action="editarExp.php">
			<input type="hidden" name="exp" value="<?= $expAtual ?>">
			<div class="row">
				<div class="col-sm-4">
					<div class="form-group">
						<label for="cargo"><strong>Cargo</strong></label>
						<input id="cargo" type="text" name="cargo" class="form-control" maxlength="50" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="empresa"><strong>Empresa</strong></label>
						<input id="empresa" type="text" name="empresa" class="form-control" maxlength="40" required>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="form-group">
						<label for="cidade"><strong>Cidade</strong></label>
						<input id="cidade" type="text" name="cidade" class="form-control" maxlength="30" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="dataEnt"><strong>Data Entrada</strong></label>
						<input id="dataEnt" type="text" name="dataEnt" class="form-control dataEnt" required >
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="dataSai"><strong>Data Saida</strong></label>
						<input id="dataSai" type="text" name="dataSai" class="form-control dataSai" required>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label for="descCargo" class="w-100"><strong>Descricao Cargo</strong></label>
						<textarea name="descCargo" id="descCargo"  maxlength="500" rows="3" cols="40" placeholder="Digite aqui sua função na empresa..."></textarea>						
					</div>
				</div>
			</div>
			<div class="form-group">
				<button class="btn btn-primary w-100" type="submit">Enviar</button>
			</div>
			<div class="form-group">
				<input type="button" value="Voltar" onClick="Nova()" class="btn btn-primary">
			</div>
		</form>
	</div>
<?php
 require "../pages/end-body.html";
?>