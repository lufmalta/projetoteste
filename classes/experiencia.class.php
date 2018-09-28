<?php 

//require 'config.php';
class experiencia{
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

	public function __construct($new_id_pessoa, $pdo){
		$this->id_pessoa = $new_id_pessoa;
		$this->pdo = $pdo;
	}
	// public function inserirDadosObjExp($new_priEmp){
	// 	$this->setPriEmp($new_priEmp);
	// 	$this->setSegEmp($new_segEmp);
	// 	$this->setTerEmp($new_terEmp);
	// }

	public function inserirEmp($new_dadosEmpresa){
		$this->cargo = $new_dadosEmpresa[0];
		$this->empresa = $new_dadosEmpresa[1];
		$this->cidade = $new_dadosEmpresa[2];
		$this->dataEnt = $new_dadosEmpresa[3];
		$this->dataSai = $new_dadosEmpresa[4];
		$this->descCargo = $new_dadosEmpresa[5];
		$this->dadosEmpresa = $new_dadosEmpresa;
	}

	public function inserirEmpBanco(){
		$sql = "INSERT INTO experiencia SET id_pessoa = ?, cargo = ?, descCargo = ?, empresa = ?, cidade = ?, dataEnt = ?, dataSai = ? ";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->id_pessoa, $this->cargo, $this->descCargo, $this->empresa, $this->cidade, $this->dataEnt, $this->dataSai));
		$this->dadosEmpresa[6] = $this->id_pessoa; // insere o id da pessoa nos dadosEmpresa
		// $sql->fetch();
		// $sql = $sql['cargo'];
		
		echo "Parabéns inserido empresa com sucesso!".'<br/>';
		$this->pegarIDExp($this->getCargo(), $this->getId_Pessoa());// pega o cargo, para fazer a consulta no banco do id_exp
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
	
	private function pegarIDExp($cargo, $id_pessoa){
		$sql = "SELECT id_exp FROM experiencia WHERE cargo = :cargo AND id_pessoa = :id_pessoa";
		$sql = $this->pdo->prepare($sql);
		$sql->bindParam(":cargo", $cargo);
		$sql->bindValue(":id_pessoa", $id_pessoa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$this->id_exp = $sql['id_exp'];
		}


	}

}

?>