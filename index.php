<?php
session_start();

if(empty($_SESSION['usuario'])){
	header("Location: login.php");
}

?>

<h1>Olá</h1>

<h2>Bem vindo(a) <?php echo $_SESSION['nome']. ' '.$_SESSION['sobrenome']; ?></h2>

<a href="logout.php">Sair</a>