<?php
session_start();
$id = $_SESSION['id'];
include_once 'php_action/db_connect.php';
$consulta_pacientes = mysqli_query($connect, "Select * From pacientes Where id='$id'");
$consulta_avaliacao = mysqli_query($connect, "Select * from avaliacao Where id_paciente='$id'");
$consulta_avaliacao2 = mysqli_query($connect, "Select * from avaliacao Where id_paciente='$id'");
$consulta_evolucao = mysqli_query($connect, "Select * from evolucao Where id_paciente='$id'");
$consulta_evolucao2 = mysqli_query($connect, "Select * from evolucao Where id_paciente='$id'");
$dados_pacientes = mysqli_fetch_assoc($consulta_pacientes);
$dados_avaliacao = mysqli_fetch_assoc($consulta_avaliacao);
$dados_evolucao = mysqli_fetch_assoc($consulta_evolucao);

$id_avaliacao = $dados_avaliacao['Id_avaliacao'];
$id_evolucao = $dados_evolucao['Id_evolucao'];

$consulta_campo_avaliacao = mysqli_query($connect, "Select * from campo_avaliacao Where id_avaliacao = '$id_avaliacao'");
$consulta_campo_avaliacao2 = mysqli_query($connect, "Select * from campo_avaliacao Where id_avaliacao = '$id_avaliacao'");
$consulta_campo_evolucao = mysqli_query($connect, "Select * from campo_evolucao Where id_evolucao = '$id_evolucao'");
$consulta_campo_evolucao2 = mysqli_query($connect, "Select * from campo_evolucao Where id_evolucao = '$id_evolucao'");

$dados_campo_avaliacao = mysqli_fetch_assoc($consulta_campo_avaliacao);
$dados_campo_evolucao = mysqli_fetch_assoc($consulta_campo_evolucao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
body{
    font-family: Arial;
}
img {
    width: 100%;
    border: 2px solid;
    padding: 0px;
}
h1{
    text-align:center;
    padding-left:3%;
    font-size: 160%;
}
p.info{
    font-size: 130%;
}
.subtitulo{
    font-size:138%;
    text-align:justify;
}
    </style>
</head>

<body>
        <img src="imagem/Psifisio.jpg">

        <h1>Prontuário do Paciente</h1>
        <h1 class="subtitulo">Dados Gerais:</h1>
        <p class="info">Número do Prontuário:</p>
        <p class="info">Nome Completo:</p>
        <p class="info">Idade:</p>
        <p class="info">Endereço:</p>
        <p class="info">CPF:</p>
        <p class="info">Telefone:</p>
        <h1 class="subtitulo">Avaliações:</h1>
        <h1 class="subtitulo">Evoluções:</h1>
</body>

</html>