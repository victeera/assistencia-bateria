<?php 
session_start();
include 'config.php';
include 'Classes/Dados_Entrada.php';

$dados_entrada = new Dados_Entrada($pdo);

if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	if(isset($_POST['botao'])){
	if(isset($_POST['problema']) && !empty($_POST['problema'])){
		if(isset($_POST['prazo']) && !empty($_POST['prazo'])){
	$problema = addslashes($_POST['problema']);
	$data_entrada = NOW();
	$data = addslashes($_POST['prazo']);
	$prazo = date("d-m-Y", strtotime($data));
	$id_formularo = $_SESSION['id_formulario'];

	$dados_entrada->setProblem($problema);
	$dados_entrada->setData_entrada($data_entrada);
	$dados_entrada->setPrazo($prazo);
	$dados_entrada->setId_formulario($id_formulario);

	$dados_entrada->salvar();

	echo $prazo;
}else{
	echo "Informe uma data";
}
}else{
	echo "Informe o problema";
}
}
}
else{
	header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Dados de entrada</title>
</head>
<body>

	<h1>Dados de entrada</h1>
<form method="POST">
	<label>Descrição do problema</label><br>
	<textarea name="problema"></textarea><br><br>

	<label>Prazo para a retirada</label><br>
	<input type="date" name="prazo">

	<input type="submit" name="botao" value="Salvar">

</form>
</body>
</html>