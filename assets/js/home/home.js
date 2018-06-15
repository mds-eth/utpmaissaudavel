var home = {

    init: function () {

        $('#calendario').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
        });

    }
};


$(document).ready(function () {
    home.init();
});