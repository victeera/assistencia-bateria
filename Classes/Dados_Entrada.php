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

	public function getId(){
		return $this->id;
	}

	public function setProblema($problema){
		$this->problema = $problema;
	}

	public function getProblema(){
		return $this->problema;
	}

	public function setData_entrada($data_entrada){
		$this->data_entrada = $data_entrada;
	}

	public function getData_entrada(){
		return $this->data_entrada;
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
}