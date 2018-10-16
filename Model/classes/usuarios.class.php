<?php 
require_once 'config.php';
class usuarios{
	private $pdo;
	private $id_usuario;
	private $id_pessoa;
	private $usuario;
	private $senha;

	public function __construct(){
		$this->pdo = '';
	}

	public function verificarExisteUsuario($new_usuario){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM usuarios WHERE usuario = :usuario";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':usuario', $new_usuario);
		$sql->execute();
		$this->pdo = $pdo;

		if($sql->rowCount() > 0){
			//session_start();
			$sql = $sql->fetch();
			$_SESSION['id_user'] = $sql['id_usuario'];
			return true;
		}else {
			return false;
		}
	}

	public function verificarUsuSenha($new_usuario, $new_senha){
		//$con = new Banco();
		//$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM usuarios WHERE usuario = :usuario and senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':usuario', $new_usuario);
		$sql->bindValue(':senha', $new_senha);
		$sql->execute();
		//$this->pdo = $pdo;

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			session_start();
			$_SESSION['logado'] = $sql['usuario'];
			return true;
		}else {
			return false;
		}
	}

	public function inserirDadosObj($new_id_pessoa, $new_usuario, $new_senha){
		$this->setId_Pessoa($new_id_pessoa);
		$this->setUsuario($new_usuario);
		$this->setSenha($new_senha);
	}
	public function inserirObjBanco(){
		$sql = "INSERT INTO usuarios SET id_pessoa = :id_pessoa, usuario = :usuario, senha = :senha";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->bindValue(":usuario", $this->getUsuario());
		$sql->bindValue("senha", $this->getSenha());
		$sql->execute();
		header("Location: ../View/index.php");
		exit;
	}
	public function mudarSenha($id_user, $senha){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "UPDATE usuarios SET senha = :senha WHERE id_usuario = :id_usuario";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":senha", md5($senha));
		$sql->bindValue(":id_usuario", $id_user);
		$sql->execute();
	}
	public function setId_Pessoa($new_id_pessoa){
		$this->id_pessoa = $new_id_pessoa;
	}
	public function setUsuario($new_usuario){
		$this->usuario = $new_usuario;
	}
	public function setSenha($new_senha){
		$this->senha = $new_senha;
	}
	public function setId_Usuario($new_id_usuario){
		$this->id_usuario = $new_id_usuario;
	}
	public function getId_Pessoa(){
		return $this->id_pessoa;
	}
	public function getUsuario(){
		return $this->usuario;
	}
	public function getSenha(){
		return $this->senha;
	}
}

?>