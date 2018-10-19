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
require "../pages/head.php";
?>
	<div style="background-color:#CCC;" class="jumbotron">
				<div class="row">
					<h2 style="color:#EEE;">Dados Pessoais</h2>
				</div>
				<hr>				
				<div class="row" style="flex-direction:column;">
					<div class="col-md-4" >						
					   <a href="novosDados.php?dado=nome" class="btn btn-dark">Alterar Nome</a>
					</div>
					
					<div class="col-md-4" style="padding-top:5px;">
						<a href="novosDados.php?dado=endereco" class="btn btn-dark">Alterar Endereço </a>
					</div>
					<div class="col-md-4" style="padding-top:5px;">
						<a href="novosDados.php?dado=telefone" class="btn btn-dark">Alterar Telefone </a>
					</div>
				</div>
				<br/>
				<div class="row" style="flex-direction:column;">
					<div class="col-md-4">
						<a href="novosDados.php?dado=habilidades" class="btn btn-dark">Alterar Habilidades </a>
					</div>
					<div class="col-md-4" style="padding-top:5px;">
						<a href="novosDados.php?dado=objPro" class="btn btn-dark">Alterar Objetivo Profissional </a>
					</div>
					<div class="col-md-4" style="padding-top:5px;">
						<a href="alterarSenha.php" class="btn btn-dark">Alterar Senha</a>
					</div>
				</div>	
	</div>
	<div style="background-color:#CCC;" class="jumbotron">
			<table border="0" class='table'>
				<tr>
					<h2 style="color:#EEE;">Experiencia - Educacao</h2>
				</tr>
				<tr>
					<td>
						<a href="novaExp.php" class="btn btn-primary">Adicionar Experiencia</a>
					</td>
					<td>
						<a href="novaEdu.php" class="btn btn-primary">Adicionar Educacao</a>
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
								<a href="editarExp.php?exp=<?=$expAtual?>" class="btn btn-dark">Editar</a><?php
									endif;
								 ?>	
							</td>	
							<td>
								<?php
								if($expAtual != ''):
								 ?>										
								<a href="../Controller/deletarExp.php?exp=<?=$expAtual?>" onclick="return confirm('Tem certeza que deseja deletar essa experiencia?')" class="btn btn-danger">Excluir</a>
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
							<a href="editarEdu.php?edu=<?=$eduAtual?>" class="btn btn-dark">Editar</a>	<?php
								endif;
							 ?>
						</td>
						<?php
							if($qtEdu > 0):
						 ?>
						<td>	
								<a href="../Controller/deletarEdu.php?edu=<?=$eduAtual?>" onclick="return confirm('Tem certeza que deseja deletar essa educacao?')" class="btn btn-danger">Excluir</a>
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
<?php
 require "../pages/end-body.html";
?>