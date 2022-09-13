<?php
require_once "../../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$nome_avaliação = mysqli_escape_string($connect, $_GET['nome_avaliação']);
$sql = "INSERT INTO avaliacao(Nome_avaliacao, id_paciente) VALUES ('$nome_avaliação', '$id')";
if (mysqli_query($connect, $sql)) {
	header ("Location: ../Tabela_avaliação.php?id=$id");
} else {
		header ("Location: ../Tabela_avaliação.php?id=$id");
}