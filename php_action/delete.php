<?php
require_once "db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$sql = "DELETE FROM pacientes WHERE id='$id'";
if (mysqli_query($connect, $sql)) {
	header ('Location: ../index.php?sucesso');
} else {
		header ('Location: ../index.php?fracasso');
}
