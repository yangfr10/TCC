<?php
require_once "../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_evolução = mysqli_escape_string($connect, $_GET['id_evolução']);
$sql = "INSERT INTO campo_evolucao(Id_evolucao) values ('$id_evolução');";
if (mysqli_query($connect, $sql)) {
	header ("Location: Campos_evolução.php?id=$id & id_evolução=$id_evolução");
} else {
		header ("Location: Campos_evolução.php?id=$id & id_evolução=$id_evolução");
}