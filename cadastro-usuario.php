<?php
session_start();

include 'config.php';
include 'Classes/Usuario.php';

$usuario = new Usuario($pdo);

if(isset($_['botao']) && !empty($_POST[''])){
if(isset($_POST['nome']) && !empty($_POST['nome'])){
	if(isset($_POST['sobrenome']) && !empty($_POST['sobrenome'])){
		if(isset($_POST['nome_user']) && !empty($_POST['nome_user'])){
			if(isset($_POST['senha']) && !empty($_POST['senha'])){
				if(isset($_POST['confirma_senha']) && !empty($_POST['confirma_senha'])){
	$nome = addslashes($_POST['nome']);
	$sobrenome = addslashes($_POST['sobrenome']);
	$nome_user = addslashes($_POST['nome_user']);
	$senha = addslashes($_POST['senha']);
	$confirma_senha = addslashes($_POST['confirma_senha']);

	if($senha == $confirma_senha){
	$usuario->setNome($nome);
	$usuario->setSobrenome($sobrenome);
	$usuario->setNome_user($nome_user);
	$usuario->setSenha($senha);
	$usuario->salvar();

	}else{
		echo "As senhas não conferem";
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
}else{
	echo "Preencha todos os campos";
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Usuario</title>
</head>
<body>
<form method="POST">
	<label>Nome</label><br>
	<input type="text" name="nome"><br><br>
	
	<label>Sobrenome</label><br>
	<input type="text" name="sobrenome"><br><br>
	
	<label>Usuario</label><br>
	<input type="text" name="nome_user"><br><br>

	<label>Senha</label><br>
	<input type="password" name="senha"><br><br>

	<label>Confirmar senha</label><br>
	<input type="password" name="confirma_senha"><br><br>

	<input type="submit" value="Cadastrar" name="botao"><br><br>

</form>
</body>
</html>