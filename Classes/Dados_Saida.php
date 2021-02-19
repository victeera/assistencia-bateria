<?php

class Dados_Saida{
	private $id;
	private $solucao;
	private $data_saida;
	private $id_formulario;
	private $id_usuario;

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function setSolucao($solucao){
		$this->solucao = $solucao;
	}

	public function getSolucao(){
		return $this->solucao;
	}

	public function setData_saida($data_saida){
		$this->data_saida = $data_saida;
	}

	public function getData_saida(){
		return $this->data_saida;
	}

	public function setId_formulario($id_formulario){
		$this->id_formulario = $id_formulario;
	}

	public function getId_formulario(){
		return $this->id_formulario;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function setId_usuario(){
		return $this->id_usuario;
	}

	public function salvar(){
		$sql = "INSERT INTO dados_saida(solucao, data_saida, id_formulario, id_usuario) VALUES (?, ?, ?, ?)";
		$sql = $this->pdo->prepare($sql);
		$sql->prepare(array($this->solucao, $this->data_saida, $this->id_formulario, $this->id_usuario));
	}
























} 