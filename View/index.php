<?php
// Vou inserir isso quando for colocar o email no lugar de login na pagina index.php
// session_start();
//  if(!empty($_SESSION['logado'])){
//  	$email = $_SESSION['logado'];
//  	//echo "<span>$email</span>";
//  }
$erro = '';
session_start();
if(!empty($_SESSION['logado'])){
	header("Location: areaRestrita.php");
	exit;
}else if(!empty($_POST['usuario']) && (!empty($_POST['senha']))){
	require "../Controller/login.php";
	if($_SESSION['invalido'] != '' ){
		$erro = $_SESSION['invalido'];
	}
}else if(isset($_POST['nome']) && !empty($_POST['nome'])){
	require "../Controller/receberDados.php";
	if($_SESSION['invalido'] != '' ){
		$erro = $_SESSION['invalido'];
	}	
	//o else debaixo é no caso do $_POST['nome'] estiver vazio.
}
	
?>
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
			<div class="topoleft">
				<h2><strong>Criando seu Currículo</strong></h2>
			</div>
			
			<div class="toporight">
				<a href="#" style="color:#CCC;" data-toggle="modal" data-target="#modal">Fazer Login</a> -  
				<a href="cadastrar.php" style="color:#CCC;">Cadastre-se</a>
			</div>
		</div>
	</header>
	<section>
		<div class="container">
			<div class="modal fade modal-dismissible" id="modal" role="modal" >
				<div class="modal-dialog" >
					<div class="modal-content">
						<div class="modal-header">
							<h3><strong>Formulário de Login</strong></h3>
						</div>
						<div class="modal-body">							
							<form id="form_login" method="POST" action="index.php" >
								<div class="form-group">
									<!-- <h2 style="color:#FF0000">Usuário ou senha invalidos</h2> isso fazer parte da requisicao ajax --> 
									<label for="usuario"><strong>Usuario</strong></label>
									<input id="usuario" type="email" name="usuario" maxlength="50" class="form-control" placeholder="email@algo.com" required>
								</div>
								<div class="form-group">
									<label for="senha" ><strong>Senha</strong></label>
									<input id="senha" type="password" name="senha" maxlength="32" class="form-control" required>
								</div>
								<div class="form-group">
									<button class="btn btn-success w-100" type="submit">Fazer Login</button>
								</div>
								<div class="form-group">
									
								</div>
								
							</form>
						</div>
						<div class="modal-footer">
							<button class="btn btn-danger w-100" data-dismiss="modal">Fechar Janela</button>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>
	<main>		
		<div class="container">
			<!-- ainda não estou conseguindo fazer funcionar isso -->
			<!-- <div id="errolog" class="alert alert-warning"></div> -->
			<form  id="form" method="POST" action="index.php"> <!-- inicio do formulario -->
				<h4 style="margin-top:20px;"><strong>Dados Pessoais</strong></h4>
				<div class="separaDiv"></div>
				<?php
				if($erro != ''):
				?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">	
					<h4 style="color:#000;"><?= $erro ?></h4>
					<button class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php
				endif;
				 ?>
				<div class="row"> <!-- aqui fica o form-group de nome e de email -->
					<div class="col"> <!-- aqui dentro esta o form-group de nome -->
						<div class="form-group">
							<label class="label1" for="nome" data-toggle="tooltip" title="Insira o seu Nome. Max-caracteres: 50" data-placement="right"><strong>Nome</strong></label>
							<input id="nome" type="text" name="nome" class=" form-control" maxlength="50" required />
						</div>
					</div>
					<div class="col"> <!-- aqui dentro esta o form-group de email -->
						<div class="form-group">
							<label class="label1" for="email" data-toggle="tooltip" title="Insira o seu Email - Exemplo: beltrano@gmail.com. Max-caracteres: 50" data-placement="right"><strong>Email</strong></label>
							<input id="email" type="email" name="email" class="form-control" maxlength="50" required/>
						</div>
					</div>
				</div>			
				
				<div class="row"> <!-- aqui dentro esta o form-group de endereco e telefone -->
					<div class="col"> <!-- aqui dentro esta o form-group de endereco -->
						<div class="form-group">
							<label class="label1" for="endereco" data-toggle="tooltip" title="Insira o seu Endereco - Exemplo: Rua 55, quadra 20, lote 10, setor Bela Vista. Max-caracteres: 80" data-placement="right" ><strong>Endereco</strong></label>
							<input id="endereco" type="text" name="endereco" class=" form-control" maxlength="80" required/>
						</div>
					</div>
					<div class="col"> <!-- aqui dentro esta o form-group de telefone -->
						<div class="form-group">
							<label class="label1" for="telefone" data-toggle="tooltip" title="Insira o seu Telefone Exemplo: +(55) (62) 9xxxx-xxxx." data-placement="right" ><strong>Telefone</strong></label>
							<input id="telefone" style="max-width:300px;" type="text" name="telefone" class=" form-control" required/>
						</div>
					</div>
				</div>
				
				<div class="row"> <!-- aqui dentro esta o form-group de objetivo e de habilidades -->					
					<div class="col colHabilidades"> <!-- aqui dentro esta os form groups de habilidades -->
						<div class="row"> <!-- aqui dentro esta os form groups de habilidades -->
							<div class="col"> <!-- aqui esta os form-group das 5 primeiras habilidades -->
								<div class="form-group">
									<label for="habilidade1" data-toggle="tooltip" class="habilidades"><strong>Habilidade 1</strong></label>
									<input id="habilidade1" type="text" name="habilidade1" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade2" data-toggle="tooltip" class="habilidades"><strong>Habilidade 2</strong></label>
									<input id="habilidade2" type="text" name="habilidade2" class="form-control" maxlength="29">	
								</div>
								<div class="form-group">
									<label for="habilidade3" data-toggle="tooltip" class="habilidades"><strong>Habilidade 3</strong></label>
									<input id="habilidade3" type="text" name="habilidade3" class="form-control" maxlength="29">			
								</div>
								<div class="form-group">
									<label for="habilidade4" data-toggle="tooltip" class="habilidades"><strong>Habilidade 4</strong></label>
									<input id="habilidade4" type="text" name="habilidade4" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade5" data-toggle="tooltip" class="habilidades"><strong>Habilidade 5</strong></label>	
									<input id="habilidade5" type="text" name="habilidade5" class="form-control" maxlength="29">			
								</div>
							</div>
							<div class="col"> <!-- aqui esta os form-group das ultimas 5 habilidades -->
								<div class="form-group">
									<label for="habilidade6" data-toggle="tooltip" class="habilidades"><strong>Habilidade 6</strong></label>
									<input id="habilidade6" type="text" name="habilidade6" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade7" data-toggle="tooltip" class="habilidades"><strong>Habilidade 7</strong></label>	
									<input id="habilidade7" type="text" name="habilidade7" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade8" data-toggle="tooltip" class="habilidades"><strong>Habilidade 8</strong></label>	
									<input id="habilidade8" type="text" name="habilidade8" class="form-control" maxlength="29">		
								</div>
								<div class="form-group">
									<label for="habilidade9" data-toggle="tooltip" class="habilidades"><strong>Habilidade 9</strong></label>
									<input id="habilidade9" type="text" name="habilidade9" class="form-control" maxlength="29">
								</div>
								<div class="form-group">
									<label for="habilidade10" data-toggle="tooltip" class="habilidades"><strong>Habilidade 10</strong></label>	
									<input id="habilidade10" type="text" name="habilidade10" class="form-control" maxlength="29">			
								</div>
							</div> <!-- aqui encerra a col das 5 ultimas habilidades -->
						</div>	 <!-- aqui encerra a linha que esta todas as 10 habilidades	 -->							
					</div> <!-- aqui esta a coluna que dentro tem a linha das habilidades -->
					<div class="col"> <!-- aqui esta o form-group de objetivo profissional -->
						<div class="form-group">
							<label class="label1 objPro" for="objetivo" data-toggle="tooltip" data-placement="right"><strong>Objetivo Profissional</strong></label><br/>
							<textarea name="objetivo" id="objetivo"  maxlength="200" rows="4" cols="40" placeholder="Digite aqui seu objetivo profissional..." required></textarea>
							<!-- <input id="objetivo" type="text" name="objetivo" class="w-100 form-control" maxlength="50" /> -->
						</div>
						
					</div>
				</div>
				<!-- <div class="form-group">
					<label class="label" style="color:red;" for="habilidades" data-toggle="tooltip" title="Insira aqui as suas habilidades - Exemplo: Liderança, Pro-ativo, Responsável, HTML5, Criativo, Comunicativo." data-placement="right"><strong>Habilidades</strong></label>
					<input id="habilidades" type="text" name="habilidades" class="w-100 form-control" maxlength="200" />
				</div> -->
				<h4 style="margin-top:20px;"><strong>Experiência</strong></h4>
				<div class="separaDiv"></div>
				
				
				<h3>Primeira Empresa</h3>
				<div class="separaDiv"></div>
				<div class="row"> <!-- primeira linha, com cargo1, empresa1 e cidade1 -->
					<div class="col-sm-4"> <!-- primeira linha, primeira coluna - Cargo1 -->
						<div class="form-group">
							<label for="cargo1" class="label2 cargos" data-toggle="tooltip" data-placement="right" ><strong>Cargo</strong></label>
							<input id="cargo1" type="text" name="cargo1" class="form-control" maxlength="50" />
						</div>
					</div>
					<div class="col-sm-4"> <!-- primeira linha, segunda coluna - Empresa1 -->
						<div class="form-group">
							<label for="empresa1" class="label2 empresas" data-toggle="tooltip" data-placement="right" ><strong>Empresa</strong></label>
							<input id="empresa1" type="text" name="empresa1" class="form-control" maxlength="40" />
						</div>
					</div>
					<div class="col-sm-4"> <!-- primeira linha, terceira coluna - Cidade1 -->
						<div class="form-group">
							<label for="cidade1" class="label2 cidades" data-toggle="tooltip" data-placement="right" ><strong>Cidade</strong></label>
							<input id="cidade1" type="text" name="cidade1" class="form-control" maxlength="30" />
						</div>
					</div>
				</div>
				<div class="row"> <!-- segunda linha com dataEnt1, DataSai1 e DescCargo1 -->
					<div class="col"> <!-- segunda linha, primeira coluna - dataEnt1 -->
						<div class="form-group">
							<label for="dataEnt1" class="label2 dataEntrada" data-toggle="tooltip" title="Aqui você coloca a data que entrou na empresa" data-placement="right" ><strong>Data Entrada</strong></label>
							<input id="dataEnt1" type="text" name="dataEnt1" class="form-control dataEnt"  />
						</div>
					</div>
					<div class="col"> <!-- segunda linha, segunda coluna - dataSai1 -->
						<div class="form-group">
							<label for="dataSai1" class="label2 dataSaida" data-toggle="tooltip" title="Aqui você coloca a data que saiu da empresa" data-placement="right" ><strong>Data Saida</strong></label>
							<input id="dataSai1" type="text" name="dataSai1" class="form-control dataSai"  />
						</div>
					</div>
					<div class="col"> <!-- segunda linha, terceira coluna - descCargo1 -->
						<div class="form-group">
							<label class="label2 descCargos" for="descCargo1" data-toggle="tooltip" data-placement="right"><strong>Descrição Cargo</strong></label><br/>
							<textarea name="descCargo1" id="descCargo1"  maxlength="500" rows="3" cols="40" placeholder="Digite aqui sua função na empresa..."></textarea>
							<!-- <input id="objetivo" type="text" name="objetivo" class="w-100 form-control" maxlength="50" /> -->
						</div>
					</div>
				</div>
				
				<h3>Segunda Empresa</h3>
				<div class="separaDiv"></div>

				<div class="row"> <!-- terceira linha, com cargo2, empresa2 e cidade2 -->
					<div class="col-sm-4"> <!-- terceira linha, primeira coluna - Cargo2 -->
						<div class="form-group">
							<label for="cargo2" class="label2 cargos" data-toggle="tooltip" data-placement="right" ><strong>Cargo</strong></label>
							<input id="cargo2" type="text" name="cargo2" class="form-control" maxlength="50" />
						</div>
					</div>
					<div class="col-sm-4"> <!-- terceira linha, segunda coluna - Empresa2 -->
						<div class="form-group">
							<label for="empresa2" class="label2 empresas"  data-toggle="tooltip" data-placement="right" ><strong>Empresa</strong></label>
							<input id="empresa2" type="text" name="empresa2" class="form-control" maxlength="40" />
						</div>
					</div>
					<div class="col-sm-4"> <!-- terceira linha, terceira coluna - Cidade2 -->
						<div class="form-group">
							<label for="cidade2" class="label2 cidades" data-toggle="tooltip" data-placement="right" ><strong>Cidade</strong></label>
							<input id="cidade2" type="text" name="cidade2" class="form-control" maxlength="30" />
						</div>
					</div>
				</div>
				<div class="row"> <!-- quarta linha com dataEnt2, dataSai2 e descCargo2 -->
					<div class="col"> <!-- quarta linha, primeira coluna - dataEnt2 -->
						<div class="form-group">
							<label for="dataEnt2" class="label2 dataEntrada" data-toggle="tooltip" title="Aqui você coloca a data que entrou na empresa" data-placement="right" ><strong>Data Entrada</strong></label>
							<input id="dataEnt2" type="text" name="dataEnt2" class="form-control dataEnt"  />
						</div>
					</div>
					<div class="col"> <!-- quarta linha, segunda coluna - dataSai2 -->
						<div class="form-group">
							<label for="dataSai2" class="label2 dataSaida" data-toggle="tooltip" title="Aqui você coloca a data que saiu da empresa" data-placement="right" ><strong>Data Saida</strong></label>
							<input id="dataSai2" type="text" name="dataSai2" class="form-control dataSai"  />
						</div>
					</div>
					<div class="col"> <!-- quarta linha, terceira coluna - descCargo2 -->
						<div class="form-group">
							<label class="label2 descCargos" for="descCargo2" data-toggle="tooltip" data-placement="right"><strong>Descrição Cargo</strong></label><br/>
							<textarea name="descCargo2" id="descCargo2"  maxlength="500" rows="3" cols="40" placeholder="Digite aqui sua função na empresa..."></textarea>
							<!-- <input id="objetivo" type="text" name="objetivo" class="w-100 form-control" maxlength="50" /> -->
						</div>
					</div>
				</div>
				
				<h3>Terceira Empresa</h3>
				<div class="separaDiv"></div>
				<div class="row"> <!-- quinta linha, com cargo3, empresa3 e cidade3 -->
					<div class="col-sm-4"> <!-- quinta linha, primeira coluna - Cargo3 -->
						<div class="form-group">
							<label for="cargo3" class="label2 cargos" data-toggle="tooltip" data-placement="right" ><strong>Cargo</strong></label>
							<input id="cargo3" type="text" name="cargo3" class="form-control" maxlength="50" />
						</div>
					</div>
					<div class="col-sm-4"> <!-- quinta linha, segunda coluna - Empresa3 -->
						<div class="form-group">
							<label for="empresa3" class="label2 empresas" data-toggle="tooltip" data-placement="right" ><strong>Empresa</strong></label>
							<input id="empresa3" type="text" name="empresa3" class="form-control" maxlength="40" />
						</div>
					</div>
					<div class="col-sm-4"> <!-- quinta linha, terceira coluna - Cidade3 -->
						<div class="form-group">
							<label for="cidade3" class="label2 cidades" data-toggle="tooltip" data-placement="right" ><strong>Cidade</strong></label>
							<input id="cidade3" type="text" name="cidade3" class="form-control" maxlength="30" />
						</div>
					</div>
				</div>
				<div class="row"> <!-- sexta linha com dataEnt3, DataSai3 e DescCargo3 -->
					<div class="col"> <!-- sexta linha, primeira coluna - dataEnt3 -->
						<div class="form-group">
							<label for="dataEnt3" class="label2 dataEntrada" data-toggle="tooltip" title="Aqui você coloca a data que entrou na empresa" data-placement="right" ><strong>Data Entrada</strong></label>
							<input id="dataEnt3" type="text" name="dataEnt3" class="form-control dataEnt"  />
						</div>
					</div>
					<div class="col"> <!-- sexta linha, segunda coluna - dataSai3 -->
						<div class="form-group">
							<label for="dataSai3" class="label2 dataSaida" data-toggle="tooltip" title="Aqui você coloca a data que saiu da empresa" data-placement="right" ><strong>Data Saida</strong></label>
							<input id="dataSai3" type="text" name="dataSai3" class="form-control dataSai"  />
						</div>
					</div>
					<div class="col"> <!-- sexta linha, terceira coluna - descCargo3 -->
						<div class="form-group">
							<label class="label2 descCargos" for="descCargo3" data-toggle="tooltip" data-placement="right"><strong>Descrição Cargo</strong></label><br/>
							<textarea name="descCargo3" id="descCargo3"  maxlength="500" rows="3" cols="40" placeholder="Digite aqui sua função na empresa..."></textarea>
							<!-- <input id="objetivo" type="text" name="objetivo" class="w-100 form-control" maxlength="50" /> -->
						</div>
					</div>
				</div>
				
				<h4 style="margin-top:20px;"><strong>Educação</strong></h4>
				<div class="separaDiv"></div>
				<h3>Formação</h3>
				<div class="separaDiv"></div>
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
				<div class="separaDiv"></div>		
				<div class="form-group"><!-- botao para envira o curriculo --><br/>
					<input class="btn btn-info form-control" type="submit" value="Gerar Curriculo">
						<div class="legendas">
							<span><strong style="color:blue;">Legendas </strong></span><br/>
							<span><strong style="color:red;">- Campos Obrigatorios</strong></span><br/>
							<span><strong style="color:green;">- Campos Opcionais</strong></span>
						</div>
				</div>
			</form >
		</div>
	</main>
	<footer>
		<div class="container">
			<h3>Desenvolvido por Luiz Fernando Malta Martins</h3>
			<h4>Contato: lufmalta@gmail.com</h4>
		</div>
	</footer>
</body>

	<script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="../assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="../assets/js/javascript.js"></script>
		
</html>

	