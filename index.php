<?php
session_start();
include 'config.php';
include 'Classes/Formulario.php';

$formulario = new Formulario($pdo);
$formulario = $formulario->getForms();
if(empty($_SESSION['usuario'])){
	header("Location: login.php");
}

?>

<h1>Olá</h1>

<h2>Bem vindo(a) <?php echo $_SESSION['nome']. ' '.$_SESSION['sobrenome']; ?></h2>

<a href="cadastro-bateria.php">[Cadastrar Bateria]</a> <a href="novo-formulario.php">[Novo Formulario]</a>  <a href="logout.php">[Sair]</a>
<h1>Painel de Formulários</h1>
<table border="1" width="50%">
	<tr>
		<th>ID</th>
		<th>Cliente</th>
		<th>Bateria</th>
		<th>Descrição do Problema</th>
		<th>Status</th>
		<th>Entrou em</th>
		<th>Ações</th>
</tr>
<?php foreach($formulario as $form):  ?>

<tr>
		<td> <?php echo $form['id']; ?></td>
		<td> <?php echo $form['nome_cliente']; ?></td>
		<td> <?php echo $form['bateria']; ?></td>
		<td> <?php echo $form['problema']; ?></td>
		<td> <?php echo $form['status']; ?></td>
		<td> <?php echo date("d/m/Y", strtotime($form['data_entrada'])); ?></td>
		<td> [Editar] <a href="dados-saida.php?ASB=<?php echo base64_encode($form['id']);?>">[Finalizar]</a></td>
	</tr>
	<?php endforeach;  ?>	
	
	</table>