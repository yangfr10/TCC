<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" type="text/css" href="../config.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
<meta charset="utf-8">
</head>
<body> 
<?php 
    include_once '../includes/header.php';
    include_once '../php_action/db_connect.php';
	$id = mysqli_escape_string($connect, $_GET['id']);
?>
<main>
<h1>Avaliações:</h1>
<div class="center-align">
<a href="Adicionar_avaliação.php?id=<?php echo $id; ?>" class="waves-effect waves-light btn orange">Cadastrar Avaliação</a>
</div>
<table class="striped">
        <thead>
          <tr>
              <th>Nome</th>
			  <th>Informações</th>
			  <th>Cadastro</th>
          </tr>
        </thead>

        <tbody>
		<?php
		$sql = "SELECT * FROM avaliacao where id_paciente = '$id'";
		$resultado = mysqli_query($connect, $sql);
		while($dados = mysqli_fetch_array($resultado)):
		?>
          <tr>
            <td><?php echo $dados['Nome_avaliacao']; ?></td>
			<td> <a href="../Campo_avaliação/Campos_avaliação.php?id_avaliação=<?php echo $dados['Id_avaliacao']; ?> & id=<?php echo $id ?>" class="btn cyan lighten-2">Acessar</a></td>
			<td><a href="Editar_avaliação.php?id_avaliação=<?php echo $dados['Id_avaliacao']; ?> & id=<?php echo $id ?>" class="btn-floating blue"> <i class="material-icons">edit</i>
			    <a href="avaliação_action/Avaliação_delete.php?id_avaliação=<?php echo $dados['Id_avaliacao']; ?> & id=<?php echo $id; ?>" class="btn-floating red"> <i class="material-icons">delete</i>
			</td>
            
          </tr>
       <?php endwhile; ?>
	           </tbody>
      </table>

<a href="../index.php" class="btn orange accent-4">VOLTAR</a>
    </main>
    <?php
include_once '../includes/footer.php';
    ?>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>