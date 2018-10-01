<?php 
require 'config.php';
class usuarios{
	private $pdo;
	private $id_usuario;
	private $usuario;
	private $senha;

	public function __construct(){
		$this->pdo = '';
	}

	public function verificarExisteUsuario($new_email){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM usuarios WHERE email = :email";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':email', $new_email);
		$sql->execute();
		$this->pdo = $pdo;

		if($sql->rowCount() > 0){
			return true;
		}else {
			return false;
		}
	}

	public function verificarUsuSenha($new_email, $new_senha){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM usuarios WHERE email = :email and senha = :senha";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':email', $new_email);
		$sql->bindValue(':senha', $new_senha);
		$sql->execute();
		$this->pdo = $pdo;

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			session_start();
			$_SESSION['logado'] = $sql['email'];
			return true;
		}else {
			return false;
		}
	}
}

?>