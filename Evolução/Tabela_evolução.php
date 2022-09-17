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
  $sql = "SELECT * FROM pacientes WHERE Id='$id'";
  $query = mysqli_query($connect, $sql);
  $array = mysqli_fetch_array($query);
  ?>
  <main>
    <div style="padding-left: 2%;">
      <h4>Evoluções: <?php echo $array['Nome']; ?></h4>
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
        $sql = "SELECT * FROM evolucao where id_paciente = '$id'";
        $resultado = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_array($resultado)) :
        ?>

          <!-- Modal Excluir -->
          <div class="modal" id="excluir_evolução <?php echo $dados['Id_evolucao']; ?>">
            <div class="modal-content">
              <h5>TEM CERTEZA QUE DESEJA EXCLUIR O REGISTRO?</h5>
            </div>
            <div class="modal-footer">
              <a class="btn modal-close modal-action green darken-1">CANCELAR</a>
              <a href="evolução_action/Evolução_delete.php?id_evolução=<?php echo $dados['Id_evolucao']; ?> & id=<?php echo $id; ?>" class="btn red darken-1" class="btn waves effect-waves ligth red darken-1">Apagar</a>
            </div>
          </div>

          <tr>
            <td><?php echo $dados['Nome_evolucao']; ?></td>
            <td> <a href="../Campo_evolução/Campos_evolução.php?id_evolução=<?php echo $dados['Id_evolucao']; ?> & id=<?php echo $id ?>" class="btn cyan lighten-2">Acessar</a></td>
            <td><a href="Editar_evolução.php?id_evolução=<?php echo $dados['Id_evolucao']; ?> & id=<?php echo $id ?>" class="btn-floating blue darken-2"> <i class="material-icons">edit</i>
                <a href="#excluir_evolução <?php echo $dados['Id_evolucao']; ?>" class="btn-floating modal-trigger red darken-1"> <i class="material-icons">delete</i>
            </td>

          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>

    <div style="padding-top: 3%; padding-bottom: 3%;">
      <div style="display: inline-block">
        <a href="../index.php" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
      </div>
      <div style="display: inline-block; padding-left:42.5%;">
        <a href="Adicionar_evolução.php?id=<?php echo $id; ?>" class="btn-floating green lighten-2"><i class="material-icons">add</i></a>
      </div>
    </div>

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