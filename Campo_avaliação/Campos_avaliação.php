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
	include_once '../php_action/db_connect.php';
	include_once '../includes/header.php';
	$id = mysqli_escape_string($connect, $_GET['id']);
	$id_avaliação = mysqli_escape_string($connect, $_GET['id_avaliação']);
	$sql = "SELECT * FROM campo_avaliacao WHERE Id_avaliacao = '$id_avaliação'";
	$resultado = mysqli_query($connect, $sql);
	?>
	<main>
		<h4 style="padding-bottom: 3%;">Campos Avaliação:</h4>
		<form action="update_campo.php" method="GET">
			<input type="hidden" name="id" id="id" value="<?php echo $id ?>">
			<input type="hidden" name="id_avaliação" id="id_avaliação" value="<?php echo $id_avaliação ?>">

			<?php while ($dados = mysqli_fetch_array($resultado)) : ?>

				<!-- Modal Excluir -->
				<div class="modal" id="excluir_campo_avaliação <?php echo $dados['Id_campo_avaliacao']; ?>">
					<div class="modal-content">
						<h5>TEM CERTEZA QUE DESEJA EXCLUIR O REGISTRO?</h5>
					</div>
					<div class="modal-footer">
						<a class="btn modal-close modal-action green darken-1">CANCELAR</a>
						<a href="delete_campo.php?id=<?php echo $id; ?> & id_avaliação=<?php echo $id_avaliação; ?> & id_campo_avaliação=<?php echo $dados['Id_campo_avaliacao']; ?>" class="btn red darken-1" class="btn waves effect-waves ligth red darken-1">Apagar</a>
					</div>
				</div>

				<div class="row">
					<div class="input-field col s8">
						<label>Nome Campo</label>
						<input type="text" name="<?php echo $dados['Id_campo_avaliacao']; ?>" value="<?php echo $dados['Nome_campo_avaliacao']; ?>">
					</div>
				</div>
				<div class="row">
					<div class="input-field col s8">
						<label for="<?php echo -1 * $dados['Id_campo_avaliacao']; ?>">Informações: </label>
						<textarea class="materialize-textarea" style="display: inline-block;" name="<?php echo -1 * $dados['Id_campo_avaliacao']; ?>" id="<?php echo -1 * $dados['Id_campo_avaliacao']; ?>"><?php echo $dados['Info_campo_avaliacao']; ?></textarea>
					</div>
					<div style="padding-left: 80%">
						<a href="#excluir_campo_avaliação <?php echo $dados['Id_campo_avaliacao'] ?>" style="display: inline-block;" class="btn modal-trigger red btn-large"><i class="material-icons" style="font-size: 4rem;">delete</i></a>
					</div>
				</div>
				<br><br>
			<?php endwhile; ?>


			<div style="padding-top: 5%; padding-bottom: 3%;">
				<div style="display: inline-block">
					<a href="../Avaliação/Tabela_avaliação.php?id=<?php echo $id; ?> & id_avaliação=<?php echo $id_avaliação; ?>" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
				</div>
				<div style="display: inline-block; padding-left:42.5%;">
					<input type="submit" name="btn-cadastrar" class="btn green lighten-1" value="ATUALIZAR">
				</div>
				<div style="display: inline; padding-left: 35%">
					<a href="create_campo.php?id=<?php echo $id; ?> & id_avaliação=<?php echo $id_avaliação; ?>" class="btn-floating green lighten-2"><i class="material-icons">add</i></a>
				</div>
			</div>
		</form>
	</main>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../js/materialize.min.js"></script>
	<script>
		$(document).ready(function() {
			$('.modal').modal();
			$('select').material_select();
		});
	</script>
</body>

</html>