<?php 
session_start();
include 'config.php';
include 'Classes/Bateria_Reserva.php';

if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){

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