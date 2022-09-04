<!DOCTYPE html>
<html>
<head>
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<meta charset="utf-8">
<title>
Prontuário
</title>
</head>
<body>
<?php
include_once 'php_action/db_connect.php';
if(isset($_GET['id'])){
	$id = mysqli_escape_string($connect, $_GET['id']);
	$sql = "SELECT * FROM pacientes WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
	
	$sql1 = "SELECT * FROM avaliacao WHERE id_paciente = '$id'"; 
	$resultado1 = mysqli_query($connect, $sql1);
	
    $sql2 = "SELECT * FROM evolucao WHERE id_paciente = '$id'";
	$resultado2 = mysqli_query($connect, $sql2);
	
}

?>
<h2> Prontuário <?php echo $dados['Nome']; ?></h2>
<hr> <br>
<h4>Dados Gerais</h4> <br> <br>
<p>Nome: <?php echo $dados['Nome']; ?></p> <br>
<p>Id: <?php echo $dados['Id']; ?></p> <br>
<p>Email: <?php echo $dados['Email'];?></p> <br>
<p>CPF: <?php echo $dados['CPF']; ?></p> <br> 
<p>Telefone: <?php echo $dados['Telefone']; ?></p> <br>
<p>Idade: <?php echo $dados['Idade'] ?></p> <br>
<p>Endereço: <?php echo $dados['Endereco'] ?> </p>

<hr> <br>

<h3> Documentos </h3> <br> <br>
<button>Anexar Arquivos</button>
<br> <br><hr><br>

	
<h3>Avaliação</h3>
<?php while($dados1 = mysqli_fetch_array($resultado1)): ?>
<?php $id_avaliação = $dados1['Id_avaliacao']; ?>
<h4><?php echo $dados1['Nome_avaliacao']; ?></h4><br> 


<?php 
$sql3 = "SELECT * FROM campo_avaliacao WHERE id_avaliacao='$id_avaliação'";
$resultado3 = mysqli_query($connect, $sql3);
?>
<?php while ($dados3 = mysqli_fetch_array($resultado3)): ?>
<h5><?php echo $dados3['Nome_campo_avaliacao']; ?></h5><br>
<p><?php echo $dados3['Info_campo_avaliacao']; ?></p>
<?php endwhile; ?>
<?php endwhile; ?>

	
<h3>Evolução</h3>
<?php while($dados2 = mysqli_fetch_array($resultado2)): ?>
<?php $id_evolução = $dados2['Id_evolucao']; ?>
<h4><?php echo $dados2['Nome_evolucao'] ?></h4><br> 
<?php
$sql4 = "SELECT * FROM campo_evolucao WHERE id_evolucao='$id_evolução'";
$resultado4 = mysqli_query($connect, $sql4);
?>
<?php while ($dados4 = mysqli_fetch_array($resultado4)): ?>
<h5><?php echo $dados4['Nome_campo_evolucao'] ?></h5><br>
<p><?php echo $dados4['Info_campo_evolucao'] ?></p>
<?php endwhile; ?>
<?php endwhile; ?>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>