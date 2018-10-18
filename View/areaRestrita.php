<?php
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}


$email = $_SESSION['logado'];
require '../Model/classes/dadosPessoais.class.php';
require '../Controller/validandoDados.php';
$_SESSION['id_pessoa'] = $id_pessoa;
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
				<h3 style="line-height: 40px;"><strong>Usuario Logado - <?= $email ?></strong></h3>
			</div>
			
			<div class="toporight">
				<a href="curriculo.php" style="color:#AAA;">Visualizar Curriculo</a> -  
				<a href="../Controller/sair.php" style="color:#AAA;">Sair</a>
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
			<tr>
				<td style="border:none;">
					<a href="alterarSenha.php">Alterar Senha</a>				
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
						<a href="novaExp.php">Adicionar Experiencia</a>
					</td>
					<td>
						<a href="novaEdu.php">Adicionar Educacao</a>
					</td>
				</tr>
			</table>
		</div>
	
	<div class="container" style="margin-top:10px;">
		<h1 style="color:#CCC;">DadosPessoais</h1>
		<div class="tabelas-scroll">
		<table class="table table-bordered table-striped" border="5"  width="1400">
				<tr>
					<th style="width:200px;">Nome</th>	
					<th style="width:200px;">Email</th>
					<th style="width:200px;">Objetivo Profissional</th>				
					<th style="width:200px;">Endereco</th>
					<th style="width:200px;">Telefone</th>
					<th style="width:200px;">Habilidades</th>
				</tr>
				<tr style="color:#888;">
					<td><strong><?= $dadosPessoais['nome'] ?></strong></td>
					<td><?= $dadosPessoais['email'] ?></td>
					<td><?= $dadosPessoais['descricao'] ?></td>
					<td><?= $dadosPessoais['endereco'] ?></td>
					<td><?= $dadosPessoais['telefone'] ?></td>
					<td>
						<ul>
						<?php
							if($novasHab == ""):?>
								<li>Ainda não possui habilidades</li>					
							<?php
							else:	
							for($i = 0;$i <= $qtNovasHab; $i++ ):
								if($novasHab[$i] != 'VAZIO'):

								
								?>
							<li><?= $novasHab[$i] ?></li>
							<?php
							endif;
							endfor;
							endif;
							 ?>
						</ul>
					</td>
				</tr>
		</table>
		</div>
		
		<h1 style="color:#CCC;">Experiencia</h1>
		<div class="tabelas-scroll">
			<table class="table table-bordered table-striped" >
				<tr>
					<th>Cargo</th>
					<th>Empresa</th>						
					<th>Descricao Cargo</th>				
					<th>Cidade</th>
					<th>Data Entrada</th>
					<th>Data Saida</th>
					<th>Editar Experiência</th>
					<th>Excluir Experiência</th>
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

						<tr style="color:#888;">
							<td ><strong><?= $experienciaAtual[$i]['cargo']				
								 ?></strong>
								
							</td>	
							<td>
								<?= $experienciaAtual[$i]['empresa']			
								 ?>
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
								<?php
									$expAtual = $experienciaAtual[$i]['id_exp'];
									if($expAtual != ''):
								 ?>								 
								<a href="editarExp.php?exp=<?=$expAtual?>">Editar</a><?php
									endif;
								 ?>	
							</td>	
							<td>
								<?php
								if($expAtual != ''):
								 ?>										
								<a href="../Controller/deletarExp.php?exp=<?=$expAtual?>" onclick="return confirm('Tem certeza que deseja deletar essa experiencia?')">Excluir</a>
							</td>
								<?php
								endif;
								?>		
						</tr>
					 <?php endfor;
					 		endif; ?>
				
		</table>
		</div>
		
		<h1 style="color:#CCC;">Educacao</h1>
		<div class="tabelas-scroll">
		<table class="table table-bordered table-striped" width="1200" >
				<tr>
					<th style="width:200px;">Formacao</th>	
					<th style="width:200px;">Instituicao</th>
					<th style="width:200px;">Cidade</th>				
					<th style="width:150px;">Ano Conclusao</th>
					<th style="width:350px;">Cursos</th>	
					<th style="width:100px;">Editar Educacao</th>
					<?php
						if($qtEdu > 0):
					 ?>	
					<th style="width:100px;">Excluir Educacao</th> 
					<?php
						endif;
					 ?>
				</tr>
				<?php if($qtEdu >= 0):
						$educacao  = $educacao->pegarEdu();
						for ($i=0; $i <= $qtEdu ; $i++):
					 ?>
					<tr style="color:#888;">
						<td>							
							<strong><?= $educacao[$i]['formacao'] ?></strong>
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
							<?php
								$eduAtual = $educacao[$i]['id_edu'];
								if($eduAtual != ''):
							 ?>
							<a href="editarEdu.php?edu=<?=$eduAtual?>">Editar</a>	<?php
								endif;
							 ?>
						</td>
						<?php
							if($qtEdu > 0):
						 ?>
						<td>	
								<a href="../Controller/deletarEdu.php?edu=<?=$eduAtual?>" onclick="return confirm('Tem certeza que deseja deletar essa educacao?')">Excluir</a>
						</td>
						<?php
							endif;
						 ?>						
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
	</div>
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