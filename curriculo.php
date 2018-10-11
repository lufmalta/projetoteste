<?php 

/* Developed by Luiz Fernando Malta Martins

/* Aqui esta a pagina do curriculo.php, onde será gerado um curriculo para imprimir
/* ou baixar

/* @author Luiz Fernando - lufmalta@gmail.com

*/
//$dadosPessoais = '';
require 'classes/dadosPessoais.class.php';
session_start();
require "validandoDados.php";


?>






<!DOCTYPE html>
<html>
<head>
	<!-- <meta charset="UTF-8"> -->
	
	<title>Developed by Luiz Fernando Malta Martins</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link 	rel="stylesheet" type="text/css" href="assets/css/bootstrap4-css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body >
	<header>
		<div class="container">
			<div id="areaObj">
				<h2><img src="<?php echo $img ?>" height="150"/><?=$dadosPessoais['nome']?></h2><br/>
				<h4 style="margin-left:20px;text-align:center;"><?= $dadosPessoais['descricao'] ?></h4>	
			</div>			
		</div>		
	</header>
	<main>
		<div class="separaDiv">
			
		</div>
		
		<div class="container">
			<h5><strong>Experiência</strong></h5><br/>
			<div class="borda">
				
				<div class="ConteudoExp">
					<?php
						if(isset($semExperiencia)):

						else:
							$experienciaAtual = $experiencia->pegarExp();
							$qtEmp = $experiencia->qtExp();
							$qtEmp--;
							
						for ($i=0; $i <= $qtEmp ; $i++):
							//echo $experienciaAtual[$i]['id_exp'].'<br/>';
						 ?>

						<div class="row">
							<div class="col-sm-3 col3" >
								<h6><?= $experienciaAtual[$i]['empresa'] ?></h6>
								<h6><?= $experienciaAtual[$i]['cidade'] ?></h6>
								<h6><?= $experienciaAtual[$i]['dataEnt'] ?></h6>
								<h6><?= $experienciaAtual[$i]['dataSai'] ?></h6>
							</div>
							<div class="col-sm-9 col9">
								<h4><img src="assets/images/star.png"/><?= $experienciaAtual[$i]['cargo'] ?></h4>
								<span><?= $experienciaAtual[$i]['descCargo'] ?></span>
							</div>						
						</div>
						<br/>
					 <?php endfor;
					 		endif; ?>
					

				</div>
			</div> <!-- borda -->
		</div>
	</main>
	<section>
			<div class="row">
				<div class="col">
					<h6>Informação de Contato</h6>
				</div>
				<div class="col">
					<span>E-mail</span><br/>
					<span style="word-wrap: break-word;"><?= $dadosPessoais['email']; ?></span>
				</div>

				<div class="col">
					<p></p>
					<span>Endereço</span><br/>
					<span style="word-wrap:break-word;"><?= $dadosPessoais['endereco']; ?></span>
					<span></span>
				</div>
				<div class="col">
					<p></p>
					<span>Telefone</span><br/>
					<span><?= $dadosPessoais['telefone']; ?></span>
					<span></span>
				</div>
			</div>
			

			<div class="habilidades">
				<div class="hab-conteudo ">
					<h6>Habilidades</h6>
					<ul style="padding-inline-start: 10px;">
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
				</div>
			</div>	
	</section>
	<footer>
		<div class="separaDiv">
			
		</div>
		<div class="container">
			<h5><strong>Formação</strong></h5><br/>
			<div class="fotmargen">
				<div class="ConteudoExp">
					<?php
						
					 if($qtEdu >= 0):
						$educacao  = $educacao->pegarEdu();
						for ($i=0; $i <= $qtEdu ; $i++):
							
						
					 ?>
			
				
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6><?= $educacao[$i]['instituicao'] ?></h6>
							<h6><?= $educacao[$i]['cidade'] ?></h6>
							<h6><?= $educacao[$i]['anoConcl'] ?></h6>							
						</div>
						<div class="col-sm-9 col9">							
							<h4><img src="assets/images/star.png"/>
								<?= $educacao[$i]['formacao'] ?></h4>
							<span><?= $educacao[$i]['descEducacao'] ?></span><br/>
							<?php
								if($educacao[$i]['id_pessoa'] == 1 && $i == 0):
							 ?>
							<a id="a" href="https://github.com/lufmalta/projetoteste" target="_blank">Experiência - Projeto-Curriculo </a><br/>
							<a id="b" href="https://github.com/lufmalta/projetoteste2" target="_blank">Outros Projetos - </a>
						<?php endif; ?>
						</div>						
					</div>
					</br>
			
				
				<?php   endfor;
						else: ?> <!-- aqui ele entra no caso da qtEdu ser -1 -->
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6><?= $educacao['instituicao'] ?></h6>
							<h6><?= $educacao['instituCidade'] ?></h6>
							<h6><?= $educacao['anoConcl'] ?></h6>							
						</div>
						<div class="col-sm-9 col9">							
							<h4><img src="assets/images/star.png"/>
								<?= $educacao['formacao'] ?></h4>
							<span><?= $educacao['cursos'] ?></span>													
						</div>						
					</div>
				<?php endif; ?>

				 </div>		
			</div>

		</div>

	</footer>

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>



	
</body>
</html>