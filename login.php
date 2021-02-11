<?php
session_start();

include 'config.php';
include 'Classes/Usuario.php';

$usuario = new Usuario($pdo);

if(isset($_POST['nome_user']) && !empty($_POST['nome_user'])){
	$nome_user = addslashes($_POST['nome_user']);
	$senha = addslashes($_POST['senha']);

	$usuario->setNome_user($nome_user);
	$usuario->setSenha($senha);
	$autentica = $usuario->autenticaUsuario();

	if(isset($autentica) && !empty($autentica['id'])){

	$_SESSION['usuario'] = $autentica['id'];
}
	header("Location: index.php");
	
}else{
	header("Location: login.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<form method="POST">
	<label>Usuario</label><br>
	<input type="text" name="nome_user"><br><br>

	<label>Senha</label><br>
	<input type="password" name="senha"><br><br>

	<input type="submit" value="Entrar"> <label><a href="cadastro-usuario.php">[Cadastrar Usuario]</a></label>
</form>
</body>
</html>