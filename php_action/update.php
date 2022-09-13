<?php
require_once "db_connect.php";
$nome = mysqli_escape_string($connect, $_GET['nome']);
$email = mysqli_escape_string($connect, $_GET['email']);
$cpf = mysqli_escape_string($connect, $_GET['cpf']);
$id = mysqli_escape_string($connect, $_GET['id']);
$telefone = mysqli_escape_string($connect, $_GET['telefone']);
$idade = mysqli_escape_string($connect, $_GET['idade']);
$endereço = mysqli_escape_string($connect, $_GET['endereço']);
$sql = "UPDATE pacientes SET Nome = '$nome', Email = '$email', CPF = '$cpf', Telefone = '$telefone', Idade = '$idade', Endereco = '$endereço' WHERE id='$id'";

//var_dump($sql);
if (mysqli_query($connect, $sql)) {
	header ('Location: ../index.php?sucesso');
} else {
		header ('Location: ../index.php?fracasso');
} 