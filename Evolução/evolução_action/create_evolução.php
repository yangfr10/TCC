<?php
require_once "../../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$nome_evolução = mysqli_escape_string($connect, $_GET['nome_evolução']);
$sql = "INSERT INTO evolucao(Nome_evolucao, id_paciente) VALUES ('$nome_evolução', '$id')";
if (mysqli_query($connect, $sql)) {
	header ("Location: ../Tabela_evolução.php?id=$id");
} else {
		header ("Location: ../Tabela_evolução.php?id=$id");
}