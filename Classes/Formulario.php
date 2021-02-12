<?php

class Formulario{
	private $id;
	private $nome_cliente;
	private $email;
	private $cpf;
	private $bateria;
	private $n_garantia;
	private $status;
	private $id_usuario;

	private $pdo;


	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function getId(){
		return $this->id;
	}

	public function setNome_cliente($nome_cliente){
		$this->nome_cliente = $nome_cliente;
	}

	public function getNome_cliente(){
		return $this->nome_cliente;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function getEmail(){
		return $this->email;
	}

	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function getCpf(){
		return $this->cpf;
	}

	public function setBateria($bateria){
		$this->bateria = $bateria;
	}

	public function getBateria(){
		return $this->bateria;
	}

	public function setN_garantia($n_garantia){
		$this->n_garantia = $n_garantia;
	}

	public function getN_garantia(){
		return $this->n_garantia;
	}

	public function setStatus($status){
		$this->status = $status;
	}

	public function getStatus(){
		return $this->status;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function salvar(){
		$sql = "INSERT INTO formulario (nome_cliente, email, cpf, bateria, n_garantia, status, id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->nome_cliente, $this->email, $this->cpf, $this->bateria, $this->n_garantia, $this->status, $this->id_usuario));
	}
}