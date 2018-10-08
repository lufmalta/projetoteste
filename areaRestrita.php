<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}

$email = $_SESSION['logado'];
require 'classes/dadosPessoais.class.php';
require 'validandoDados.php';
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
				<h3 style="line-height: 40px;"><strong>Usuario logado - <?= $email ?></strong></h3>
			</div>
			
			<div class="toporight">
				<a href="curriculo.php" style="color:#AAA;">Visualizar Curriculo</a> -  
				<a href="sair.php" style="color:#AAA;">Sair</a>
			</div>
		</div>
	</header>
	<div style="background-color:#CCC;" class="jumbotron">
		<table border="0" class='table'>
			<tr>
				<h2 style="color:#EEE;">Dados Pessoais</h2>
			</tr>
			<tr>
				<td>
					<a href="novosDados.php?dado=nome">Alterar Nome</a>
				</td>
				<td>
					<a href="novosDados.php?dado=objPro">Alterar Objetivo Profissional </a>
				</td>
				<td>
					<a href="novosDados.php?dado=endereco">Alterar Endereço </a>
				</td>
				<td>
					<a href="novosDados.php?dado=telefone">Alterar Telefone </a>
				</td>
				<td>
					<a href="novosDados.php?dado=habilidades">Alterar Habilidades </a>
				</td>
			</tr>	
				
		</table>		
	</div>
	<div style="background-color:#CCC;" class="jumbotron">
			<table border="0" class='table'>
				<tr>
					<h2 style="color:#EEE;">Experiencia - Educacao</h2>
				</tr>
				<tr>
					<td>
						<a href="#">Adicionar Experiencia</a>
					</td>
					<td>
						<a href="#">Adicionar Educacao</a>
					</td>
				</tr>
			</table>
		</div>
	
	<div class="container" style="margin-top:10px;">
		<h1 style="color:#CCC;">DadosPessoais</h1>
		<table class="table table-light" border="5"  width="1400" >
				<tr>
					<th style="width:200px;">Nome</th>	
					<th style="width:200px;">Email</th>
					<th style="width:200px;">Objetivo Profissional</th>				
					<th style="width:200px;">Endereco</th>
					<th style="width:200px;">Telefone</th>
					<th style="width:200px;">Habilidades</th>
				</tr>
				<tr>
					<td><?= $dadosPessoais['nome'] ?></td>
					<td><?= $dadosPessoais['email'] ?></td>
					<td><?= $dadosPessoais['descricao'] ?></td>
					<td><?= $dadosPessoais['endereco'] ?></td>
					<td><?= $dadosPessoais['telefone'] ?></td>
					<td>
						<ul>
						<?php
							for($i = 0;$i <= $qtNovasHab; $i++ ):
								if($novasHab[$i] != 'VAZIO'):

								
								?>
							<li><?= $novasHab[$i] ?></li>
							<?php
							endif;
							endfor;
							 ?>
					</ul>
					</td>
				</tr>
		</table>
		
		
		<h1 style="color:#CCC;">Experiencia</h1>
		<table class="table table-light" border="5"  width="1200" >
				<tr>
					<th style="width:200px;">Empresa</th>	
					<th style="width:200px;">Cargo</th>
					<th style="width:200px;">Descricao Cargo</th>				
					<th style="width:150px;">Cidade</th>
					<th style="width:120px;">Data Entrada</th>
					<th style="width:120px;">Data Saida</th>
					<th style="width:100px;">Editar Experiência</th>
					<th style="width:100px;">Excluir Experiência</th>
				</tr>
				<?php
						if(isset($semExperiencia)):

						else:
							$experienciaAtual = $experiencia->pegarExp();
							$qtEmp = $experiencia->qtExp();
							$qtEmp--;
							
						for ($i=0; $i <= $qtEmp ; $i++):
							//echo $experienciaAtual[$i]['id_exp'].'<br/>';
						 ?>

						<tr>
							<td>							
								<?= $experienciaAtual[$i]['empresa'] ?>
							</td>	
							<td>							
								<?= $experienciaAtual[$i]['cargo'] ?>
							</td>
							<td>							
								<?= $experienciaAtual[$i]['descCargo'] ?>
							</td>
							<td>							
								<?= $experienciaAtual[$i]['cidade'] ?>
							</td>
							<td>							
								<?= $experienciaAtual[$i]['dataEnt'] ?>
							</td>
							<td>							
								<?= $experienciaAtual[$i]['dataSai'] ?>
							</td>	
							<td>
								<a href="#">Editar</a><br/><br/><br/><br/>		
							</td>	
							<td>
								<a href="#">Excluir</a>
							</td>		
						</tr>
					 <?php endfor;
					 		endif; ?>
				
		</table>
		<h1 style="color:#CCC;">Educacao</h1>
		<table class="table table-light" border="5"  width="1200" >
				<tr>
					<th style="width:200px;">Formacao</th>	
					<th style="width:200px;">Instituicao</th>
					<th style="width:200px;">Cidade</th>				
					<th style="width:150px;">Ano Conclusao</th>
					<th style="width:120px;">Cursos</th>	
					<th style="width:100px;">Editar Educacao</th>	
				</tr>
				<?php if($qtEdu >= 0):
						$educacao  = $educacao->pegarEdu();
						for ($i=0; $i <= $qtEdu ; $i++):
							
						
					 ?>
					<tr>
						<td>							
							<?= $educacao[$i]['formacao'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['instituicao'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['cidade'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['anoConcl'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['descEducacao'] ?>
						</td>
						<td>
							<a href="#">Editar</a><br/><br/><br/><br/>		
						</td>
												
					</tr>											
				<?php   endfor; ?>
				<?php else: ?>					
					<tr>
						<td>							
							<?= $educacao[$i]['formacao'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['instituicao'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['cidade'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['anoConcl'] ?>
						</td>
						<td>							
							<?= $educacao[$i]['descEducacao'] ?>
						</td>												
					</tr>

				 		<?php endif; ?>
		</table>
	</div>
<footer>
		<div class="container">
			<h3>Desenvolvido por Luiz Fernando Malta Martins</h3>
			<h4>Contato: lufmalta@gmail.com</h4>
		</div>
</footer>
</body>

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.mask.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/javascript.js"></script>
		
</html>