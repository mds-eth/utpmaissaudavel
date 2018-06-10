var agendas = {

    init: function () {

        $('.segunda').on('click', agendas.montarAgendaSegunda);
        $('.terca').on('click', agendas.montarAgendaTerca);
        $('.quarta').on('click', agendas.montarAgendaQuarta);
        $('.quinta').on('click', agendas.montarAgendaQuinta);
        $('.sexta').on('click', agendas.montarAgendaSexta);
    },

    montarAgendaSegunda: function () {

        var especialidades = [$(this).val()];
        alert(especialidades);
        return;
    },

    montarAgendaTerca: function () {

        var especialidades = [$(this).val()];
        alert(especialidades);
        return;
    },

    montarAgendaQuarta: function () {

        var especialidades = [$(this).val()];
        alert(especialidades);
        return;
    },

    montarAgendaQuinta: function () {

        var especialidades = [$(this).val()];
        alert(especialidades);
        return;
    },

    montarAgendaSexta: function () {

        var especialidades = [$(this).val()];
        alert(especialidades);
        return;
    },

};


$(document).ready(function () {
    agendas.init();
});