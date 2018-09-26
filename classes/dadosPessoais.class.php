<?php 
//require 'config.php';
class dadosPessoais extends Banco{
	private $nome;
	private $email;
	private $endereco;
	private $telefone;
	private $descricao;
	private $habilidades;


	public function verificarEmail($ema){
		$sql = "SELECT * FROM pessoas WHERE email = :email";
		$sql = $this->getPdo()->prepare($sql);
		$sql->bindValue(':email', $ema);
		$sql->execute();

		if($sql->rowCount() > 0){
			return true;
		}else {
			return false;
		}
	}

	public function inserirDadosObj($new_nome, $new_email, $new_endereco,
	 $new_telefone, $new_objetivo, $new_todasHabili){

		$this->setNome($new_nome);
		$this->setEmail($new_email);
		$this->setEndereco($new_endereco);
		$this->setTelefone($new_telefone);
		$this->setDescricao($new_objetivo);
		$this->setHabilidades($new_todasHabili);
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

}
?>