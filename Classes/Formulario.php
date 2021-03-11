<?php

class Formulario{
	private $id;
	private $nome_cliente;
	private $email;
	private $cpf;
	private $telefone;
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

    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }

    public function getTelefone(){
        return $this->telefone;
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
		$sql = "INSERT INTO formulario (nome_cliente, email, cpf, telefone, bateria, n_garantia, status, id_usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->nome_cliente, $this->email, $this->cpf, $this->telefone, $this->bateria, $this->n_garantia, $this->status, $this->id_usuario));

		 $lastId = $this->pdo->lastInsertId();
		 return $lastId;
	}

	public function getForms(){
		$array = array();
		$sql = "SELECT f.id, f.nome_cliente, f.bateria, d.problema, br.emprestou, f.status, d.data_entrada 
				FROM formulario f
				INNER JOIN dados_entrada d
				ON f.id = d.id_formulario
				INNER JOIN bateria_reserva br
				ON f.id = br.id_formulario;
				WHERE f.status = 'em aberto'";
		$sql = $this->pdo->query($sql);

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function updateStatus($id){
		if($this->existeForm($id)){
		$sql = "UPDATE formulario SET status = ? WHERE id = ?";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($this->status, $id));
	}
}
	private function existeForm($id){
		$sql = "SELECT * FROM formulario WHERE id = ?";
		$sql = $this->pdo->prepare($sql);
		$sql->execute(array($id));

		if($sql->rowCount() > 0){
			return true;
		}else{
			return false;
		}
	}

    public function getDados($idform){
        $array = array();
	    $sql = "SELECT f.id, f.nome_cliente, f.bateria, f.telefone, f.n_garantia, d.problema, f.status, d.data_entrada, d.prazo, u.nome, u.sobrenome 
				FROM formulario f
				INNER JOIN dados_entrada d
				ON f.id = d.id_formulario
				INNER JOIN usuario u
				ON f.id_usuario = u.id
				WHERE f.id = ?";
        $sql = $this->pdo->prepare($sql);
        $sql->execute(array($idform));

        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
        return $array;

    }

}