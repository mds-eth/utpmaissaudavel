var agendas = {

    init: function () {

        $('#segunda').on('click', agendas.montaAgendaSegunda);
        $('#terca').on('click', agendas.montaAgendaTerca);
        $('#quarta').on('click', agendas.montaAgendaQuarta);
        $('#quinta').on('click', agendas.montaAgendaQuinta);
        $('#sexta').on('click', agendas.montaAgendaSexta);
    },

    montaAgendaSegunda: function () {

        var segunda = $('#segunda').val();

        $('#especialidadeSegunda').append(segunda);

    },

    montaAgendaTerca: function () {

        alert($('#segunda').val());

    },

    montaAgendaQuarta: function () {

        alert($('#segunda').val());

    },

    montaAgendaQuinta: function () {

        alert($('#segunda').val());

    },

    montaAgendaSexta: function () {

        alert($('#segunda').val());
    }
};


$(document).ready(function () {
    agendas.init();
});