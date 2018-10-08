<?php
require "classes/dadosPessoais.class.php";
session_start();
if(!empty($_SESSION['logado'])){
	
}else {
	header("Location: index.php");
	exit;
}
$dado = '';
$dadoAlt = '';
$dadosPessoais = new dadosPessoais();

if(isset($_POST['nome']) && !empty($_POST['nome'])){
	$dado = addslashes($_POST['nome']);
	$dadoAlt = "nome"; 
	$dadosPessoais->setNome($dado);
}else if(isset($_POST['objPro']) && !empty($_POST['objPro'])){
	$dado = addslashes($_POST['objPro']);
	$dadoAlt = "descricao";
	$dadosPessoais->setDescricao($dado);
}else if(isset($_POST['endereco']) && !empty($_POST['endereco'])){
	$dado = addslashes($_POST['endereco']);
	$dadoAlt = "endereco";
	$dadosPessoais->setEndereco($dado);
}else if(isset($_POST['telefone']) && !empty($_POST['telefone'])){
	$dado = addslashes($_POST['telefone']);
	$dadoAlt = "telefone";
	$dadosPessoais->setTelefone($dado);
}else{
	
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
	$dado = $todasHabili;
	$dadoAlt = "habilidades";
	$dadosPessoais->setHabilidades($dado);
	
}
	



$email = addslashes($_SESSION['logado']);
if($dado != '' && $dadoAlt != ''){
	$dadosPessoais->alterarDadoBanco($dadoAlt, $email);


}else {
	header("Location: index.php");
	exit;
}
//$dadosPessoais->altDadosBanco();

?>