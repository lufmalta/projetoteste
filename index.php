<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Curriculum Creation</title>
	
	<link 	rel="stylesheet" type="text/css" href="assets/css/bootstrap4-css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/template.css">

</head>
<body>
	<header>
		<div class="topoint"><strong>Preencha o formulário e crie seu curriculo</strong></div>
	</header>
	<main>
		<h3>Criando seu Currículo</h3>
		<div class="container">
			<form method="POST">
				<h4>Dados Pessoais</h4>				
				<div class="form-group">
					<label class="label" style="color:red;" for="nome" data-toggle="tooltip" title="Insira o seu Nome" data-placement="right"><strong>Nome</strong></label>
					<input id="nome" type="text" name="nome" class="w-100 form-control" maxlength="50" />
				</div>
				<div class="form-group">
					<label class="label" style="color:red;" for="email" data-toggle="tooltip" title="Insira o seu Email - Exemplo: beltrano@gmail.com" data-placement="right"><strong>Email</strong></label>
					<input id="email" type="email" name="email" class="w-100 form-control" maxlength="50"/>
				</div>
				<div class="form-group">
					<label class="label" style="color:red;" for="endereco" data-toggle="tooltip" title="Insira o seu Endereco Exemplo: Rua 55, quadra 20, lote 10, setor Bela Vista" data-placement="right"><strong>Endereco</strong></label>
					<input id="endereco" type="text" name="endereco" class="w-100 form-control" maxlength="80"/>
				</div>
				<div class="form-group">
					<label class="label" style="color:red;" for="telefone" data-toggle="tooltip" title="Insira o seu Telefone Exemplo: +(55) (62) 9xxxx-xxxx" data-placement="right"><strong>Telefone</strong></label>
					<input id="telefone" type="text" name="telefone" class="w-100 form-control"/>
				</div>
			</form>
		</div>
	</main>
</body>

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/javascript.js"></script>
	
	


	
</html>