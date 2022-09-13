<?php
require_once "../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_evolução = mysqli_escape_string($connect, $_GET['id_evolução']);
$sql1 = "SELECT * FROM campo_evolucao WHERE Id_evolucao = '$id_evolução'";
$resultado1 = mysqli_query($connect, $sql1);
while ($dados = mysqli_fetch_array($resultado1)):
$info = $_GET[$dados['Id_campo_evolucao']* -1];
$nome_campo = $dados['Id_campo_evolucao'];
$nome = $_GET[$dados['Id_campo_evolucao']];
$sql = "UPDATE campo_evolucao SET Nome_campo_evolucao = '$nome', Info_campo_evolucao = '$info' WHERE Id_campo_evolucao='$nome_campo'"; 
mysqli_query($connect, $sql);
endwhile;
	header ("Location: campos_evolução.php?id=$id & id_evolução=$id_evolução");
