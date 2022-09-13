<?php
require_once "../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_evolução = mysqli_escape_string($connect, $_GET['id_evolução']);
$id_campo = mysqli_escape_string($connect, $_GET['id_campo_evolução']);
$sql = "DELETE FROM campo_evolucao WHERE Id_campo_evolucao = '$id_campo';";
if (mysqli_query($connect, $sql)) {
	header ("Location: Campos_evolução.php?id=$id & id_evolução=$id_evolução");
} else {
		header ("Location: Campos_evolução.php?id=$id & id_evolução=$id_evolução");
}