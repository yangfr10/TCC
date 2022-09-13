<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="config.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
	<title>
		Editar Paciente
	</title>
	<meta charset="utf-8">
</head>

<body>
	<?php
	include_once 'includes/header.php';
	include_once 'php_action/db_connect.php';
	if (isset($_GET['id'])) {
		$id = mysqli_escape_string($connect, $_GET['id']);
		$sql = "SELECT * FROM pacientes WHERE id = '$id'";
		$resultado = mysqli_query($connect, $sql);
		$dados = mysqli_fetch_array($resultado);
	}
	?>
	<main>
		<div style="padding-left:2%;">
			<h4>Editar Paciente</h4>
		</div>

		<form action="php_action/update.php" method="GET">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $dados['Nome']; ?>" required>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">email</i>
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" value="<?php echo $dados['Email']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">people</i>
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" value="<?php echo $dados['CPF']; ?>">
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">person</i>
                    <label for="idade">Idade</label>
                    <input type="number" name="idade" id="idade" value="<?php echo $dados['Idade']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">phone</i>
                    <label for="telefone">Telefone</label>
                    <input type="number" name="telefone" id="telefone" value="<?php echo $dados['Telefone']; ?>">
                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">home</i>
                    <label for="endereço">Endereço</label>
                    <input type="text" name="endereço" id="endereço" value="<?php echo $dados['Endereco']; ?>">
                </div>
            </div>

            <div style="padding-top: 3%; padding-bottom: 3%;">
                <div style="display: inline-block">
                    <a href="index.php" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
                </div>
                <div style="display: inline-block; padding-left:42.5%;">
                <input type="submit" name="btn-editar" class="btn green lighten-1" value="CONCLUIR">
                </div>
            </div>
		</form>

	</main>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>

</html>