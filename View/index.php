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
	
}else if(isset($_POST['nome']) && !empty($_POST['nome'])){
	require "../Controller/receberDados.php";

}
require "../pages/head.php";	
?>
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
									<label for="usuario"><strong>Usuario</strong></label>
									<input id="usuario" type="email" name="usuario" maxlength="50" class="form-control" placeholder="email@algo.com" required>
								</div>
								<div class="form-group">
									<label for="senha" ><strong>Senha</strong></label>
									<input id="senha" type="password" name="senha" maxlength="32" class="form-control" required>
								</div>
								<div class="form-group">
									<a href="esqueciSenha.php">Esqueci a senha</a><br/>
									<a href="cadastrar.php">Ainda não tenho Login</a><br/>
								</div>
								<div class="form-group">
									<button class="btn btn-success w-100" type="submit">Fazer Login</button>
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
				
				<div class="row">				
					<div class="col colHabilidades">
						<div class="row">
							<div class="col">
								<?php
									for ($i=1; $i <= 5 ; $i++): ?>
									<div class="form-group">
									      <label for="habilidade<?= $i ?>" data-toggle="tooltip" class="habilidades"><strong>Habilidade</strong></label>
									     <input id="habilidade<?= $i ?>" type="text" name="habilidade<?= $i ?>" class="form-control" maxlength="29">
								    </div>
								 <?php
								 	endfor;
								  ?>				
							</div>
							<div class="col">
								<?php
									for ($i=6; $i <= 10 ; $i++): ?>
									<div class="form-group">
									      <label for="habilidade<?= $i ?>" data-toggle="tooltip" class="habilidades"><strong>Habilidade</strong></label>
									     <input id="habilidade<?= $i ?>" type="text" name="habilidade<?= $i ?>" class="form-control" maxlength="29">
								    </div>
								 <?php
								 	endfor;
								  ?>
							</div>
						</div>							
					</div>
					<div class="col">
						<div class="form-group">
							<label class="label1 objPro" for="objetivo" data-toggle="tooltip" data-placement="right"><strong>Objetivo Profissional</strong></label><br/>
							<textarea name="objetivo" id="objetivo"  maxlength="200" rows="4" cols="40" placeholder="Digite aqui seu objetivo profissional..." required></textarea>							
						</div>						
					</div>
				</div>
				<h4 style="margin-top:20px;"><strong>Experiência</strong></h4>
				<div class="separaDiv"></div>
				<?php
					for($i = 1; $i <= 3; $i++ ): ?>
                <h3>Empresa</h3>
                <div class="separaDiv"></div>
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label for="cargo<?= $i ?>" class="label2 cargos" data-toggle="tooltip" data-placement="right" ><strong>Cargo</strong></label>
							<input id="cargo<?= $i ?>" type="text" name="cargo<?= $i ?>" class="form-control" maxlength="50" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="empresa<?= $i ?>" class="label2 empresas" data-toggle="tooltip" data-placement="right" ><strong>Empresa</strong></label>
							<input id="empresa<?= $i ?>" type="text" name="empresa<?= $i ?>" class="form-control" maxlength="40" />
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label for="cidade<?= $i ?>" class="label2 cidades" data-toggle="tooltip" data-placement="right" ><strong>Cidade</strong></label>
							<input id="cidade<?= $i ?>" type="text" name="cidade<?= $i ?>" class="form-control" maxlength="30" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col">
						<div class="form-group">
							<label for="dataEnt<?= $i ?>" class="label2 dataEntrada" data-toggle="tooltip" title="Aqui você coloca a data que entrou na empresa" data-placement="right" ><strong>Data Entrada</strong></label>
							<input id="dataEnt<?= $i ?>" type="text" name="dataEnt<?= $i ?>" class="form-control dataEnt"  />
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label for="dataSai<?= $i ?>" class="label2 dataSaida" data-toggle="tooltip" title="Aqui você coloca a data que saiu da empresa" data-placement="right" ><strong>Data Saida</strong></label>
							<input id="dataSai<?= $i ?>" type="text" name="dataSai<?= $i ?>" class="form-control dataSai"  />
						</div>
					</div>
					<div class="col">
						<div class="form-group">
							<label class="label2 descCargos" for="descCargo<?= $i ?>" data-toggle="tooltip" data-placement="right"><strong>Descrição Cargo</strong></label><br/>
							<textarea name="descCargo<?= $i ?>" id="descCargo<?= $i ?>"  maxlength="500" rows="3" cols="40" placeholder="Digite aqui sua função na empresa..."></textarea>							
						</div>
					</div>
				</div>
				<?php
					endfor;
				 ?>
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
<?php
 require "../pages/end-body.html";
?>

	