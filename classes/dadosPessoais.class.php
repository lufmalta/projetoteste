<?php
/* Developed by Luiz Fernando Malta Martins

/* Aqui esta o arquivo da classe dadosPesssoas.class.php, onde ira guardar todos os dados pessoais da pessoa, logo ira inserir no banco de dados, e guardar o id_pessoa, para depois as outras classes inserirem os dados no banco com o id_pessoa dessa classe.

/* @author Luiz Fernando - lufmalta@gmail.com

*/ 

//require 'config.php';
class dadosPessoais{
	private $pdo;
	private $id_pessoa;
	private $nome;
	private $email;
	private $endereco;
	private $telefone;
	private $descricao;
	private $habilidades;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function verificarEmail($ema){
		$sql = "SELECT * FROM pessoas WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':email', $ema);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else {
			return false;
		}
	}

	//aqui insere os dados nesse objeto
	public function inserirDadosObjPessoa($new_nome, $new_email, $new_endereco,
	 $new_telefone, $new_objetivo, $new_todasHabili){


		$this->setNome($new_nome);
		$this->setEmail($new_email);
		$this->setEndereco($new_endereco);
		$this->setTelefone($new_telefone);
		$this->setDescricao($new_objetivo);
		$this->setHabilidades($new_todasHabili);
	}

	//aqui insere os dados no banco de dados.
	public function inserirDadosBanco(){
	  	
	  	$sql = "INSERT INTO pessoas SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone, descricao = :descricao, habilidades = :habilidades ";
	  	$sql = $this->pdo->prepare($sql);
	  	$sql->bindValue(":nome", $this->getNome());
	  	$sql->bindValue(":email", $this->getEmail());
	  	$sql->bindValue(":endereco", $this->getEndereco());
	  	$sql->bindValue(":telefone", $this->getTelefone());
	  	$sql->bindValue(":descricao", $this->getDescricao());
	  	$sql->bindValue(":habilidades", $this->getHabilidades());
	  	$sql->execute();	  	

	  	$this->pegarID($this->getEmail());



	}

	public function listarDados(){
		echo $this->getNome().'<br/>'.
		$this->getEmail().'<br/>'.
		$this->getEndereco().'<br/>'.
		$this->getTelefone().'<br/>'.
		$this->getDescricao().'<br/>'.
		$this->getHabilidades();
	}

	public function getNome(){
		return $this->nome;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getEndereco(){
		return $this->endereco;
	}
	public function getTelefone(){
		return $this->telefone;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function getHabilidades(){
		return $this->habilidades;
	}
	public function getId_Pessoa(){
		return $this->id_pessoa;
	}
	public function setNome($novo_nome){
		$this->nome = $novo_nome;
	}
	public function setEmail($novo_email){
		$this->email = $novo_email;
	}
	public function setEndereco($novo_endereco){
		$this->endereco = $novo_endereco;
	}
	public function setTelefone($novo_telefone){
		$this->telefone = $novo_telefone;
	}
	public function setDescricao($nova_descricao){
		$this->descricao = $nova_descricao;
	}
	public function setHabilidades($nova_habilidades){
		$this->habilidades = $nova_habilidades;
	}

	private function pegarID($email){

		$sql = "SELECT id_pessoa FROM pessoas WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			$this->id_pessoa = $sql['id_pessoa'];
			//echo $this->id_pessoa; 

		}
	}

}
?>