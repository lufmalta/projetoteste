<?php 
// try{
// 	$pdo = new PDO("mysql:dbname=projeto_curriculo_site;host=localhost","root","");
// 	$pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
// }catch(PDOException $e){
// 	echo "Erro!!!".$e->getMessage();
// } // consegui arrumar pra funcionar pela classe, estava dando um erro de redeclare banco
// para arrumar este problema foi só tirar os require config.php das classes educacao.php e experiencia.php
?>
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
		// $this->con = $this->conexao($new_pdo);
		// return $this->con;
		
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
