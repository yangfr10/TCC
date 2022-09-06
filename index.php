<!DOCTYPE html>
<html>

<head>
  <meta charset='utf-8' />
  <link rel="stylesheet" type="text/css" href="config.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link href='Arquivos do Calendar/lib/main.css' rel='stylesheet' />

  <script src='Arquivos do Calendar/lib/main.js'></script>
  <script src='includes/calendar_config.js'></script>
</head>

<body>
  <?php
  include_once 'includes/header.php';
  include_once 'php_action/db_connect.php';
  //include_once 'includes/modal_calendar.php';
  ?>
  <main>
    
      <div style="padding-top:3%;">
        <div id='calendar'></div>
      </div>
      <!--<a href="#modal" class="btn modal-trigger">Acessar Calendário</a> -->
      <a href="includes/modal_calendar.php" class="btn">Acessar Calendário</a>
    <br>
    <hr>
    <br>
    <div class="button">
      <h3>Pacientes</h3>
      <a href="adicionar.php" class="waves-effect waves-light btn green">Cadastrar Paciente</a>
    </div>
    <table class="striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Prontuário</th>
          <th>Status</th>
          <th>Cadastro</th>


        </tr>
      </thead>

      <tbody>
        <?php
        $sql = "SELECT * FROM pacientes";
        $resultado = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_array($resultado)) :
        ?>
          <tr>
            <td><?php echo $dados['Nome']; ?></td>
            <td> <a href="prontuario.php?id=<?php echo $dados['Id']; ?>" class="btn cyan lighten-2">Acessar</a></td>
            <td>
              <a class='dropdown-button btn purple accent-1' data-activates='<?php echo $dados['Id']; ?>'>Selecionar</a>
              <ul id='<?php echo $dados['Id']; ?>' class='dropdown-content'>
                <li><a href="Avaliação/Tabela_avaliação.php?id=<?php echo $dados['Id']; ?>">Avaliação</a></li>
                <li><a href="Evolução/Tabela_evolução.php?id=<?php echo $dados['Id']; ?>">Evolução</a></li>
              </ul>
            </td>
            <td><a href="editar.php?id=<?php echo $dados['Id']; ?>" class="btn-floating blue"> <i class="material-icons">edit</i>
                <a href="php_action/delete.php?id=<?php echo $dados['Id']; ?>" class="btn-floating red"> <i class="material-icons">delete</i>
            </td>

          </tr>
        <?php endwhile; ?>
      </tbody>
    </table> <br><br><br><br><br><br><br>
  </main>
  <?php
  include_once 'includes/footer.php';
  ?>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.modal').modal();
    });
  </script>
</body>

</html>