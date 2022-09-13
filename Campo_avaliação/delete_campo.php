<?php
require_once "../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_avaliação = mysqli_escape_string($connect, $_GET['id_avaliação']);
$id_campo = mysqli_escape_string($connect, $_GET['id_campo_avaliação']);
$sql = "DELETE FROM campo_avaliacao WHERE Id_campo_avaliacao = '$id_campo';";
if (mysqli_query($connect, $sql)) {
	header ("Location: Campos_avaliação.php?id=$id & id_avaliação=$id_avaliação");
} else {
		header ("Location: Campos_avaliação.php?id=$id & id_avaliação=$id_avaliação");
}