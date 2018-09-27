<?php 

//require 'config.php';
class experiencia{
	private $pdo;
	private $priEmp;
	private $segEmp;
	private $terEmp;
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

	public function inserirPriEmp($priEmp){
		$this->cargo = $priEmp[0];
		$this->empresa = $priEmp[1];
		$this->cidade = $priEmp[2];
		$this->dataEnt = $priEmp[3];
		$this->dataSai = $priEmp[4];
		$this->descCargo = $priEmp[5];
		$this->priEmp = $priEmp;
	}

	public function inserirPriEmpBanco(){
		$sql = "INSERT INTO experiencia SET id_pessoa = ?, cargo = ?, descCargo = ?, empresa = ?, cidade = ?, dataEnt = ?, dataSai = ? ";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->id_pessoa, $this->cargo, $this->descCargo, $this->empresa, $this->cidade, $this->dataEnt, $this->dataSai));
		echo "Parabéns inserido primeira empresa com sucesso";
	}
	public function inserirSegEmp($segEmp){
		$this->cargo = $segEmp[0];
		$this->empresa = $segEmp[1];
		$this->cidade = $segEmp[2];
		$this->dataEnt = $segEmp[3];
		$this->dataSai = $segEmp[4];
		$this->descCargo = $segEmp[5];
		$this->segEmp = $segEmp;
	}
	public function inserirSegEmpBanco(){
		$sql = "INSERT INTO experiencia SET id_pessoa = ?, cargo = ?, descCargo = ?, empresa = ?, cidade = ?, dataEnt = ?, dataSai = ? ";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->id_pessoa, $this->cargo, $this->descCargo, $this->empresa, $this->cidade, $this->dataEnt, $this->dataSai));
		echo "Parabéns inserido segunda empresa com sucesso";
	}

	public function inserirTerEmp($terEmp){
		$this->cargo = $terEmp[0];
		$this->empresa = $terEmp[1];
		$this->cidade = $terEmp[2];
		$this->dataEnt = $terEmp[3];
		$this->dataSai = $terEmp[4];
		$this->descCargo = $terEmp[5];
		$this->terEmp = $terEmp;
	}
	public function inserirTerEmpBanco(){
		$sql = "INSERT INTO experiencia SET id_pessoa = ?, cargo = ?, descCargo = ?, empresa = ?, cidade = ?, dataEnt = ?, dataSai = ? ";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->id_pessoa, $this->cargo, $this->descCargo, $this->empresa, $this->cidade, $this->dataEnt, $this->dataSai));
		echo "Parabéns inserido terceira empresa com sucesso";
	}


	public function getPriEmp(){
		return $this->priEmp;
	}
	public function getSegEmp(){
		return $this->segEmp;
	}
	public function getTerEmp(){
		return $this->TerEmp;
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
	public function setPriEmp($new_priEmp){
		$this->priEmp = $new_priEmp;
	}
	public function setSegEmp($new_segEmp){
		$this->segEmp = $new_segEmp;
	}
	public function setTerEmp($new_terEmp){
		$this->terEmp = $new_terEmp;
	}

}

?>