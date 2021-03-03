<?php 
session_start();
include 'config.php';
include 'Classes/Bateria_Reserva.php';

$bateria_reseva = new Bateria_Reserva($pdo);

if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	if(isset($_POST['botao'])){
		if(isset($_POST['id_formulario']) && !empty($_POST['id_formulario'])){
			if(isset($_POST['referencia']) && !empty($_POST['referencia'])){
				if(isset($_POST['n_serie']) && !empty($_POST['n_serie'])){
					if(isset($_POST['emprestou']) && !empty($_POST['emprestou'])){
	$id_formulario = addslashes($_POST['id_formulario']);
	$referencia = addslashes($_POST['referencia']);
	$n_serie = addslashes($_POST['n_serie']);
	$emprestou = addslashes($_POST['emprestou']);

	$bateria_reseva->setReferencia($referencia);
	$bateria_reseva->setN_serie($n_serie);
	$bateria_reseva->setEmprestou($emprestou);
	$bateria_reseva->setId_formulario($id_formulario);
	$bateria_reseva->salvar();

	header("Location: index.php");

}else{
	echo "Marque uma opção";
}
}else{
	echo "Digite u numero de serie";
}
}else{
	echo "Digite a referencia da bateria";
}
}else{
	echo "Digite o ID do Formulário";
}
}
}else{
	header("Location: login.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Bateria Reserva</title>
</head>
<body>
<form method="POST">

<h1>Empréstimo de Bateria</h1>

	<label>ID Formulário</label><br>
	<input type="text" name="id_formulario"><br><br>

	<label>Referência</label><br>
	<input type="text" name="referencia"><br><br>

	<label>Numero de Série</label><br>
	<input type="text" name="n_serie"><br><br>

	<label>Emprestar bateria?</label>&nbsp;&nbsp;&nbsp;
	Sim<input type="radio" value="Sim" name="emprestou">&nbsp;&nbsp;&nbsp;
	Não<input type="radio" value="Não" name="emprestou"><br><br>


	<input type="submit" name="botao" value="Salvar"><br><br>
</form>
</body>
</html>