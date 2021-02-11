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

	public function salvar(){
		if($this->existeUsuario($this->nome_user) == false){
		$sql = "INSERT INTO usuario SET nome = ?, sobrenome = ?, nome_user = ?, senha = ?";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->nome, $this->sobrenome, $this->nome_user, $this->senha));
	}else{
		echo "O nome de usuario digitado não esta disponivel";
	}
}

	public function autenticaUsuario(){
		$array = array();
		$sql = "SELECT * FROM usuario WHERE nome_user = ? AND senha = ?";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this ->nome_user, $this->senha));

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}
			return $array;
	}

	private function existeUsuario($u){
		$sql = "SELECT * FROM usuario WHERE nome_user = ?";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($u));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}





















}

?>