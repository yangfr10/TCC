<?php
require_once "db_connect.php";
$nome = mysqli_escape_string($connect, $_GET['nome']);
$email = mysqli_escape_string($connect, $_GET['email']);
$cpf = mysqli_escape_string($connect, $_GET['cpf']);
$telefone = mysqli_escape_string($connect, $_GET['telefone']);
$idade = mysqli_escape_string($connect, $_GET['idade']);
$endereço = mysqli_escape_string($connect, $_GET['endereço']);
$sql = "INSERT INTO pacientes(nome, email, cpf, telefone, idade, endereco) VALUES ('$nome', '$email', '$cpf', '$telefone', '$idade', '$endereço')";
if (mysqli_query($connect, $sql)) {
	header ('Location: ../index.php?sucesso');
} else {
		header ('Location: ../index.php?fracasso');
}