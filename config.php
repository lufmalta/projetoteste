<?php 
class Banco{
		private $pdo;
		private $dsn = "mysql:dbname=projeto_curriculo_site;host=localhost";
		private $dbuser = "root";
		private $dbpass = "";

		public function __construct(){
			try{
				$this->pdo = new PDO($this->dsn, $this->dbuser, $this->dbpass);
				$this->pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
			}catch(PDOException $e){
				echo "Erro!!".$e->getMessage();
			}
		}

		public function getPDO(){
			return $this->pdo;
		}

} // nao estou conseguindo fazer funcionar, entao vou fazer de outra maneira


// try{
// 	$pdo = new PDO("mysql:dbname=projeto_curriculo_site;host=localhost","root","");
// 	$pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
// }catch(PDOException $e){
// 	echo "Erro Conexão".$e->getMessage();
// }

?>