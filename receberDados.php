<?php
/* Developed by Luiz Fernando Malta Martins

/* Aqui esta a pagina do receberDados.php, onde pega os dados do index.php
/* e após isto serão inseridos na no arquivo class.curriculo.php, que é onde
/* armazenara todos estes dados, para depois inserir no banco de dados.
/* preciso chamar o banco de dados por aqui e depois enviar a variavel $pdo como
/* parâmetro para o construtor da classe curriculo.php

/* @author Luiz Fernando - lufmalta@gmail.com

*/
$priEmp;
$segEmp;
$terEmp; 

for ($i=0; $i < 10 ; $i++) { 
	$habilidades[$i] = '';
}

// Primeiro verifica se esses valores foram setados e se não estao vazios
if(isset($_POST['nome']) && !empty($_POST['nome'])
 && (isset($_POST['email']) && !empty($_POST['email']))
  &&  (isset($_POST['endereco']) && !empty($_POST['endereco']))
    && (isset($_POST['telefone']) && !empty($_POST['telefone']))
	  && (isset($_POST['objetivo']) && !empty($_POST['objetivo']))){

	// Depois armazena os valores obrigatorios em variaveis

	// Dados Pessoais
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$endereco = addslashes($_POST['endereco']);
	$telefone = addslashes($_POST['telefone']);
	$objetivo = addslashes($_POST['objetivo']);


	// Experiência
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
	if($cargo[0] != '' && $empresa[0] != '' && $cidade[0] != '' && $dataEnt[0] != '' && $dataSai[0] != '' && $descCargo[0] != ''){

		$priEmp[0] = $cargo[0];
		$priEmp[1] = $empresa[0];
		$priEmp[2] = $cidade[0];
		$priEmp[3] = $dataEnt[0];
		$priEmp[4] = $dataSai[0];
		$priEmp[5] = $descCargo[0];

		// for ($i=0; $i < 6; $i++) {  //para visualizar os dados
		// 	echo $priEmp[$i].'<br/>';
		// }
	}else {
		echo "Algum campo da empresa 1 não foi preenchido";
		exit;
	}

	if($cargo[1] != '' && $empresa[1] != '' && $cidade[1] != '' && $dataEnt[1] != '' && $dataSai[1] != '' && $descCargo[1] != ''){

		$segEmp[0] = $cargo[1];
		$segEmp[1] = $empresa[1];
		$segEmp[2] = $cidade[1];
		$segEmp[3] = $dataEnt[1];
		$segEmp[4] = $dataSai[1];
		$segEmp[5] = $descCargo[1];

		// for ($i=0; $i < 6; $i++) { //para visualizar os dados
		// 	echo $segEmp[$i].'<br/>';
		// }
	}else {
		echo "Algum campo da empresa 2 não foi preenchido";
	}

	if($cargo[2] != '' && $empresa[2] != '' && $cidade[2] != '' && $dataEnt[2] != '' && $dataSai[2] != '' && $descCargo[2] != ''){

		$terEmp[0] = $cargo[2];
		$terEmp[1] = $empresa[2];
		$terEmp[2] = $cidade[2];
		$terEmp[3] = $dataEnt[2];
		$terEmp[4] = $dataSai[2];
		$terEmp[5] = $descCargo[2];

		// for ($i=0; $i < 6; $i++) { //para visualizar os dados
		// 	echo $terEmp[$i].'<br/>';
		// }
	}else {
		echo "Algum campo da empresa 3 não foi preenchido";
		exit;
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
	
	$valorMin = 10;
	$todasHabili = '';
	//Dentro desse for ira pegar as habilidades no array e colocar todas em uma só variavel, separando elas por uma vírgula.

	for ($i=0; $i< 10; $i++) { 
		if($habilidades[$i] == ''){
			$todasHabili = $todasHabili.',VAZIO'.$habilidades[$i];
		}else{
			$todasHabili = $todasHabili.','.$habilidades[$i];
		}
		
	}


	echo $todasHabili.'<br/>'.$nome.'<br/>'.$email.'<br/>'.$endereco.'<br/>'.$telefone.'<br/>'.$objetivo;


	// $dados = addslashes($_POST['habilidade1']).','.addslashes($_POST['habilidade2']).','.addslashes($_POST['habilidade3']).','.addslashes($_POST['habilidade4']).','.addslashes($_POST['habilidade5']).','.addslashes($_POST['habilidade6']).','.addslashes($_POST['habilidade7']).','.addslashes($_POST['habilidade8']).','.addslashes($_POST['habilidade9']).','.addslashes($_POST['habilidade10']);
	// echo $dados; //assim também funciona, mas do outro jeito usa menas linha de codigo, apesar do outro fazer mais execuções.


// Esse else é referente ao primeiro if que valida se tem os campos obrigatorios
}else {
	header("Location: index.php");
	exit;
}



?>