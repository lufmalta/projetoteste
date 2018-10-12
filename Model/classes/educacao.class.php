<?php 
/* Developed by Luiz Fernando Malta Martins

/* Aqui esta o arquivo da classe educacao.class.php, onde ira inserir os dados da educacao da pessoa, guardando os dados da sua formaçao e de outros cursos que tenha feito.

/* @author Luiz Fernando - lufmalta@gmail.com

*/

require_once 'config.php'; // DADOS TESTE BANCO
class Educacao{
	private $pdo;
	private $id_edu;
	private $id_pessoa;
	private $formacao;
	private $instituicao;
	private $instituCidade;
	private $anoConcl;
	private $cursos;
	private $dadosEdu;

	public function __construct($new_id_pessoa){
		$this->id_pessoa = $new_id_pessoa;
		$this->pdo = '';
		$this->dadosEdu = '';
	}

	public function inserirEducacaoObj($new_formacao, $new_instituicao, $new_instituCidade,
		 $new_anoConcl, $new_cursos){
		$this->formacao = $new_formacao;
		$this->instituicao = $new_instituicao;
		$this->instituCidade = $new_instituCidade;
		$this->anoConcl = $new_anoConcl;
		$this->cursos = $new_cursos;

	}

	public function inserirEducacaoObjBanco(){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "INSERT INTO educacao SET id_pessoa = :id_pessoa, formacao = :formacao, descEducacao = :descEducacao, instituicao = :instituicao, cidade = :instituCidade, anoConcl = :anoConcl";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->bindValue(":formacao", $this->getFormacao());
		$sql->bindValue(":descEducacao", $this->getCursos());
		$sql->bindValue(":instituicao", $this->getInstituicao());
		$sql->bindValue(":instituCidade", $this->getInstituCidade());
		$sql->bindValue(":anoConcl", $this->getAnoConc());
		$sql->execute();

		echo "Parabéns inserido educacao com sucesso!".'<br/>';	
		$this->pdo = $pdo;
		$this->pegarIDEdu($this->getFormacao(), $this->getId_Pessoa(), $pdo);
	}
	public function qtEdu(){
		$con = new Banco();
		$sql = "SELECT * FROM educacao WHERE id_pessoa = :id_pessoa";
		$pdo = $con->conectar($this->pdo);
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->execute();
		if($sql->rowCount() > 0){			
			return $sql->rowCount();
		}
	}
	public function pegarEdu(){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "SELECT * FROM educacao WHERE id_pessoa = :id_pessoa ORDER BY id_edu DESC";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_pessoa", $this->id_pessoa);
		$sql->execute();

		if($sql->rowCount() > 0 ){
			$qtEdu = $sql->rowCount();
			$qtEdu--;

			$arrayEdu = array($qtEdu); 
			$i = $qtEdu;

			foreach($sql->fetchAll() as $educacoes){
				$arrayEdu[$i] = $educacoes;
				$i--;
			}
			return $arrayEdu;
		}
	}
	public function deletarEdu($eduAtual){
		$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "DELETE FROM educacao WHERE id_edu = :id_edu AND id_pessoa = :id_pessoa";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(":id_edu", $eduAtual);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->execute();

	}
	public function editarEdu($eduAtual, $formacao, $instituicao, $instituCidade,
	 $anoConcl, $cursos){
	 	$con = new Banco();
		$pdo = $con->conectar($this->pdo);
		$sql = "UPDATE educacao SET formacao = :formacao, descEducacao = :cursos, instituicao = :instituicao, cidade = :instituCidade, anoConcl = :anoConcl
			 WHERE id_edu = :id_edu AND id_pessoa = :id_pessoa";
		$sql = $pdo->prepare($sql);	 
		$sql->bindValue(":formacao", $formacao);
		$sql->bindValue(":cursos", $cursos);	
		$sql->bindValue(":instituicao", $instituicao);
		$sql->bindValue(":instituCidade", $instituCidade);
		$sql->bindValue(":anoConcl", $anoConcl);
		$sql->bindValue(":id_edu", $eduAtual);
		$sql->bindValue(":id_pessoa", $this->getId_Pessoa());
		$sql->execute();

	}
	public function getDadosEdu(){
		return $this->dadosEdu;
	}
	public function getId_Pessoa(){
		return $this->id_pessoa;
	}
	public function getFormacao(){
		return $this->formacao;
	}
	public function getInstituicao(){
		return $this->instituicao;
	}
	public function getInstituCidade(){
		return $this->instituCidade;
	}
	public function getAnoConc(){
		return $this->anoConcl;
	}
	public function getCursos(){
		return $this->cursos;
	}
	private function pegarIDEdu($formacao, $id_pessoa, $pdo){
		$sql = "SELECT id_edu FROM educacao WHERE formacao = :formacao AND id_pessoa = :id_pessoa";
		$sql = $pdo->prepare($sql);
		$sql->bindValue(':formacao', $formacao);
		$sql->bindValue(':id_pessoa', $id_pessoa);
		$sql->execute();

		if($sql->rowCount() > 0){
			$sql = $sql->fetch();
			$this->id_edu = $sql['id_edu'];
			$dadosarray = array(
				'id_edu' => $sql['id_edu'],
				'formacao' => $this->getFormacao(),
				'instituicao' => $this->getInstituicao(),
				'instituCidade' => $this->getInstituCidade(),
				'anoConcl' => $this->getAnoConc(),
				'cursos' => $this->getCursos()
			 );
			$this->dadosEdu = $dadosarray;
		}
	}
}

