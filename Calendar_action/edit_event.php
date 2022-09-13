<?php
SESSION_START();
include_once '../php_action/db_connect.php';
//var_dump($_POST);
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
//var_dump($dados);

//Converter data
$data_start = str_replace('/', '-', $dados['start']);
$data_start_convert = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $dados['end']);
$data_end_convert = date("Y-m-d H:i:s", strtotime($data_end));



$title = $dados['title'];
$color = $dados['color'];
$id = $dados['id'];

$query = "UPDATE events SET title='$title', color='$color', start='$data_start_convert', end='$data_end_convert' WHERE id='$id'";
//var_dump($query);
$ENVIAR = mysqli_query($connect, $query);

$_SESSION['mensagem'] = "Evento Atualizado com sucesso";

header("Location: ../index.php");

