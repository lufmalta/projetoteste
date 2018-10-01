<?php 

/* Developed by Luiz Fernando Malta Martins

/* Aqui esta a pagina do curriculo.php, onde ser� gerado um curriculo para imprimir
/* ou baixar

/* @author Luiz Fernando - lufmalta@gmail.com

*/
//$dadosPessoais = '';
require 'classes/dadosPessoais.class.php';
session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
	exit;
}
	
	
?>

<?php

		$email = $_SESSION['logado'];
		$dadosPessoais = new dadosPessoais();
		if($dadosPessoais->verificarEmail($email) == false){
		header("Location: index.php");
		exit;
		}
		$dadosPessoais->setarObjComBanco($email);
		$dadosObjPessoas = $dadosPessoais->pegarDados();
		//echo $dadosObjPessoas['endereco'];
		$habilidades = explode(',', $dadosObjPessoas['habilidades']);
		$quantHabil = count($habilidades);
		//echo $quantHabil;
		// for($i = 0; $i < $quantHabil; $i++){
		// 	echo $habilidades[$i].'<br/>';
		// }
	

		//for($i = 0, )
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
				<h2><img src="assets/images/foto perfil.jpg" height="150"/><?=$dadosObjPessoas['nome'];?></h2><br/>
				<h4><?=$dadosObjPessoas['descricao'];?></h4>	
			</div>			
		</div>		
	</header>
	<main>
		<div class="separaDiv">
			
		</div>
		
		<div class="container">
			<h5><strong>Experi�ncia</strong></h5><br/>
			<div class="borda">
				
				<div class="ConteudoExp">
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Charlotte Casa de Dan�a</h6>
							<h6>Goi�nia, GO</h6>
							<h6>Junho - 2018</h6>
							<h6>Agosto - 2018</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Diretor Executivo</h4>
							<span>Compra de produtos para venda no dia do evento, seja alimento, bebidas, gelo, materiais de limpeza, copos descart�veis. Reserva de mesas para evento, organizar a limpeza do galp�o. No dia do evento, ser o respons�vel pelo caixa de entradas e fichas.</span>
						</div>						
					</div>
					<br/>					
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Ed�ficio Dj.Oliveira</h6>
							<h6>Goi�nia, GO</h6>
							<h6>Maio - 2018</h6>
							<h6>Julho - 2018</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Porteiro Noturno</h4>
							<span>Organiza��o da guarita, fechamento dos port�es da garagem, abertura do port�o de entrada para
							moradores, documenta��o de rotina di�ria, recebimento de correspond�ncias e entrega
							das mesmas. Vigil�ncia de c�meras, entrega de recados e/ou utens�lios de moradores.</span>
						</div>						
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Hinode</h6>
							<h6>Goi�nia, GO</h6>
							<h6>Maio - 2016</h6>
							<h6>Julho - 2018</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Consultor Executivo</h4>
							<span>Vendas diretas de produtos, seja cosm�ticos, perfumes, shampoos, cremes corporais e faciais.</span>
						</div>						
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Universidade Salgado de Oliveira</h6>
							<h6>Goi�nia, GO</h6>
							<h6>Maio - 2014</h6>
							<h6>Maio - 2016</h6>
						</div>
						<div class="col-sm-9 col9">
							<h4><img src="assets/images/star.png"/>Assistente de Laborat�rio</h4>
							<span>Manuten��o de laborat�rios de inform�tica, formata��o de computadores, atendimento � alunos na matricula, no in�cio e fim de semestre.</span>
						</div>						
					</div>

				</div>
			</div> <!-- borda -->
		</div>
	</main>
	<section>
			<div class="row">
				<div class="col">
					<h6>Informa��o de Contato</h6>
				</div>
				<div class="col">
					<span>E-mail</span><br/>
					<span><?=$dadosObjPessoas['email'];?></span>
				</div>

				<div class="col">
					<p></p>
					<span>Endere�o</span><br/>
					<span><?=$dadosObjPessoas['endereco'];?></span>
				</div>
				<div class="col">
					<p></p>
					<span>Telefone</span><br/>
					<span style="font-size:10px;"><?=$dadosObjPessoas['telefone'];?></span>
				</div>
			</div>
			<div class="habilidades">
				<div class="hab-conteudo ">
					<h6>Habilidades</h6>
					<ul>
						<li><?=$habilidades[0]?></li>
						<li><?=$habilidades[1]?></li>
						<li><?=$habilidades[2]?></li>
						<li><?=$habilidades[3]?></li>
						<li><?=$habilidades[4]?></li>
						<li><?=$habilidades[5]?></li>
						<li><?=$habilidades[6]?></li>
						<li><?=$habilidades[7]?></li>
						<li><?=$habilidades[8]?></li>
						<li><?=$habilidades[9]?></li>
					</ul>
				</div>
				
			</div>	
	</section>
	<footer>
		<div class="separaDiv">
			
		</div>
		<div class="container">
			<h5><strong>Forma��o</strong></h5><br/>
			<div class="fotmargen">
				<div class="ConteudoExp">
					<div class="row">
						<div class="col-sm-3 col3" >
							<h6>Universidade Salgado de Oliveira</h6>
							<h6>Setor Sul, Goi�nia</h6>
							<h6>2016</h6>							
						</div>
						<div class="col-sm-9 col9">							
							<h4><img src="assets/images/star.png"/>Analise e Desenvolvimento de Sistemas</h4>
							<span>Curso PHP - Zero ao profissional - Professor Bonieky Lacerda(S�nior PHP) - (Cursando). Certificados j� adquiridos: Banco de dados(MySql) - 10 horas, Bootstrap B�sico - 10 horas, Fundamentos PHP - 20 horas, HTML5 e CSS3 - 20 horas, Javascript - 25 horas. M�dulos conclu�dos: 14 m�dulos, total de 405 aulas conclu�das.�</span>
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