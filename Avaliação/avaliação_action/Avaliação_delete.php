<?php
require_once "../../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_avaliação = mysqli_escape_string($connect, $_GET['id_avaliação']);
$sql = "DELETE FROM avaliacao WHERE Id_avaliacao='$id_avaliação'";
if (mysqli_query($connect, $sql)) {
	header ("Location: ../Tabela_avaliação.php?id=$id");
} else {
		header ("Location: ../Tabela_avaliação.php?id=$id");
}
