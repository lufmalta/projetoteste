<?php


/* Developed by Luiz Fernando Malta Martins

/* Aqui esta a pagina do receberDados.php, onde pega os dados do index.php
/* e após isto serão inseridos na no arquivo class.curriculo.php, que é onde
/* armazenara todos estes dados, para depois inserir no banco de dados.
/* preciso chamar o banco de dados por aqui e depois enviar a variavel $pdo como
/* parâmetro para o construtor da classe curriculo.php

/* @author Luiz Fernando - lufmalta@gmail.com

*/



require "../Model/classes/dadosPessoais.class.php";
require '../Model/classes/experiencia.class.php';
require '../Model/classes/educacao.class.php';


$qtEmp = 0;
$priEmp = ''; //define a primeira empresa onde ira colocar o array
$segEmp = ''; //define a segunda empresa onde ira colocar o array
$terEmp = ''; //define a terceira empresa onde ira colocar o array


//(isset($_POST['nome']) && !empty($_POST['nome'])
// Primeiro verifica se esses valores foram setados e se não estao vazios
if (isset($_POST['email']) && !empty($_POST['email'])
  &&  (isset($_POST['endereco']) && !empty($_POST['endereco']))
    && (isset($_POST['telefone']) && !empty($_POST['telefone']))
    	&& (isset($_POST['formacao']) && !empty($_POST['formacao']))
    		&& (isset($_POST['instituicao']) && !empty($_POST['instituicao']))
    			&& (isset($_POST['instituCidade']) && !empty($_POST['instituCidade']))
    				&& (isset($_POST['anoConcl']) && !empty($_POST['anoConcl']))
	  				&& (isset($_POST['objetivo']) && !empty($_POST['objetivo']))){

	// Depois armazena os valores obrigatorios em variaveis
	// DADOS PESSOAIS / EDUCACAO - armazenando os dados em variaveis
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$endereco = addslashes($_POST['endereco']);
	$telefone = addslashes($_POST['telefone']);
	$objetivo = addslashes($_POST['objetivo']);
	$formacao = addslashes($_POST['formacao']);
	$instituicao = addslashes($_POST['instituicao']);
	$instituCidade = addslashes($_POST['instituCidade']);
	$anoConcl = addslashes($_POST['anoConcl']);
	$cursos = '';
	$img = '';

	if(isset($_POST['cursos']) && !empty($_POST['cursos'])){
		$cursos = addslashes($_POST['cursos']);
	}




	


	// DADOS PESSOAIS - HABILIDADES
	for ($i=0; $i < 10 ; $i++) { 
	$habilidades[$i] = '';
	}
	//Dentro do for ira pegar todas as habilidades e colocar em um array
	for ($i=0; $i < 10; $i++) { 
		if($i == 0){
			if(($_POST['habilidade1'] == '')){
				
			}else {
				$habilidades[$i] = addslashes($_POST[('habilidade1')]);
			}
			
			//echo $habilidades[$i];
		}else {
			if($_POST[('habilidade'.($i+1))] == '') {
				
			}else {				
				$habilidades[$i] = (addslashes($_POST[('habilidade'.($i+1))]));
			}
			
			//echo $habilidades[$i];
		}	

		//echo $habilidades[0];
	}
	
	$todasHabili = '';
	//Dentro desse for ira pegar as habilidades no array e colocar todas em uma só variavel, separando elas por uma vírgula.

	for ($i=0; $i< 10; $i++) { 
		if($habilidades[$i] == ''){
			if($i == 0){
				$todasHabili = $todasHabili.'VAZIO';//.$habilidades[$i];
			}else{
				$todasHabili = $todasHabili.',VAZIO';//.$habilidades[$i];
			}
			
		}else{
			if($i == 0){
				$todasHabili = $todasHabili.$habilidades[$i];
			}else {
				$todasHabili = $todasHabili.','.$habilidades[$i];
			}
			
		}
		
	}



	//FIM DADOS PESSOAIS


	// EXPERIÊNCIA

	$cargo[0] = addslashes($_POST['cargo1']);
	$cargo[1] = addslashes($_POST['cargo2']);
	$cargo[2] = addslashes($_POST['cargo3']);

	$empresa[0] = addslashes($_POST['empresa1']);
	$empresa[1] = addslashes($_POST['empresa2']);;
	$empresa[2] = addslashes($_POST['empresa3']);;

	$cidade[0] = addslashes($_POST['cidade1']);
	$cidade[1] = addslashes($_POST['cidade2']);;
	$cidade[2] = addslashes($_POST['cidade3']);;

	$dataEnt[0] = addslashes($_POST['dataEnt1']);
	$dataEnt[1] = addslashes($_POST['dataEnt2']);;
	$dataEnt[2] = addslashes($_POST['dataEnt3']);;

	$dataSai[0] = addslashes($_POST['dataSai1']);
	$dataSai[1] = addslashes($_POST['dataSai2']);;
	$dataSai[2] = addslashes($_POST['dataSai3']);;

	$descCargo[0] = addslashes($_POST['descCargo1']);
	$descCargo[1] = addslashes($_POST['descCargo2']);;
	$descCargo[2] = addslashes($_POST['descCargo3']);;



	// Nesse if ira verificar se todos os valores da primeira empresa foram preenchidos, caso não sejam, então priEmp vai ficar vazia.
	if($cargo[0] != '' && $empresa[0] != '' && $cidade[0] != '' && $dataEnt[0] != '' && 
		$dataSai[0] != '' && $descCargo[0] != ''){

		$priEmp[0] = $cargo[0];
		$priEmp[1] = $empresa[0];
		$priEmp[2] = $cidade[0];
		$priEmp[3] = $dataEnt[0];
		$priEmp[4] = $dataSai[0];
		$priEmp[5] = $descCargo[0];

	}else {
		// echo "Algum campo da empresa 1 não foi preenchido";
		
	}

	if($cargo[1] != '' && $empresa[1] != '' && $cidade[1] != '' && $dataEnt[1] != '' && $dataSai[1] != '' && $descCargo[1] != ''){

		$segEmp[0] = $cargo[1];
		$segEmp[1] = $empresa[1];
		$segEmp[2] = $cidade[1];
		$segEmp[3] = $dataEnt[1];
		$segEmp[4] = $dataSai[1];
		$segEmp[5] = $descCargo[1];

	}else {
		// echo "Algum campo da empresa 2 não foi preenchido";
	}

	if($cargo[2] != '' && $empresa[2] != '' && $cidade[2] != '' && $dataEnt[2] != '' && $dataSai[2] != '' && $descCargo[2] != ''){

		$terEmp[0] = $cargo[2];
		$terEmp[1] = $empresa[2];
		$terEmp[2] = $cidade[2];
		$terEmp[3] = $dataEnt[2];
		$terEmp[4] = $dataSai[2];
		$terEmp[5] = $descCargo[2];

	}else {
		// echo "Algum campo da empresa 3 não foi preenchido";
	}

	//FIM EXPERIÊNCIA












	//Inserindo dados pessoais na classe dadosPessoais

	// Criando uma instancia da classe dadosPessoais e enviando como parâmetro a conexão com o banco '$pdo'

	// Primeira etapa - chama um objeto da classe dadosPessoais
	$dadosPessoais = new dadosPessoais();
	//$experiencia = new experiencia();

	//Aqui dentro, primeiro ira verificar se existe o email, caso não exista, então ira fazer a inserção tanto na classe como no banco dos dadosPessoais, Depois dos dados de Experiencia, e por último dos dados de Educação.
	if($dadosPessoais->verificarEmail($email) == false){ // Caso não exista este email no banco, ele ira entrar aqui

		
		//insere os dados no objeto de dadosPessoais
		$dadosPessoais->inserirDadosObjPessoa($nome, $email, $endereco, $telefone, $objetivo,
		 $todasHabili, $img);
		//$dadosPessoais->listarDados();

		// Depois insere no banco de dados de Pessoas e pega o id_pessoa

		$dadosPessoais->inserirDadosBanco();
		$id_pessoa = $dadosPessoais->getId_Pessoa();
		//$_SESSION['dadosPessoais'] = $dadosPessoais->getNome();


		// Segunda etapa - chama um objeto da classe experiencia
		$experiencia = new Experiencia($id_pessoa);

		

			if(!empty($priEmp)){
				$experiencia->inserirEmpObj($priEmp);
				$experiencia->inserirEmpObjBanco();
				$qtEmp += 1;
				}//fim if priEmp
			// verifica se a segEmp tem dados, caso tenha, insere eles.
			if(!empty($segEmp)){
				$experiencia->inserirEmpObj($segEmp);
				$experiencia->inserirEmpObjBanco();
				$qtEmp += 1;
				}//fim if segEmp
			// verifica se a terEmp tem dados, caso tenha, insere eles.
			if(!empty($terEmp)){
				$experiencia->inserirEmpObj($terEmp);
				$experiencia->inserirEmpObjBanco();
				$qtEmp += 1;
				}//fim if terEmp

		// verifica se a priEmp tem dados, caso tenha, insere eles.

		// Terceira etapa - chama um objeto da classe educação
		$educacao = new Educacao($id_pessoa);	
		$educacao->inserirEducacaoObj($formacao, $instituicao, $instituCidade,
		 $anoConcl, $cursos);	
		$educacao->inserirEducacaoObjBanco();



		//Guarda aqui as instancias desses objetos e depois redireciona para o curriculo.php
		$_SESSION['dadosPessoais'] = $dadosPessoais->pegarDados();
		if($experiencia->getDadosEmpresa() == ''){
			$_SESSION['experiencia'] = '';
		}else {
			$_SESSION['experiencia'] = $qtEmp;
		}
		$_SESSION['educacao'] = $educacao->getDadosEdu();
		header("Location: ../View/curriculo.php");
		exit;


	}else {
		$erro = "Ja existe cadastro no banco, faça seu login.";
		//$_SESSION['invalido'] = "Ja existe cadastro no banco, faça seu login."; // se existir este email , significa que existe o cadastro, entao avisa o usuario que ja existe este curriculo no banco.

	}



// Esse else é referente ao primeiro if que valida se tem os campos obrigatorios
}else {
	header("Location: ../View/index.php");
}



