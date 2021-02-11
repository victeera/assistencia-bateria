<?php
session_start();
include 'config.php';
include 'Formulario.php';

$formulario = new Formulario($pdo);

if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	if(isset($_POST['botao'])){
		if(!empty($_POST['nome_cliente'])){
			if(!empty($_POST['email'])){
				if(!empty($_POST['cpf'])){
					if(!empty($_POST['bateria'])){
						if(!empty($_POST['n_garantia'])){
							$nome_cliente = addslashes($_POST['nome_cliente']);
							$email = addslashes($_POST['email']);
							$cpf = addslashes($_POST['cpf']);
							$bateria = addslashes($_POST['bateria']);
							$n_garantia  = addslashes($_POST['n_garantia']);
							$status = "em aberto";
							$id_usuario = addslashes($_POST['usuario']);

							$formulario->setNome_cliente($nome_cliente);
							$formulario->setEmail($email);
							$formulario->setCpf($cpf);
							$formulario->setBateria($bateria);
							$formulario->setN_garantia($n_garantia);
							$formulario->setSatus($status);
							$formulario->setId_usuario($id_usuario);

							$formulario->salvar();							


						}else{
							echo "Preencha todos os campos";
						}
					}else{
						echo "Preencha todos os campos";
					}
				}else{
					echo "Preencha todos os campos";
				}
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
	<title>Novo Formulario</title>
</head>
<body>
<form method="POST">
	<label>Nome do cliente</label><br>
	<input type="text" name="nome_cliente"><br><br>

	<label>Email</label><br>
	<input type="text" name="email"><br><br>

	<label>CPF</label><br>
	<input type="text" name="cpf"><br><br>

	<label>Bateria</label><br>
	<input type="text" name="bateria"><br><br>

	<label>Nº garantia</label><br>
	<input type="text" name="n_garantia"><br><br>

	<input type="submit" value="Cadastrar" name="botao">
	
</form>
</body>
</html>