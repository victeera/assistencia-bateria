<?php
session_start();

include 'config.php';
include 'Classes/Formulario.php';

$entrada = new Formulario($pdo);
if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
    if(!empty($_SESSION['idform'])){
        $idform = addslashes($_SESSION['idform']);
        print_r($idform);
        $dados = $entrada->getDados($idform);
    }else{
        header("Location: index.php");
    }
}else{
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="assets/css/sinistro_entrada.css">
    <title>Controle de Asistencia</title>
</head>
<body>
<div class="cabecalho">
    <div class="container">
        <div class="logo"><a href="#"><img src="assets/img/Logo.jpg"></a></div>
        <div class="info">Italux Lubrificantes e Acumuladores Ltda
            <div class="sub-info">
                <div>
                    Av. Álvaro Botelho Maia - Nº 1160 - Centro<br>
                    Fone: 3234-3111
                    CNPJ: 02.436.829/0002-48<br>
                    italux@italux.com.br<br>
                    Manaus - AM
                </div>
                <div>
                    Av. Torquato Tapajós - Nº 1720 - Flores<br>
                    Fone: 3654-3111
                    CNPJ: 02.436.829/0001-67<br>
                    italux@italux.com.br<br>
                    Manaus - AM
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="titulo">
    <div class="container">
        <div class="titulo-text">Controle de Assistência</div>
        <div class="titulo-sequencial"><?php $number = str_pad($dados['id'] , 6 , '0' , STR_PAD_LEFT); echo $number; ?></div>
    </div>
</div>
<hr>

<div class="corpo">
    <div class="center">

        <div class="row1">Marca da Bateria: <?php echo $dados['bateria']; ?></div><br>
        <div class="row2">
            <div>Referencia: <?php echo $dados['bateria']; ?> </div>
            <div class="garantia">Garantia/Nº: <?php echo $dados['n_garantia']; ?></div>
        </div><br>
        <div class="row3">
            <div>Emprestimo de Bateria: <?php echo $dados['bateria']; ?></div>
            <div class="modelo">Modelo: <?php echo $dados['bateria']; ?></div>
        </div><br>
        <div class="row4">
            <div>Data de Entrada: <?php $date = date('d/m/Y', strtotime($dados['data_entrada'])); $hour = date('H:i', strtotime($dados['data_entrada']));  echo $date. ' às ' .$hour; ?></div><br>
            <div>Retirar até: <?php $date = date('d/m/Y', strtotime($dados['prazo'])); echo $date; ?> </div><br>
        </div>
        <div class="row5">
            <div>Cliente: <?php echo $dados['nome_cliente']; ?></div><br>
            <div>Telefone: <?php echo $dados['bateria']; ?></div>
        </div>

    </div>
</div>
<hr>
<div class="end">
    <div class="acordo">
        <p> Acordo:<br><br>
            Estou de acordo que passados 7 dias a contar da data de entrada,
            não mais terei direito de reclamar a bateria deixada nesta empresa
            para carregar e verificar.<br><br>
            De acordo com o Código do Consumidor Art. 18, § 1.º, fico ciente do prazo para ser sanado este vício.</p>
    </div><br><br>
    <div class="assinatura">
        <div><hr><?php echo $dados['nome']. ' ' .$dados['sobrenome']; ?></div>
        <div><hr><?php echo $dados['nome_cliente']; ?></div>
    </div>
</div>
<hr>
</body>
</html>
