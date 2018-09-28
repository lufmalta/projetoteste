<?php 

class educacao{
	private $pdo;
	private $id_pessoa;
	private $formacao;
	private $instituicao;
	private $instituCidade;
	private $anoConc;
	private $cursos;

	public function __construct($new_id_pessoa, $pdo){
		$this->id_pessoa = $new_id_pessoa;
		$this->pdo = $pdo;
	}
}

?>