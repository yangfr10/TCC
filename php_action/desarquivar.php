<?php
include_once 'db_connect.php';
$id = $_GET['id'];
$sql = "UPDATE pacientes SET arquivado = 0 WHERE id = '$id'";
mysqli_query($connect, $sql);

header ("Location: ../arquivados.php");