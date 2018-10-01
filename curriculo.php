<?php 

/* Developed by Luiz Fernando Malta Martins

/* Aqui esta a pagina do curriculo.php, onde será gerado um curriculo para imprimir
/* ou baixar

/* @author Luiz Fernando - lufmalta@gmail.com

*/

session_start();
if(empty($_SESSION['logado'])){
	header("Location: index.php");
}
$email = $_SESSION['logado'];
?>





<!DOCTYPE html>
<html>
<head>
	<title>Developed by Luiz Fernando Malta Martins</title>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
	<link 	rel="stylesheet" type="text/css" href="assets/css/bootstrap4-css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">


</head>
<body >
	<header>
		<div class="container">
			<div id="areaObj">
				<h2><img src="assets/images/foto perfil.jpg" height="150"/>Luiz Fernando Malta Martins</h2><br/>
				<h4>Desenvolvedor web front-end, desenvolvedor web back-end. Procuro me ingressar no
				mercado de trabalho em alguma empresa de desenvolvimento de software, e/ou, que possua
				desenvolvedores de software.</h4>	
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
					<span>lufmalta@gmail.com</span>
				</div>

				<div class="col">
					<p></p>
					<span>Endereço</span><br/>
					<span>Rua u-53, lote 10, casa 2, Setor Vila União</span>
				</div>
				<div class="col">
					<p></p>
					<span>Telefone</span><br/>
					<span>+(55) (62) 982396838</span>
				</div>
			</div>
			<div class="habilidades">
				<div class="hab-conteudo ">
					<h6>Habilidades</h6>
					<ul>
						<li>Desenvolvedor web - Junior</li>
						<li>PHP - Orientação à Objetos</li>
						<li>HTML - HTML5</li>
						<li>CSS - CSS3</li>
						<li>Bootstrap 3</li>
						<li>Bootstrap 4</li>
						<li>jQuery</li>
						<li>Javascript</li>
						<li>Git - Versionamento de código</li>
						<li>Banco de dados(MySql)</li>
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