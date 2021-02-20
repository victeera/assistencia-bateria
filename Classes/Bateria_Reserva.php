<?php

class Bateria_Reserva{
	private $id;
	private $referencia;
	private $n_serie;
	private $emprestou;
	private $id_formulario

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function getId(){
		return $this->id;
	}

	public function setReferencia($referencia){
		$this->referencia = $referencia;
	}

	public function getReferencia(){
		return $this->referencia;
	}

	public function setN_serie($n_serie){
		$this->n_serie = $n_serie;
	}

	public function getN_serie(){
		return $this->n_serie;
	}

	public function setEmprestou($emprestou){
		$this->emprestou = $emprestou;
	}

	public function getEmprestou(){
		return $this->emprestou;
	}

	public function setId_formulario($id_formulario){
		$this->id_formulario = $id_formulario;
	}

	public function getId_formulario(){
		return $this->id_formulario;
	}
}

?>