<?php 
session_start();

include 'config.php';
include 'Classes/Bateria.php';

$bateria = new Bateria($pdo);

if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	if(isset($_POST['botao'])){
		if(isset($_POST['referencia']) && !empty($_POST['referencia'])){
			if(isset($_POST['marca']) && !empty($_POST['marca'])){
				
				$referencia = addslashes($_POST['referencia']);
				$marca = addslashes($_POST['marca']);
				$id_usuario = $_SESSION['usuario'];

				$bateria->setReferencia($referencia);
				$bateria->setMarca($marca);
				$bateria->setId_usuario($id_usuario);
				$bateria->salvar();

			}else{
				echo "Preencha todos os campos";
			}
		}else{
			echo "Preencha todos os campos";
		}
	}
}else{
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastrar Bateria</title>
</head>
<body>
<form method="POST">
	<label>Referencia</label><br>
	<input type="text" name="referencia"><br><br>

	<label>Marca</label><br>
	<select name="marca">
		<option></option>
		<option value="HELIAR">HELIAR</option>
		<option value="SRTADA">SRTADA</option>
	</select><br><br>

	<input type="submit" name="botao" value="Cadastrar">


</form>
</body>
</html>