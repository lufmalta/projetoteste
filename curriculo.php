<?php 

/* Developed by Luiz Fernando Malta Martins

/* Aqui esta a pagina do curriculo.php, onde será gerado um curriculo para imprimir
/* ou baixar

/* @author Luiz Fernando - lufmalta@gmail.com

*/
//$dadosPessoais = '';
require 'classes/dadosPessoais.class.php';
session_start();
//Caso a pessoa esteja logada, entrará aqui
if(!empty($_SESSION['logado'])){
	echo "nao esta vazio sessao";
	exit;
	//Com o email, aqui ira fazer o preenchimento dos dados para inserir no curriculo.



// Caso contrario, se os dados de educacao e dadosPessoais estiverem preenchidos, entre aqui.	
}else if(!empty($_SESSION['educacao']) && !empty($_SESSION['dadosPessoais'])){
		//recebe os dados do objeto de educacao
		$educacao = $_SESSION['educacao']; 
		//recebe os dados do objeto de dadosPessoais
		$dadosPessoais = $_SESSION['dadosPessoais'];
		$img = '';
		$img = $dadosPessoais['img'];
		// echo $img;
		// exit;
		//Pega as habilidades que estao separadas por virgula e coloca numa variavel.
		$habilidades = explode (',', $dadosPessoais['habilidades'] );
		// pega a quantidade de habilidades que tem em habilidades, tanto os espaços vazios, quanto os que tem algo.
		$qtHab = count($habilidades);

		for($i = 0; $i < $qtHab; $i++){
			// Caso a posiçao da habilidade nao tiver nenhum valor, escrever dentro dela vazio.
			if(empty($habilidades[$i])){
				// caso esteja vazio, não faça nada, apenas pule isso
				//echo "VAZIO".'</br>';
			}else{
				//echo $habilidades[$i].'</br>';
				// caso tenha algo, entao coloque no array novasHab o valor da habilidade.
				$novasHab[] = $habilidades[$i];
			}
			
		}
		//Aqui ele conta quantas habilidades tem dentro do array novasHab, no caso aqui só tem as habilidades que nao estao vazias
		$qtNovasHab = count($novasHab);
		// diminui um valor, porque apesar de ter '10' habilidades, quando for setar dentro dos campos ira do valor 0-9, e o 10 nao entra, então diminuir 1 da quantidade.
		$qtNovasHab = $qtNovasHab - 1;
		//echo $qtNovasHab;


		//Caso a experiencia também esteja preenchidas, entre aqui.
		if(!empty($_SESSION['experiencia'])){
			require 'classes/experiencia.class.php';
			//agora tenho que pegar os dados de experiencia no banco...
			$qtEmp = $_SESSION['experiencia']; //aqui ele guarda o valor da ultima empresa inserida no banco. No caso pode ser a primeira empresa, se houver inserido apenas ela, pode ser a segunda empresa, se estiver inserido somente ela, pode ser a terceira empresa se houver inserido somente ela, e pode ser a terceira empresa, no caso de ter inserido as 3 empresas. Também pode ser a segunda empresa, no caso de ter inserido a primeira e segunda empresa.
			//echo $experiencia[0];
			$qtEmp--;
			$experiencia = new Experiencia($dadosPessoais['id_pessoa']);
		}else {
			$semExperiencia = $_SESSION['experiencia'];
			//echo "Esta vazio experiencia";
		}
		
}else {
	header("Location: index.php");
	exit;
}
		
		


	
	
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
				<h4 style="text-align:center;"><?= $dadosPessoais['descricao'] ?></h4>	
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
						$experienciaAtual = $experiencia->pegarExp();
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
					 <?php endfor; ?>
					

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
					<span><?= $dadosPessoais['endereco']; ?></span>
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
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6><?= $educacao['instituicao'] ?></h6>
							<h6><?= $educacao['instituCidade'] ?></h6>
							<h6><?= $educacao['anoConcl'] ?></h6>							
						</div>
						<div class="col-sm-9 col9">							
							<h4><img src="assets/images/star.png"/>
								<?= $educacao['formacao'] ?></h4>
							<span><?= $educacao['cursos'] ?></span><br/>
							<a id="a" href="https://github.com/lufmalta/" target="_blank">Experiência - </a>
						</div>						
					</div>					
					<br/>	

				</div>
			</div>

		</div>
	</footer>
	

	<script type="text/javascript" src="assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap4-js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>



	
</body>
</html>