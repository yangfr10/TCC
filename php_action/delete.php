<?php
require_once "db_connect.php";
$id = mysqli_escape_string($connect, $_GET['id']);
$delete_aval = "DELETE FROM avaliacao WHERE id_paciente='$id'";
$delete_evol = "DELETE FROM evolucao WHERE id_paciente='$id'";
$sql = "DELETE FROM pacientes WHERE id='$id'";
 
//echo $delete_aval ."<br>". $delete_evol."<br>". $sql;

mysqli_query($connect, $delete_aval);

mysqli_query($connect, $delete_evol);
mysqli_query($connect, $sql);

header ('Location: ../arquivados.php');

