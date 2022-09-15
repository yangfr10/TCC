<DOCTYPE HTML>
  <html>

  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" type="text/css" href="config.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link href='Arquivos do Calendar/lib/main.css' rel='stylesheet' />

    <script src='Arquivos do Calendar/lib/main.js'></script>
    <script src='includes/calendar_config.js'></script>
    <title>
      Arquivados
    </title>

  </head>

  <body>
    <?php
    include_once 'php_action/db_connect.php';
    include_once 'includes/header.php';
    
    ?>
    <main>
      <h4>Arquivados</h4>
      <table class="striped">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Status</th>


          </tr>
        </thead>

        <tbody>
          <?php
          $sql = "SELECT * FROM pacientes WHERE arquivado = 1;";
          $resultado = mysqli_query($connect, $sql);
          $dados = mysqli_fetch_array($resultado);
          while ($dados = mysqli_fetch_array($resultado)) :
          ?>
            <tr>
              <td>
                <p style="text-transform: uppercase; padding-left: 2%;"><?php echo $dados['Nome']; ?></p>
              </td>
              <td>
                <a href="prontuario.php?id=<?php echo $dados['Id']; ?>" class="btn-floating cyan lighten-2"> <i class="material-icons">content_paste</i></a>
                <a href="php_action/desarquivar.php?id=<?php echo $dados['Id']; ?>" class="btn-floating teal"> <i class="material-icons">undo</i> </a>
                <a href="#modal_excluir" class="btn modal-trigger red darken-1"> <i class="material-icons">delete</i></a>
              </td>


            </tr>
          <?php endwhile;
          include_once 'includes/modal_excluir.php'; ?>
        </tbody>
      </table>
      <div class="center-align" style="padding-top: 2%;">
        <a href="index.php" class="btn-floating green lighten-2"><i class="material-icons">keyboard_backspace</i></a>
      </div>
    </main>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script>
      $(document).ready(function() {
        $('.modal').modal();
        $('select').material_select();
      });
    </script>

  </body>

  </html>