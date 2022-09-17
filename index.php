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
    <div style="padding-left: 2%;">
      <h4>Calendário Semanal</h4>
    </div>
    <div>
      <div id='calendar'></div>
    </div>
    <?php
    include_once 'includes/modal_info.php';
    include_once 'includes/modal_edit.php';
    include_once 'includes/modal_form.php';
    ?>

    <!--<a href="#modal" class="btn modal-trigger">Acessar Calendário</a> -->
    <div style="text-align: center; padding-top: 2%; padding-bottom: 2%;">
      <a href="includes/modal_calendar.php" class="btn-floating teal lighten-3"> <i class="material-icons">event</i> </a>
    </div>

    <hr>

    <div style="padding-left: 2%;">
      <h4>Pacientes</h4>
    </div>
    <table class="striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>Avaliação</th>
          <th>Evolução</th>
          <th>Status</th>


        </tr>
      </thead>

      <tbody>

        <?php
        $sql = "SELECT * FROM pacientes WHERE arquivado = 0";
        $resultado = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_array($resultado)) :
        ?>


          <tr>
            <td>
              <p style="text-transform: uppercase; padding-left: 2%;"><?php echo $dados['Nome']; ?></p>
            </td>

            <td>
              <a href="Avaliação/Tabela_avaliação.php?id=<?php echo $dados['Id']; ?>" class="btn teal lighten-2">Acessar</a>
            </td>
            <td>
              <a href="Evolução/Tabela_evolução.php?id=<?php echo $dados['Id']; ?>" class="btn blue lighten-1">Acessar</a>
            </td>
            <td>
              <a href="prontuario.php?id=<?php echo $dados['Id']; ?>" class="btn-floating cyan lighten-2"> <i class="material-icons">content_paste</i></a>
              <a href="editar.php?id=<?php echo $dados['Id']; ?>" class="btn-floating blue darken-2"> <i class="material-icons">edit</i> </a>

              <a href="#modal_arquivar <?php echo $dados['Id'] ?>" class="btn-floating modal-trigger teal"> <i class="material-icons">folder</i></a>

            </td>


          </tr>
          <!-- Modal Arquivar -->
          <div class="modal" id="modal_arquivar <?php echo $dados['Id'] ?>">
            <div class="modal-content">
              <h5>TEM CERTEZA QUE DESEJA ARQUIVAR O REGISTRO?</h5>
            </div>
            <div class="modal-footer">
              <a class="btn modal-close modal-action green darken-1">CANCELAR</a>
              <a href="php_action/arquivar.php?id=<?php echo $dados['Id']; ?>" class="btn waves effect-waves light teal">ARQUIVAR</a>
            </div>
          </div>
        <?php endwhile; ?>

      </tbody>
    </table>



    <div style="text-align:center; padding-top:2%; padding-bottom: 5%">
      <a href="adicionar.php" class="waves-effect waves-light btn-floating green lighten-2"><i class="material-icons">add</i></a>
    </div>
  </main>
  <?php
  include_once 'includes/footer.php';
  ?>

  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.modal').modal();
      $('select').material_select();
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.btn-toggle').on('click', function() {
        $('.vis_event').slideToggle();
        $('.formedit').slideToggle();
      });
    });

    $(document).ready(function() {
      $('.btn-cancelar').on('click', function() {
        $('.formedit').slideToggle();
        $('.vis_event').slideToggle();
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $('.btn-toggle').on('click', function() {
        $('.vis_event').slideToggle();
        $('.formedit').slideToggle();
      });
    });

    $(document).ready(function() {
      $('.btn-cancelar').on('click', function() {
        $('.formedit').slideToggle();
        $('.vis_event').slideToggle();
      });
    });
  </script>
</body>

</html>