<?php
include 'config.php';
include 'Classes/Usuario.php';

$usuario = new Usuario($pdo);

if(isset($_POST['email']) && !empty($_POST['email'])){
	$email = addslashes($_POST['email']);
	$senha = addslashes($_POST['senha']);

	$autentica = $usuario->autenticaUsuario($email, $senha);

	if($autentica == true){
		header("Location: index.php");
	}else{
	echo "Usuario ou senha invalidos";
}
}else{
	echo "Preencha todos os campos";
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
	<input type="text" name="usuario"><br><br>

	<label>Senha</label><br>
	<input type="password" name="seha"><br><br>

	<input type="submit" value="Entrar">
</form>
</body>
</html>