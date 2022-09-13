<?php
require_once "../../php_action/db_connect.php";
$nome_evolução = mysqli_escape_string($connect, $_GET['nome_evolução']);
$id_evolução = mysqli_escape_string($connect, $_GET['id_evolução']);
$id = mysqli_escape_string($connect, $_GET['id']);
$sql = "UPDATE evolucao SET Nome_evolucao = '$nome_evolução' WHERE Id_evolucao='$id_evolução'";
if (mysqli_query($connect, $sql)) {
	header ("Location: ../Tabela_evolução.php?id=$id");
} else {
		header ("Location: ../Tabela_evolução.php?id=$id");
}