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
    $sql = "SELECT * FROM pacientes WHERE arquivado = 1;";
    $resultado = mysqli_query($connect, $sql);
    // $array = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    //var_dump($array);
    //echo $array['1']['Id'];
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
          while ($dados = mysqli_fetch_all($resultado, MYSQLI_ASSOC)) :
            foreach ($dados as $chave => $valor) {
          ?>

              <!-- Modal Excluir -->
              <div class="modal" id="modal_excluir <?php echo $valor['Id'] ?>">
                <div class="modal-content">
                  <h5>Tem certeza que deseja excluir o paciente <p style="font-size:1.64rem; font-weight: bold; padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; text-transform: uppercase;"><?php echo $valor['Nome'] ?></p>? Todos os dados do registro
                incluindo o seu prontuário, avaliações e evoluções serão perdidas. 
                </h5>
                </div>
                <div class="modal-footer">
                  <a class="btn modal-close modal-action green darken-1">CANCELAR</a>
                  <a href="php_action/delete.php?id=<?php echo $valor['Id']; ?>" class="btn waves effect-waves ligth red darken-1">Apagar</a>
                </div>
              </div>

              <tr>
                <td>
                  <p style="text-transform: uppercase; padding-left: 2%;"><?php echo $valor['Nome'];
                                                                          ?></p>
                </td>
                <td>
                  <a href="prontuario.php?id=<?php echo $valor['Id'];
                                              ?>" class="btn-floating cyan lighten-2"> <i class="material-icons">content_paste</i></a>
                  <a href="php_action/desarquivar.php?id=<?php echo $valor['Id'];
                                                          ?>" class="btn-floating teal"> <i class="material-icons">undo</i> </a>
                  <a href="#modal_excluir <?php echo $valor['Id'] ?>" class="btn-floating modal-trigger red darken-1"> <i class="material-icons">delete</i></a>
                </td>


              </tr>



            <?php
              foreach ($valor as $indice => $result) {
              }
            }
            ?>



          <?php
          endwhile;

          ?>

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