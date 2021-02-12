<?php


class Bateria{
	private $id;
	private $referencia;
	private $marca;
	private $id_usuario;

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

	public function setMarca($marca){
		$this->marca = $marca;
	}

	public function getMarca(){
		return $this->marca;
	}

	public function setId_usuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getId_usuario(){
		return $this->id_usuario;
	}

	public function salvar(){
		if($this->existeBateria($this->referencia) == false){
		$sql = "INSERT INTO bateria (referencia, marca, id_usuario) VALUES (?, ?, ?)";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->referencia, $this->marca, $this->id_usuario));
		
	}else{
		echo "Este item ja possui cadastro";
	}
	}

	public function getAll(){
		$array = array();

		$sql = "SELECT * FROM bateria";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	private function existeBateria($b){
		$sql = "SELECT * FROM bateria WHERE referencia = ?";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($b));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}


	}

}