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
			//agora tenho que pegar os dados de experiencia no banco...
			$experiencia = $_SESSION['experiencia']; //aqui ele guarda o valor da ultima empresa inserida no banco. No caso pode ser a primeira empresa, se houver inserido apenas ela, pode ser a segunda empresa, se estiver inserido somente ela, pode ser a terceira empresa se houver inserido somente ela, e pode ser a terceira empresa, no caso de ter inserido as 3 empresas. Também pode ser a segunda empresa, no caso de ter inserido a primeira e segunda empresa.
			echo $experiencia[0];
		}else {
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
				<h2><img src="assets/images/foto perfil.jpg" height="150"/><?=$dadosPessoais['nome']?></h2><br/>
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
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Charlotte Casa de Dança</h6>
							<h6>Goiânia, GO</h6>
							<h6>Junho - 2018</h6>
							<h6>Agosto - 2018</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Diretor Executivo</h4>
							<span>Compra de produtos para venda no dia do evento, seja alimento, bebidas, gelo, materiais de limpeza, copos descartáveis. Reserva de mesas para evento, organizar a limpeza do galpão. No dia do evento, ser o responsável pelo caixa de entradas e fichas.</span>
						</div>						
					</div>
					<br/>					
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Edíficio Dj.Oliveira</h6>
							<h6>Goiânia, GO</h6>
							<h6>Maio - 2018</h6>
							<h6>Julho - 2018</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Porteiro Noturno</h4>
							<span>Organização da guarita, fechamento dos portões da garagem, abertura do portão de entrada para
							moradores, documentação de rotina diária, recebimento de correspondências e entrega
							das mesmas. Vigilância de câmeras, entrega de recados e/ou utensílios de moradores.</span>
						</div>						
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Hinode</h6>
							<h6>Goiânia, GO</h6>
							<h6>Maio - 2016</h6>
							<h6>Julho - 2018</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Consultor Executivo</h4>
							<span>Vendas diretas de produtos, seja cosméticos, perfumes, shampoos, cremes corporais e faciais.</span>
						</div>						
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Universidade Salgado de Oliveira</h6>
							<h6>Goiânia, GO</h6>
							<h6>Maio - 2014</h6>
							<h6>Maio - 2016</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Assistente de Laboratório</h4>
							<span>Manutenção de laboratórios de informática, formatação de computadores, atendimento à alunos na matricula, no início e fim de semestre.</span>
						</div>						
					</div>

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
							for($i = 0;$i <= $qtNovasHab; $i++ ):	?>
							<li><?= $novasHab[$i] ?></li>
							<?php
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
							<h6>Universidade Salgado de Oliveira</h6>
							<h6>Setor Sul, Goiânia</h6>
							<h6>2016</h6>							
						</div>
						<div class="col-sm-9 col9">							
							<h4><img src="assets/images/star.png"/>Analise e Desenvolvimento de Sistemas</h4>
							<span>Curso PHP - Zero ao profissional - Professor Bonieky Lacerda(Sênior PHP) - (Cursando). Certificados já adquiridos: Banco de dados(MySql) - 10 horas, Bootstrap Básico - 10 horas, Fundamentos PHP - 20 horas, HTML5 e CSS3 - 20 horas, Javascript - 25 horas. Módulos concluídos: 14 módulos, total de 405 aulas concluídas. </span>
							<a id="a" href="https://github.com/lufmalta/" target="_blank"></a>
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