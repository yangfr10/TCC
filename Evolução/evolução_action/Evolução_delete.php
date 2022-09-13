<?php
require_once "../../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_evolução = mysqli_escape_string($connect, $_GET['id_evolução']);
$sql = "DELETE FROM evolucao WHERE Id_evolucao='$id_evolução'";
if (mysqli_query($connect, $sql)) {
	header ("Location: ../Tabela_evolução.php?id=$id");
} else {
		header ("Location: ../Tabela_evolução.php?id=$id");
}
