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
		<div class="topoint"><h2><strong>Preencha o formulário e crie seu curriculo</strong></h2></div>
	</header>
	<main>
		<h3>Criando seu Currículo</h3>
		<div class="container">
			<form method="POST"> <!-- inicio do formulario -->
				<h4>Dados Pessoais</h4>	
				<div class="row"> <!-- aqui fica o form-group de nome e de email -->
					<div class="col"> <!-- aqui dentro esta o form-group de nome -->
						<div class="form-group">
							<label class="label" style="color:red;" for="nome" data-toggle="tooltip" title="Insira o seu Nome" data-placement="right"><strong>Nome</strong></label>
							<input id="nome" type="text" name="nome" class="w-100 form-control" maxlength="50" />
						</div>
					</div>
					<div class="col"> <!-- aqui dentro esta o form-group de email -->
						<div class="form-group">
							<label class="label" style="color:red;" for="email" data-toggle="tooltip" title="Insira o seu Email - Exemplo: beltrano@gmail.com" data-placement="right"><strong>Email</strong></label>
							<input id="email" type="email" name="email" class="w-100 form-control" maxlength="50"/>
						</div>
					</div>
				</div>			
				
				<div class="row"> <!-- aqui dentro esta o form-group de endereco e telefone -->
					<div class="col"> <!-- aqui dentro esta o form-group de endereco -->
						<div class="form-group">
							<label class="label" style="color:red;" for="endereco" data-toggle="tooltip" title="Insira o seu Endereco Exemplo: Rua 55, quadra 20, lote 10, setor Bela Vista." data-placement="right" ><strong>Endereco</strong></label>
							<input id="endereco" style="max-width:540px;" type="text" name="endereco" class="w-100 form-control" maxlength="80"/>
						</div>
					</div>
					<div class="col"> <!-- aqui dentro esta o form-group de telefone -->
						<div class="form-group">
							<label class="label" style="color:red;" for="telefone" data-toggle="tooltip" title="Insira o seu Telefone Exemplo: +(55) (62) 9xxxx-xxxx." data-placement="right" ><strong>Telefone</strong></label>
							<input id="telefone" style="max-width:300px;" type="text" name="telefone" class="w-100 form-control"/>
						</div>
					</div>
				</div>
				
				<div class="row"> <!-- aqui dentro esta o form-group de objetivo e de habilidades -->					
					<div class="col colHabilidades"> <!-- aqui dentro esta os form groups de habilidades -->
						<div class="row"> <!-- aqui dentro esta os form groups de habilidades -->
							<div class="col"> <!-- aqui esta os form-group das 5 primeiras habilidades -->
								<div class="form-group">
									<label for="habilidade1"><strong>Habilidade 1</strong></label>
									<input id="habilidade1" type="text" name="habilidade1" class="form-control" maxlength="30">
								</div>
								<div class="form-group">
									<label for="habilidade2"><strong>Habilidade 2</strong></label>
									<input id="habilidade2" type="text" name="habilidade2" class="form-control" maxlength="30">	
								</div>
								<div class="form-group">
									<label for="habilidade3"><strong>Habilidade 3</strong></label>
									<input id="habilidade3" type="text" name="habilidade3" class="form-control" maxlength="30">			
								</div>
								<div class="form-group">
									<label for="habilidade4"><strong>Habilidade 4</strong></label>
									<input id="habilidade4" type="text" name="habilidade4" class="form-control" maxlength="30">
								</div>
								<div class="form-group">
									<label for="habilidade5"><strong>Habilidade 5</strong></label>	
									<input id="habilidade5" type="text" name="habilidade5" class="form-control" maxlength="30">			
								</div>
							</div>
							<div class="col"> <!-- aqui esta os form-group das ultimas 5 habilidades -->
								<div class="form-group">
									<label for="habilidade6"><strong>Habilidade 6</strong></label>
									<input id="habilidade6" type="text" name="habilidade6" class="form-control" maxlength="30">
								</div>
								<div class="form-group">
									<label for="habilidade7"><strong>Habilidade 7</strong></label>	
									<input id="habilidade7" type="text" name="habilidade7" class="form-control" maxlength="30">
								</div>
								<div class="form-group">
									<label for="habilidade8"><strong>Habilidade 8</strong></label>	
									<input id="habilidade8" type="text" name="habilidade8" class="form-control" maxlength="30">		
								</div>
								<div class="form-group">
									<label for="habilidade9"><strong>Habilidade 9</strong></label>
									<input id="habilidade9" type="text" name="habilidade9" class="form-control" maxlength="30">
								</div>
								<div class="form-group">
									<label for="habilidade10"><strong>Habilidade 10</strong></label>	
									<input id="habilidade10" type="text" name="habilidade10" class="form-control" maxlength="30">			
								</div>
							</div> <!-- aqui encerra a col das 5 ultimas habilidades -->
						</div>	 <!-- aqui encerra a linha que esta todas as 10 habilidades	 -->							
					</div> <!-- aqui esta a coluna que dentro tem a linha das habilidades -->
					<div class="col"> <!-- aqui esta o form-group de objetivo profissional -->
						<div class="form-group">
							<label class="label" style="color:red;" for="objetivo" data-toggle="tooltip" title="Insira aqui seu objetivo profissional- Exemplo: Assistente Administrativo, Área Tecnológica, Vendas, também pode colocar o seu perfil profissional. " data-placement="right"><strong>Objetivo Profissional</strong></label><br/>
							<textarea id="objetivo"  maxlength="200" rows="7" cols="40" placeholder="Digite aqui seu objetivo profissional..."></textarea>
							<!-- <input id="objetivo" type="text" name="objetivo" class="w-100 form-control" maxlength="50" /> -->
						</div>
						
					</div>
				</div>
				
				
				<!-- <div class="form-group">
					<label class="label" style="color:red;" for="habilidades" data-toggle="tooltip" title="Insira aqui as suas habilidades - Exemplo: Liderança, Pro-ativo, Responsável, HTML5, Criativo, Comunicativo." data-placement="right"><strong>Habilidades</strong></label>
					<input id="habilidades" type="text" name="habilidades" class="w-100 form-control" maxlength="200" />
				</div> -->
			</form>
		</div>
	</main>
</body>

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/javascript.js"></script>
	
	


	
</html>

	<!-- botao para envira o curriculo -->
	<!-- <div class="form-group">
		<input class="btn btn-success" type="submit" value="Gerar Curriculo">		
	</div> -->