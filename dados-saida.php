<?php
session_start();
include 'config.php';
include 'Classes/Dados_Saida.php';
include 'Classes/Formulario.php';

$saida = new Dados_Saida($pdo);
$formulario = new Formulario($pdo);
date_default_timezone_set("America/Manaus");
if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	if(isset($_GET['ASB']) && !empty($_GET['ASB'])){
		if(isset($_POST['botao'])){
			if(isset($_POST['solucao']) && !empty($_POST['solucao'])){
				$solucao = addslashes($_POST['solucao']);
				$data_saida = date("Y-m-d");
				$id_formulario = addslashes(base64_decode($_GET['ASB']));
				$id_usuario = addslashes($_SESSION['usuario']);

				$saida->setSolucao($solucao);
				$saida->setData_saida($data_saida);
				$saida->setId_formulario($id_formulario);
				$saida->setId_usuario($id_usuario);
				$saida->salvar();

				$status = "Finalizado";
				$formulario->setStatus($status);
				$formulario->updateStatus($id_formulario);

				header("Location: index.php");



			}else{
				echo "Informe a solução que foi usada";
			}
		}

	}
}else{
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dados de Saída</title>
</head>
<body>
	<h1>Dados de Saída</h1>
<form method="POST">
	<label>Solução</label><br>
	<textarea name="solucao"></textarea><br><br>

	<input type="submit" name="botao" value="Finalizar">
</form>
</body>
</html>