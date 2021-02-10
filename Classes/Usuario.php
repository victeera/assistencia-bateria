<?php

class Usuario{
	private $id;
	private $nome;
	private $sobrenome;
	private $nome_user;
	private $senha;

	private $pdo;

	public function __construct($pdo){
		$this->pdo = $pdo;
	}

	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setSobrenome($sobrenome){
		$this->sobreNome = $sobrenome;
	}

	public function getSobrenome(){
		return $this->sobrenome;
	}

	public function setNome_user($nome_user){
		$this->nome_user = $nome_user;
	}

	public function getNome_user(){
		return $this->nome_user;
	}

	public function setSenha($senha){
		$this->senha = MD5($senha);
	}





















}

?>