document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        events: 'Calendar_action/list_events.php',
        eventClick: function (info) {
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
        select: function (info) {
            $('#cadastrar #start').val(info.start.toLocaleString()),
                $('#cadastrar #end').val(info.end.toLocaleString()),
                $('#cadastrar').modal('open');
        },
        headerToolbar: {
            left: 'today',
            right: 'prev,next',
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

