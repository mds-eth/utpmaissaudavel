var home = {

    buscaMeusPacientes: function () {


        $('#calendario').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'agendaWeek, agendaDay'
            },
            defaultView: 'agendaWeek',
            hiddenDays: [0, 6],
            navLinks: true,
            editable: true,
            droppable: true,
            minTime: "08:00:00",
            maxTime: "19:00:00"
        });

    }
};
$(document).ready(function () {
    home.buscaMeusPacientes();
});