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
<h4>Novo Paciente</h4>
<form action="php_action/create.php" method="GET">
Nome: <br>
<input type="text" name="nome" id="nome"> 
Email: <br>
<input type="text" name="email" id="email">
CPF: <br>
<input type="number" name="cpf" id="cpf">
Telefone: <br>
<input type="number" name="telefone" id="telefone">
Idade: <br>
<input type="number" name="idade" id="idade">
Endereço: <br>
<input type="text" name="endereço" id="endereço">
<input type="submit" name="btn-cadastrar" class="btn pink" value="CADASTRAR">
<a href="index.php" class="btn red">VOLTAR</a>
</form>
 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>