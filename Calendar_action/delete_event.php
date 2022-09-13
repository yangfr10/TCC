<?php
session_start();
include_once '../php_action/db_connect.php';

$id = filter_input(INPUT_GET, 'id');

$query = "DELETE FROM events WHERE id = '$id'";
$Envio = mysqli_query($connect, $query);

$_SESSION['mensagem'] = "Evento deletado com sucesso";

header('Location: ../index.php');
