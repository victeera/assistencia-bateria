<?php
session_start();

if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	echo "Area restrita";
}else{
	header("Location: login.php");
}

?>

