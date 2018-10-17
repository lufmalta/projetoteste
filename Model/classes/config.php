
<?php
// DADOS TESTE BANCO
class Banco{
	private $dsn;
	private $dbuser;
	private $dbpass;
	private $con;

	public function __construct(){
		$this->dsn = "mysql:dbname=projeto_curriculo_site;host=localhost";
		$this->dbuser = "root";
		$this->dbpass = "";
		$this->con = '';
	}
	
	public function conectar($new_pdo){
		if(empty($this->con)){
			$this->con = $this->conexao($new_pdo);
			return $this->con;
		}else {
				return $this->con;
			}
		
	}
	private function conexao($n_pdo){
		try{
			$n_pdo = new PDO($this->dsn, $this->dbuser, $this->dbpass);
			$n_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $n_pdo;
		}catch (PDOException $e){
			echo "Erro conexao: ".$e->getMessage();
		}
	}
}



?>
