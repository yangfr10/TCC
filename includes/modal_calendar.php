<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <!-- <link rel="stylesheet" type="text/css" href="config.css"> -->
  <!-- <script src='includes/calendar_config.js'></script> -->
  <link href='../Arquivos do Calendar/lib/main.css' rel='stylesheet' />
  <script src='../Arquivos do Calendar/lib/main.js'></script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar_modal');

      var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        events: '../Calendar_action/list_events.php',
        eventClick: function(info) {
          $("#delete").attr("href", "Calendar_action/delete_event.php?id=" + info.event.id);
          info.jsEvent.preventDefault();
          $('#modal #id').text(info.event.id);
          $('#modal #id').val(info.event.id);
          $('#modal #title').text(info.event.title);
          $('#modal #title').val(info.event.title);
          $('#modal #start').text(info.event.start.toLocaleString());
          $('#modal #start').val(info.event.start.toLocaleString());
          $('#modal #end').text(info.event.end.toLocaleString());
          $('#modal #end').val(info.event.end.toLocaleString());
          $('#modal #color').val(info.event.backgroundColor);
          $('#modal').modal('open');
        },
        selectable: true,
        select: function(info) {
          $('#cadastrar #start').val(info.start.toLocaleString()),
            $('#cadastrar #end').val(info.end.toLocaleString()),
            $('#cadastrar').modal('open');
        },
        headerToolbar: {
          left: 'today',
          right: 'prev,next',
          center: 'title',
        },
        // initialView: 'dayGridWeek',
        //initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        selectable: true,
        //height: 200,
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

    .vis_event {
      display: block;
    }

    .formedit {
      display: none;
    }
  </style>

</head>

<body>

  <!-- <div class="modal" id="modal">
    <h4 style="padding: 20px 20px 20px 20px;">Calendário</h4>
    <div class="hr" style="padding: 0px 20px 20px 20px;">
        <hr />
    </div>
   
</div> -->
  <div id='calendar_modal'></div>

</body>

</html>