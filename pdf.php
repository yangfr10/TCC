<?php
session_start();
$id = $_GET['id'];
$_SESSION['id'] = $id;
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

$id = $dados_pacientes['Id'];

require_once "dompdf/autoload.inc.php";

use Dompdf\Dompdf;
use Dompdf\Options;

$options= new Options();
$options -> setChroot(__DIR__);

$html = '<!DOCTYPE html>
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
        <img src="http://localhost/Tela_TCC/imagem/psifisio.jpg">

        <br><h1>Prontuário do Paciente</h1><br>
        <h1 class="subtitulo">Dados Gerais:</h1>
        <p class="info">Número do Prontuário: '.$id;
$html .= '</p>
        <p class="info">Nome Completo: '.$dados_pacientes['Nome'];
$html .= '</p>
        <p class="info">Idade: '.$dados_pacientes['Idade'];
$html .= '</p>
        <p class="info">Endereço: '.$dados_pacientes['Endereco'];
$html .= '</p>
        <p class="info">CPF: '.$dados_pacientes['CPF'];
$html .= '</p>
        <p class="info">Telefone: '.$dados_pacientes['Telefone'];
$html .='</p> <br>
        <h1 class="subtitulo">Avaliações:</h1>';
while ($dados_avaliacao2 = mysqli_fetch_assoc($consulta_avaliacao2)){
    $nomeA = $dados_avaliacao2['Nome_avaliacao'];
    $html.= "<p class='info' style='text-transform:uppercase'> $nomeA </p>";
    while($dados_campo_avaliacao2 = mysqli_fetch_assoc($consulta_campo_avaliacao2)){
        $nomeCA = $dados_campo_avaliacao2['Nome_campo_avaliacao'];
        $infoCA = $dados_campo_avaliacao2['Info_campo_avaliacao'];
        $html .= "<p class='info'> $nomeCA <p>";
        $html .= "<p class='info'> $infoCA <p>";
    }
}
$html .='<h1 class="subtitulo">Evoluções:</h1>';
while ($dados_evolucao2 = mysqli_fetch_assoc($consulta_evolucao2)){
    $nomeE = $dados_evolucao2['Nome_evolucao'];
    $html.= "<p class='info' style='text-transform:uppercase'> $nomeE </p>";
    while($dados_campo_evolucao2 = mysqli_fetch_assoc($consulta_campo_evolucao2)){
        $nomeCE = $dados_campo_evolucao['Nome_campo_evolucao'];
        $infoCE = $dados_campo_evolucao2['Info_campo_evolucao'];
        $html .= "<p class='info'> $nomeCE <p>";
        $html .= "<p class='info'> $infoCE <p>";
    }
}
$html .= '</body>

</html>';


$dompdf = new Dompdf (['enable_remote' => true]);
 $dompdf -> loadHtml($html);

$dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream(
    "prontuario.pdf", //nome do arquivo
    array(
        "Attachment" => false
    )
);

?>