<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../config.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../css/materialize.min.css" media="screen,projection" />
	<meta charset="utf-8">
</head>

<body>
	<?php
	include_once '../includes/header.php';
	include_once '../php_action/db_connect.php';
	$id = mysqli_escape_string($connect, $_GET['id']);
	$id_evolução = mysqli_escape_string($connect, $_GET['id_evolução']);
	$sql = "SELECT * FROM campo_evolucao WHERE Id_evolucao = '$id_evolução'";
	$resultado = mysqli_query($connect, $sql);
	?>
	<main>
		<h4 style="padding-bottom: 3%;">Campos Evolução:</h4>

		<form action="update_campo.php" method="GET">
			<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
			<input type="hidden" name="id_evolução" id="id_evolução" value="<?php echo $id_evolução ?>">

			<?php while ($dados = mysqli_fetch_array($resultado)) : ?>
				<div class="row">
					<div class="input-field col s8">
						<label>Nome Campo:</label>
						<input type="text" name="<?php echo $dados['Id_campo_evolucao']; ?>" value="<?php echo $dados['Nome_campo_evolucao']; ?>">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8">
						<label for="<?php echo -1 * $dados['Id_campo_evolucao']; ?>">Informações: </label>
						<textarea class="materialize-textarea" style="display: inline-block;" name="<?php echo -1 * $dados['Id_campo_evolucao']; ?>" id="<?php echo -1 * $dados['Id_campo_evolucao']; ?>"><?php echo $dados['Info_campo_evolucao']; ?></textarea>
						<div style="padding-left: 80%">
							<a href="delete_campo.php?id=<?php echo $id; ?> & id_evolução=<?php echo $id_evolução; ?> & id_campo_evolução=<?php echo $dados['Id_campo_evolucao']; ?>" style="display: inline-block;" class="btn red btn-large"><i class="material-icons" style="font-size: 4rem;">delete</i></a>
						</div>
					</div>
				</div>
				<br><br>
			<?php endwhile; ?>

			<div style="padding-top: 5%; padding-bottom: 3%;">
				<div style="display: inline-block">
					<a href="../Evolução/Tabela_evolução.php?id=<?php echo $id; ?> & id_evolução=<?php echo $id_evolução; ?>" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
				</div>
				<div style="display: inline-block; padding-left:42.5%;">
					<input type="submit" name="btn-cadastrar" class="btn green lighten-1" value="ATUALIZAR">
				</div>
				<div style="display: inline; padding-left: 35%">
					<a href="create_campo.php?id=<?php echo $id; ?> & id_evolução=<?php echo $id_evolução; ?>" class="btn-floating green lighten-2"><i class="material-icons">add</i></a>
				</div>
			</div>
		</form>
	</main>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
</body>

</html>