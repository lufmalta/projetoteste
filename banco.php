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
				return $this->pdo;

			}catch(PDOException $e){
				echo "Erro!!".$e->getMessage();
			}
		}

}

?>