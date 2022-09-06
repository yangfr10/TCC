<?php
include_once '../php_action/db_connect.php';
$sql = "SELECT * FROM events";
$enviar = mysqli_query($connect, $sql);
$Resultado = mysqli_fetch_all($enviar, MYSQLI_ASSOC);
echo json_encode($Resultado);