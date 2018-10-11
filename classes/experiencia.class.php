<?php 
/* Developed by Luiz Fernando Malta Martins

/* Aqui esta o arquivo da classe experiencia.class.php, nesta classe pega-se os dados
/* de experiencia da pessoa, no caso os cargos que ele trabalhou, a empresa, entre outros
/* dados que tem na empresa.

/* @author Luiz Fernando - lufmalta@gmail.com

*/




require_once 'config.php';// DADOS TESTE BANCO
class Experiencia{
	private $pdo;
	private $dadosEmpresa;
	private $id_exp;
	private $id_pessoa; //primeira coisa a ser setada é essa.
	private $cargo;
	private $descCargo;
	private $empresa;
	private $cidade;
	private $dataEnt;
	private $dataSai;

	public function __construct($new_id_pessoa){
		$this->id_pessoa = $new_id_pessoa;
		$this->pdo = '';
		$this->dadosEmpresa = '';
	}
	// public function inserirDadosObjExp($new_priEmp){
	// 	$this->setPriEmp($new_priEmp);
	// 	$this->setSegEmp($new_segEmp);
	// 	$this->setTerEmp($new_terEmp);
	// }

	public function inserirEmpObj($new_dadosEmpresa){
		$this->cargo = $new_dadosEmpresa[0];
		$this->empresa = $new_dadosEmpresa[1];
		$this->cidade = $new_dadosEmpresa[2];
		//Cria uma variável para guardar a data que esta em d/m/Y e mudar para padrao americano que é Y/m/d
		$dataEntEmEUA = explode("/", $new_dadosEmpresa[3]);
		$this->dataEnt = $dataEntEmEUA[2]."/".$dataEntEmEUA[1]."/".$dataEntEmEUA[0];
		$dataSaiEmEUA = explode("/", $new_dadosEmpresa[4]);
		$this->dataSai = $dataSaiEmEUA[2]."/".$dataSaiEmEUA[1]."/".$dataSaiEmEUA[0];
		$this->descCargo = $new_dadosEmpresa[5];
		$this->dadosEmpresa = $new_dadosEmpresa;
	}

	public function inserirEmpObjBanco(){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$this->dadosEmpresa[6] = $this->getId_Pessoa(); // insere o id da pessoa nos dadosEmpresa
		$sql = "INSERT INTO experiencia SET id_pessoa = ?, cargo = ?, descCargo = ?, empresa = ?, cidade = ?, dataEnt = ?, dataSai = ? ";
		$sql = $pdo->prepare($sql);
		$sql->execute(array($this->getId_Pessoa(), $this->getCargo(), $this->getDescCargo(), $this->getEmpresa(), $this->getCidade(), $this->getDataEnt(), $this->getDataSai()));
		
		// $sql->fetch();
		// $sql = $sql['cargo'];
		
		echo "Parabéns inserido empresa com sucesso!".'<br/>';
		$this->pdo = $pdo;
		$this->pegarIDExp($this->getCargo(), $this->getId_Pessoa(), $pdo);// pega o cargo, para fazer a consulta no banco do id_exp
	}
	public function qtExp(){
		$con = new Banco();
		$sql = "SELECT * FROM experiencia WHERE id_pessoa = :id_pessoa";
		$pdo = $con->conectar($this->pdo);
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->execute();
		if($sql->rowCount() > 0){
			return $sql->rowCount();
		}
	}
	public function pegarExp(){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM experiencia WHERE id_pessoa = :id_pessoa ORDER BY id_exp DESC";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->execute();

		if($sql->rowCount() > 0){
			$qt = $sql->rowCount(); // aqui coloca o numero de linhas encontradas.
			$qt--; // aqui subtrai por 1, porque o array começa na posição 0 e não na 1.
			$arrayEmp = array($qt); // aqui seja um array com o numero de empresas no banco dessa pessoa.
			$i = $qt; // aqui o $i recebe esse numero de empresas;
			//Dentro desse foreach, ira pegar o arrayEmp na posição final, pode ser nesse caso 2 a posiçao final, e insere dentro dele os dados dessa empresa, logo, diminui 1 do $i, para pegar o proximo dado da empresa e colocar dentro do arrayEmp na posição debaixo.
			foreach($sql->fetchAll() as $empresas){
				$arrayEmp[$i] = $empresas;
				$i--;
			}
			return $arrayEmp;
		}
	}
	public function deletarExp($expAtual){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "DELETE FROM experiencia WHERE id_exp = :id_exp AND id_pessoa = :id_pessoa";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_exp", $expAtual);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->execute();

	}
	public function editarExp($expAtual){
	 	$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "UPDATE experiencia SET cargo = :cargo, empresa = :empresa, cidade = :cidade, dataEnt = :dataEnt, dataSai = :dataSai, descCargo = :descCargo
			 WHERE id_exp = :id_exp AND id_pessoa = :id_pessoa";
		$sql = $pdo->prepare($sql);	 
		$sql->bindValue(":cargo", $this->getCargo());
		$sql->bindValue(":empresa", $this->getEmpresa());	
		$sql->bindValue(":cidade", $this->getCidade());
		$sql->bindValue(":dataEnt", $this->getDataEnt());
		$sql->bindValue(":dataSai", $this->getDataSai());
		$sql->bindValue(":descCargo", $this->getDescCargo());
		$sql->bindValue(":id_exp", $expAtual);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->execute();

	}
	public function getDadosEmpresa(){
		return $this->dadosEmpresa;
	}
	public function getId_Pessoa(){
		return $this->id_pessoa;
	}
	public function getCargo(){
		return $this->cargo;
	}
	public function getDescCargo(){
		return $this->descCargo;
	}
	public function getEmpresa(){
		return $this->empresa;
	}
	public function getCidade(){
		return $this->cidade;
	}
	public function getDataEnt(){
		return $this->dataEnt;
	}
	public function getDataSai(){
		return $this->dataSai;
	}
	public function setDadosEmpresa($new_dadosEmpresa){
		$this->dadosEmpresa = $new_dadosEmpresa;
	}
	
	private function pegarIDExp($cargo, $id_pessoa, $pdo){
		$sql = "SELECT id_exp FROM experiencia WHERE cargo = :cargo AND id_pessoa = :id_pessoa";
		$sql = $pdo->prepare($sql);
		$sql->bindParam(":cargo", $cargo);
		$sql->bindValue(":id_pessoa", $id_pessoa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$this->id_exp = $sql['id_exp'];
		}


	}

}

