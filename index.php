<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css.css">
 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
<meta charset="utf-8">

<meta charset='utf-8' />
  <link href='Arquivos do Calendar/lib/main.css' rel='stylesheet' />
  <script src='Arquivos do Calendar/lib/main.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        events: 'list_events.php',
        eventClick: function(info) {
          info.jsEvent.preventDefault();
          $('#modal #id').text(info.event.id);
          $('#modal #title').text(info.event.title);
          $('#modal #start').text(info.event.start.toLocaleString());
          $('#modal #end').text(info.event.end.toLocaleString());
          $('#modal').modal('open');
        },
        selectable: true,
        select: function(info) {
          //alert('Início do evento ' + info.start.toLocaleString());
          //alert('Fim do evento ' + info.end.toLocaleString());
          $('#cadastrar #start').val(info.start.toLocaleString()),
            $('#cadastrar #end').val(info.end.toLocaleString()),
            $('#cadastrar').modal('open');
        },
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
        },
        initialView: 'dayGridWeek',
        //initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        height: 200,
      });

      calendar.render();
    });
  </script>
  <style>
    body {
      margin: 40px 10px;
      padding: 0;
      font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
      font-size: 14px;
    }

    #calendar {
      max-width: 1100px;
      margin: 0 auto;
    }
  </style>


</head>
<body>
<?php
include_once 'php_action/db_connect.php';
?>
  <nav>
    <div class="nav-wrapper">
      <a href="#" class="brand-logo">Elisandra Plate</a>
    </div>
  </nav>
  <br>
 <fieldset>
    <p>Calendário Semana</p>
  <div>
  <div id='calendar'></div>
  </div>
	  <p class="jupiter" href="">Acessar Calendário</p>
	  </fieldset>
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
		while($dados = mysqli_fetch_array($resultado)):
		?>
          <tr>
            <td><?php echo $dados['Nome']; ?></td>
			<td> <a href="prontuario.php?id=<?php echo $dados['Id']; ?>" class="btn cyan lighten-2">Acessar</a></td>
			<td>   
	    <a class='dropdown-button btn purple accent-1' data-activates='<?php echo $dados['Id'];?>'>Selecionar</a>
        <ul id='<?php echo $dados['Id'];?>' class='dropdown-content'>
        <li><a href="Avaliação/Tabela_avaliação.php?id=<?php echo $dados['Id'];?>">Avaliação</a></li>
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
	          <footer class="page-footer lime accent-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text text-lighten-10">Elisandra Plate</h5>
                <p class="white-text text-lighten-10">Fisioterapia, pilates, terapia ocupacional</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="white-text text-lighten-10" href="#!">PsiFisio</a></li>
                  <li><a class="white-text text-lighten-10" href="#!">PsiFisio Youtube</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2022 Copyright Elisandra Plate
            <a class="white-text text-lighten-10 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>


 <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>