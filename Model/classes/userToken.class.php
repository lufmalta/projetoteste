<?php
require_once "config.php";
class userToken{
	private $id_token;
	private $id_usuario;
	private $hash;
	//private $used;
	private $expirado_em;
	private $pdo;

	public function __construct(){
		$this->pdo = '';
		//$this->id_usuario = $new_id_usuario;
	}
	public function novoToken($token, $expirado_em, $id_user){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);

		$sql = "INSERT INTO usuarios_token SET id_usuario = :id_usuario, hash = :hash, expirado_em = :expirado_em";
	    $sql = $pdo->prepare($sql);

	    $sql->bindValue(":id_usuario", $id_user);
		$sql->bindValue(":hash", $token);
		$sql->bindValue(":expirado_em", $expirado_em);
		$sql->execute();

		$this->pdo = $pdo;
		$this->hash = $token;
		$this->expirado_em = $expirado_em; 
	}
	public function verificaExistencia($hash){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM usuarios_token WHERE hash = :hash AND used = 0 AND expirado_em > NOW()";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":hash", $hash);
		$sql->execute();
		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$id_user = $sql['id_usuario'];
			return true;
		}else {
			return false;
		}
	}
	public function invalidarToken($hash){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "UPDATE usuarios_token SET used = 1 WHERE hash = :hash";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":hash", $hash);
		$sql->execute();
	}
	public function getId_Usuario(){
		return $this->id_usuario;
	}
	public function getHash(){
		return $this->hash;
	}
}
?>