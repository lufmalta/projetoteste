<?php
/* Developed by Luiz Fernando Malta Martins

/* Aqui esta o arquivo da classe dadosPesssoas.class.php, onde ira guardar todos os dados pessoais da pessoa, logo ira inserir no banco de dados, e guardar o id_pessoa, para depois as outras classes inserirem os dados no banco com o id_pessoa dessa classe.

/* @author Luiz Fernando - lufmalta@gmail.com

*/ 
require_once 'config.php'; // DADOS TESTE BANCO
class dadosPessoais{
	private $pdo;
	private $id_pessoa;
	private $nome;
	private $email;
	private $endereco;
	private $telefone;
	private $descricao;
	private $habilidades;
	private $dados;
	private $img;

	public function __construct(){
		$this->pdo = '';
		$this->dados = '';
		$this->img = '';
	}

	public function verificarEmail($ema){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM pessoas WHERE email = :email";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':email', $ema);
		$sql->execute();
		$this->pdo = $pdo;

		if($sql->rowCount() > 0){			
			return true;
		}else {
			return false;
		}
	}

	//aqui insere os dados nesse objeto
	public function inserirDadosObjPessoa($new_nome, $new_email, $new_endereco,
	 $new_telefone, $new_objetivo, $new_todasHabili, $new_img){
		$this->setNome($new_nome);
		$this->setEmail($new_email);
		$this->setEndereco($new_endereco);
		$this->setTelefone($new_telefone);
		$this->setDescricao($new_objetivo);
		$this->setHabilidades($new_todasHabili); 
		$this->setImg($new_img);
	}

	//aqui insere os dados no banco de dados.
	public function inserirDadosBanco(){
	  	$sql = "INSERT INTO pessoas SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone, descricao = :descricao, habilidades = :habilidades, img = :img ";
	  	$sql = $this->pdo->prepare($sql);
	  	$sql->bindValue(":nome", $this->getNome());
	  	$sql->bindValue(":email", $this->getEmail());
	  	$sql->bindValue(":endereco", $this->getEndereco());
	  	$sql->bindValue(":telefone", $this->getTelefone());
	  	$sql->bindValue(":descricao", $this->getDescricao());
	  	$sql->bindValue(":habilidades", $this->getHabilidades());
	  	$sql->bindValue(":img", $this->getImg());
	  	$sql->execute();	  	

	  	$this->pegarID($this->getEmail());
	}
	public function inserirBancoEmail(){
		$sql = "INSERT INTO pessoas SET email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $this->getEmail());
		$sql->execute();
	}
	public function pegarDadosPessoaisBanco($buscar_email){
		$sql = "SELECT * FROM pessoas WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email" , $buscar_email);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			return $sql;
		}

	}
	//nessa funcao ele pega o dado que sera alterado no banco e altera com o dado que ja esta dentro do objeto.
	public function alterarDadoBanco($dadoBanco, $email){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		if($dadoBanco == 'nome'){
			$dado = $this->getNome();
		}else if($dadoBanco == 'descricao'){
			$dado = $this->getDescricao();
		}else if($dadoBanco == 'endereco'){
			$dado = $this->getEndereco();
		}else if($dadoBanco == 'telefone'){
			$dado = $this->getTelefone();
		}else if($dadoBanco == 'habilidades'){
			$dado = $this->getHabilidades();
		}
		$sql = "UPDATE pessoas SET $dadoBanco = :dado WHERE email = :email";
		$sql = $pdo->prepare($sql);
		//$sql->bindValue(":dadoBanco", $dadoBanco);
		$sql->bindValue(":dado", $dado);
		$sql->bindValue(":email", $email);
		$sql->execute();
		$this->pdo = $pdo;
		header("Location: ../View/index.php");
		exit;

	}
	public function listarDados(){
		$this->getNome().'<br/>'.
		$this->getEmail().'<br/>'.
		$this->getEndereco().'<br/>'.
		$this->getTelefone().'<br/>'.
		$this->getDescricao().'<br/>'.
		$this->getHabilidades();
	}

	public function pegarIDBanco($email){
		$sql = "SELECT id_pessoa FROM pessoas WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch(); // futaramente posso colocar um fetchAll para pegar todos os dados que tiverem esse email, para no caso de ter como no sistema mudar o email da pessoa, e depois fazer uma comparaçao de onde o email for = email e id_pessoa for = id_pessoa, assim não ira gerar conflito entre as pesssoas que acessarem com emails iguais.
			$dado = $sql['id_pessoa'];
			return $dado;
		}
	}
	public function pegarDados(){
		return $this->dados;
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
	public function getImg(){
		return $this->img;
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
	public function setImg($new_img){
		$this->img = $new_img;
	}

	private function pegarID($email){

		$sql = "SELECT id_pessoa FROM pessoas WHERE email = :email";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":email", $email);
		$sql->execute();

		if($sql->rowCount() > 0){

			$sql = $sql->fetch();
			$this->id_pessoa = $sql['id_pessoa'];
			$dadosarray = array(
				'id_pessoa' => $sql['id_pessoa'],
				'nome' => $this->getNome(),
				'email' => $this->getEmail(),
				'endereco' => $this->getEndereco(),
				'telefone' => $this->getTelefone(),
				'descricao' => $this->getDescricao(),
				'habilidades' => $this->getHabilidades(),
				'img' => $this->getImg()
			 );
			$this->dados = $dadosarray;
			//echo $this->id_pessoa; 

		}
	}

}
?>