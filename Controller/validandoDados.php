<?php

require '../Model/classes/experiencia.class.php';
//Caso a pessoa esteja logada, entrará aqui
if(!empty($_SESSION['logado'])){
	$email = $_SESSION['logado'];
	$dadosPessoais = new dadosPessoais();
	if($dadosPessoais->verificarEmail($email) == true){
		$dadosPessoais = $dadosPessoais->pegarDadosPessoaisBanco($email);
		$id_pessoa = $dadosPessoais['id_pessoa'];
		if($dadosPessoais['img'] != ''){
			$img = $dadosPessoais['img'];
		}else {
			$img = '';
		}
		$experiencia = new Experiencia($id_pessoa);
		$habilidades = explode (',', $dadosPessoais['habilidades'] );
		$qtHab = count($habilidades);
		$novasHab = "";
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
		$qtNovasHab = count($novasHab);
		$qtNovasHab = $qtNovasHab - 1;
		require "../Model/classes/educacao.class.php";
		$educacao = new Educacao($id_pessoa);
		$qtEdu = $educacao->qtEdu();
		$qtEdu--;

	}

	//Com o email, aqui ira fazer o preenchimento dos dados para inserir no curriculo.



// Caso contrario, se os dados de educacao e dadosPessoais estiverem preenchidos, entre aqui.	
}else if(!empty($_SESSION['educacao']) && !empty($_SESSION['dadosPessoais'])){
		//recebe os dados do objeto de educacao
		$educacao = $_SESSION['educacao']; 
		//$qtEdu = 0;
		//recebe os dados do objeto de dadosPessoais
		$dadosPessoais = $_SESSION['dadosPessoais'];
		$img = '';
		$img = $dadosPessoais['img'];
		$qtEdu = -1;
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
			//require 'classes/experiencia.class.php';
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
	header("Location: ../View/index.php");
	exit;
}
		
		


	
	
?>