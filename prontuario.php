<!DOCTYPE html>
<html>

<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" type="text/css" href="config.css">
	<meta charset="utf-8">
	<title>
		Prontuário
	</title>
</head>

<body>
	<?php
	include_once 'php_action/db_connect.php';
	include_once 'includes/header.php';
	if (isset($_GET['id'])) {
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
	<main style="padding-bottom: 7%;">
		<h4>Prontuário <?php echo $dados['Nome']; ?></h4>
		<hr>
		<h5>Dados Gerais:</h5>
		<div class="row">
			<p> Id: <?php echo $dados['Id']; ?></p>
			<p> Nome: <?php echo $dados['Nome']; ?></p>
			<p> Email: <?php echo $dados['Email']; ?></p>
			<p> CPF: <?php echo $dados['CPF']; ?></p>
		</div>
		<div class="row">
			<p> Telefone: <?php echo $dados['Telefone']; ?></p>
			<p> Idade: <?php echo $dados['Idade'] ?></p>
			<p> Endereço: <?php echo $dados['Endereco'] ?> </p>
		</div>
		<hr>
		<h5>Documentos:</h5>
		<button>Anexar Arquivos</button>
		<hr>
		<h5 class="A">Avaliações:</h5>
		<?php while ($dados1 = mysqli_fetch_array($resultado1)) : ?>
			<?php $id_avaliação = $dados1['Id_avaliacao']; ?>
			<p class="nome_principal"><?php echo $dados1['Nome_avaliacao']; ?></p> <br>
			<?php
			$sql3 = "SELECT * FROM campo_avaliacao WHERE id_avaliacao='$id_avaliação'";
			$resultado3 = mysqli_query($connect, $sql3);
			?>
			<?php while ($dados3 = mysqli_fetch_array($resultado3)) : ?>
				<div class="nome_info">
					<p class="nome_campo"><?php echo $dados3['Nome_campo_avaliacao'] . ":"; ?></p>
					<p class="info_campo"><?php echo $dados3['Info_campo_avaliacao']; ?></p><br>
				</div>
			<?php endwhile; ?>
		<?php endwhile; ?>


		<h5 class="A">Evoluções:</h5>
		<?php while ($dados2 = mysqli_fetch_array($resultado2)) : ?>
			<?php $id_evolução = $dados2['Id_evolucao']; ?>
			<p class="nome_principal"><?php echo $dados2['Nome_evolucao'] ?></p><br>
			<?php
			$sql4 = "SELECT * FROM campo_evolucao WHERE id_evolucao='$id_evolução'";
			$resultado4 = mysqli_query($connect, $sql4);
			?>
			<?php while ($dados4 = mysqli_fetch_array($resultado4)) : ?>
				<p class="nome_campo"><?php echo $dados4['Nome_campo_evolucao'] . ":"; ?></p>
				<p class="info_campo"><?php echo $dados4['Info_campo_evolucao']; ?></p><br>
			<?php endwhile; ?>
		<?php endwhile; ?>
	</main>

	<div class="center-align" style="padding-bottom: 2%;">
		<a href="index.php" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>