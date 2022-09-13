<?php
require_once "../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_avaliação = mysqli_escape_string($connect, $_GET['id_avaliação']);
$sql = "INSERT INTO campo_avaliacao(Id_avaliacao) values ('$id_avaliação');";
if (mysqli_query($connect, $sql)) {
	header ("Location: Campos_avaliação.php?id=$id & id_avaliação=$id_avaliação");
} else {
		header ("Location: Campos_avaliação.php?id=$id & id_avaliação=$id_avaliação");
}