<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
 <title>
 Adicionar Paciente
 </title>
<meta charset="utf-8">
</head>
<body>
<?php
include_once 'php_action/db_connect.php';
if(isset($_GET['id'])){
	$id = mysqli_escape_string($connect, $_GET['id']);
	$sql = "SELECT * FROM pacientes WHERE id = '$id'";
	$resultado = mysqli_query($connect, $sql);
	$dados = mysqli_fetch_array($resultado);
}
?>
<h4>Novo Paciente</h4>
<form action="php_action/update.php" method="GET">
<input type="hidden" name="id" value="<?php echo $dados['Id'];?>">
Nome: <br>
<input type="text" name="nome" id="nome" value="<?php echo $dados['Nome'];?>">
Email: <br>
<input type="text" name="email" id="email" value="<?php echo $dados['Email'];?>">
CPF: <br>
<input type="number" name="cpf" id="cpf" value="<?php echo $dados['CPF'];?>">
Telefone: <br>
<input type="text" name="telefone" id="telefone" value="<?php echo $dados['Telefone']; ?>">
Idade: <br> 
<input type="text" name="idade" id="idade" value="<?php echo $dados['Idade']; ?>">
Endereço: <br>
<input type="text" name="endereço" id="endereço" value="<?php echo $dados['Endereco']; ?>">
<input type="submit" name="btn-editar" class="btn pink" value="ATUALIZAR">
<a href="index.php" class="btn red">VOLTAR</a>
</form>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>