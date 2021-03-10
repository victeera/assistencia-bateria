<?php
session_start();
include 'config.php';
include 'Classes/Dados_Entrada.php';

$entrada = new Dados_Entrada($pdo);

if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	if(isset($_SESSION['id_formulario']) && !empty($_SESSION['id_formulario'])){
		if(isset($_POST['botao'])){
			if(isset($_POST['problema']) && !empty($_POST['problema'])){
				if(isset($_POST['prazo']) && !empty($_POST['prazo'])){
					$problema = addslashes($_POST['problema']);
					$prazo = addslashes($_POST['prazo']);
					$idform = addslashes($_SESSION['id_formulario']);
                    $id_usuario = $_SESSION['usuario'];

					$entrada->setProblema($problema);
					$entrada->setPrazo($prazo);
					$entrada->setId_formulario($idform);
					$entrada->setId_usuario($id_usuario);
					$entrada->salvar();

					$idformulario = $entrada->getId_formulario();

					$_SESSION['idform'] = $idformulario;
					header("Location: sinistro_entrada.php");


				}else{
					echo "Informe uma data válida";
				}
			}else{
				echo "Informe o problema";
			}
		}
	}else{
		header("Location: index.php");
	}
}else{
	header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dados de Entrada</title>
</head>
<body>
<form method="POST">
	<label>Descreva o problema</label><br>
	<textarea name="problema"></textarea><br><br>

	<label>Prazo para a retirada</label><br>
	<input type="date" name="prazo"><br><br>

	<input type="submit" name="botao" value="Salvar">
</form>
</body>
</html>