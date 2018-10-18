<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
$eduAtual = "";

$id_pessoa = $_SESSION['id_pessoa'];
$email = $_SESSION['logado'];
if(!empty($_POST['formacao'])){
	$eduAtual = addslashes($_POST['edu']);
	require "../Controller/validarEdu.php"; // aqui ele faz a alteracao da educacao, caso ela exista no banco.
	exit;
}else {
	$eduAtual = $_GET['edu'];

}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alterar Educacao</title>
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
		<h2>Editar Educacao</h2>
		<hr/>
		<form method="POST" action="editarEdu.php">
			<input type="hidden" name="edu" value="<?= $eduAtual ?>">
			<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label class="label1 formacao" for="formacao" data-toggle="tooltip"
							data-placement="right"><strong>Formação</strong></label>
							<input id="formacao" type="text" name="formacao" maxlength="40" class="form-control" required>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label class="label1 institu" for="instituicao" data-toggle="tooltip"
							data-placement="right"><strong>Instituicao</strong></label>
							<input id="instituicao" type="text" name="instituicao" maxlength="40" class="form-control" required>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label class="label1 instituCidade" for="instituCidade" data-toggle="tooltip"
							data-placement="right"><strong>Cidade</strong></label>
							<input id="instituCidade" type="text" name="instituCidade" maxlength="30" class="form-control" required>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="form-group">
							<label class="label1 anoConcl" for="anoConcl" data-toggle="tooltip"
							data-placement="top"><strong>AnoConcl</strong></label>
							<input id="anoConcl" type="text" name="anoConcl" maxlength="4" class="form-control" required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label class="label2 cursos" for="cursos" data-toggle="tooltip"
							data-placement="right"><strong>Outros Cursos</strong></label><br/>
							<textarea name="cursos" id="cursos"  maxlength="500" rows="5" cols="45" placeholder="Digite aqui seus outros cursos, no caso, mini-cursos" ></textarea>
						</div>
					</div>					
				</div>	
			<div class="form-group">
				<button class="btn btn-primary w-100" type="submit">Enviar</button>
			</div>
			<div class="form-group">
				<input type="button" value="Voltar" onClick="Nova()" class="btn btn-primary">
				<!-- <button class="btn btn-primary"><a href="areaRestrita.php" style="text-decoration:none;color:#FFF;">Voltar</a></button> -->
			</div>
		</form>
	</div>
<?php
 require "../pages/end-body.html";
?>	