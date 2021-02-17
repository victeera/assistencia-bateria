<?php 

class Dados_Entrada{
	private $id;
	private $problema;
	private $data_entrada;
	private $prazo;
	private $id_formulario;

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function setProblema($problema){
		$this->problema = $problema;
	}

	public function getProblema(){
		return $this->problema;
	}

	public function setPrazo($prazo){
		$this->prazo = $prazo;
	}

	public function getPrazo(){
		return $this->prazo;
	}

	public function setId_formulario($id_formulario){
		$this->id_formulario = $id_formulario;
	}

	public function getId_formulario(){
		return $this->id_formulario;
	}

	public function salvar(){
		$sql = "INSERT INTO dados_entrada SET problema = :problema, data_entrada = NOW(), prazo = :prazo, id_formulario = :id_formulario";
		$sql = $this->pdo->prepare($sql);
		$sql->bindValue(':problema', $this->problema);
		$sql->bindValue(':prazo', $this->prazo);
		$sql->bindValue(':id_formulario', $this->id_formulario);
		$sql->execute();
	}
}

?>