<?php 

try{
	$pdo = new PDO("mysql:dbname=assistencia_bateria;host=127.0.0.1", "root", "1234");
}catch(PDOException $e){
	echo "Conexão com o banco de dados falhou: ". $e->getMessage();
}

?>