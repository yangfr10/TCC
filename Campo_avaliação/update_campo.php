<?php
require_once "../php_action/db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$id_avaliação = mysqli_escape_string($connect, $_GET['id_avaliação']);
$sql1 = "SELECT * FROM campo_avaliacao WHERE Id_avaliacao = '$id_avaliação'";
$resultado1 = mysqli_query($connect, $sql1);
while ($dados = mysqli_fetch_array($resultado1)):
$info = $_GET[$dados['Id_campo_avaliacao']* -1];
$nome_campo = $dados['Id_campo_avaliacao'];
$nome = $_GET[$dados['Id_campo_avaliacao']];
$sql = "UPDATE campo_avaliacao SET Nome_campo_avaliacao = '$nome', Info_campo_avaliacao = '$info' WHERE Id_campo_avaliacao='$nome_campo'"; 
mysqli_query($connect, $sql);
endwhile;
	header ("Location: campos_avaliação.php?id=$id & id_avaliação=$id_avaliação");
