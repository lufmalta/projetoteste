<?php
/* Developed by Luiz Fernando Malta Martins

/* Aqui esta a pagina do receberDados.php, onde pega os dados do index.php
/* e após isto serão inseridos na no arquivo class.curriculo.php, que é onde
/* armazenara todos estes dados, para depois inserir no banco de dados.
/* preciso chamar o banco de dados por aqui e depois enviar a variavel $pdo como
/* parâmetro para o construtor da classe curriculo.php

/* @author Luiz Fernando - lufmalta@gmail.com

*/



if(isset($_POST['nome']) && !empty($_POST['nome'])
 && (isset($_POST['email']) && !empty($_POST['email']))
  &&  (isset($_POST['endereco']) && !empty($_POST['endereco']))
    && (isset($_POST['telefone']) && !empty($_POST['telefone']))
	  && (isset($_POST['objetivo']) && !empty($_POST['objetivo']))){

	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);
	$endereco = addslashes($_POST['endereco']);
	$telefone = addslashes($_POST['telefone']);
	$objetivo = addslashes($_POST['objetivo']);

	for ($i=0; $i < 10; $i++) { 
		if($i == 0){
			$habilidades[$i] = addslashes($_POST[('habilidade1')]);
			//echo $habilidades[$i];
		}else {
			$habilidades[$i] = (addslashes(','.$_POST[('habilidade'.($i+1))]));
			//echo $habilidades[$i];
		}		
		
	}
	$todasHabili = '';
	//exit;
	for ($i=0; $i< 10; $i++) { 
		$todasHabili .= $habilidades[$i];
	}
	echo $todasHabili.'<br/>'.$nome.'<br/>'.$email.'<br/>'.$endereco.'<br/>'.$telefone.'<br/>'.$objetivo;


	// $dados = addslashes($_POST['habilidade1']).','.addslashes($_POST['habilidade2']).','.addslashes($_POST['habilidade3']).','.addslashes($_POST['habilidade4']).','.addslashes($_POST['habilidade5']).','.addslashes($_POST['habilidade6']).','.addslashes($_POST['habilidade7']).','.addslashes($_POST['habilidade8']).','.addslashes($_POST['habilidade9']).','.addslashes($_POST['habilidade10']);
	// echo $dados; //assim também funciona, mas do outro jeito usa menas linha de codigo, apesar do outro fazer mais execuções.


}else {
	header("Location: index.php");
	exit;
}



?>