<?php
require_once "../../php_action/db_connect.php";
$nome_avaliação = mysqli_escape_string($connect, $_GET['nome_avaliação']);
$id_avaliação = mysqli_escape_string($connect, $_GET['id_avaliação']);
$id = mysqli_escape_string($connect, $_GET['id']);
$sql = "UPDATE avaliacao SET Nome_avaliacao = '$nome_avaliação' WHERE Id_avaliacao='$id_avaliação'";
if (mysqli_query($connect, $sql)) {
	header ("Location: ../Tabela_avaliação.php?id=$id");
} else {
		header ("Location: ../Tabela_avaliação.php?id=$id");
}