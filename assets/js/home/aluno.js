var home = {

    init: function () {

        home.buscaMeusPacientes();
        home.renderizaCalendario();

        $('#btn-modal-iniciar-sessao-paciente').on('click', home.iniciarSessao);
    },

    iniciarSessao: function () {

        window.location.href = URL + '/avaliacoes/paciente/' + $('#id-paciente').val();

    },

    buscaMeusPacientes: function () {

        $.ajax({
            url: URL + '/agendamentos/buscaMeusPacientes',
            type: 'POST',
            dataType: 'json',
            success: function (result) {

                for (var i in result) {

                    var paciente = result[i];

                    var horario = {

                        id: paciente.id_pessoa,
                        title: paciente.nome_pessoa,
                        start: home.convertData(paciente.data_sessao) + " " + paciente.hora_inicio,
                        end: home.convertData(paciente.data_sessao) + " " + paciente.hora_fim,
                        sessao: paciente.sessao,
                        color: 'black'
                    };
                    $('#calendario').fullCalendar('renderEvent', horario, true);
                }

            }
        });
    },

    renderizaCalendario: function () {

        $('#calendario').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            height: 'auto',
            defaultView: 'month',
            hiddenDays: [0, 6],
            navLinks: true,
            minTime: "08:00:00",
            maxTime: "19:00:00",
            eventClick: function (event) {

                $('#body-modal-paciente-selecionado').html("");
                var input = "<input type='hidden' id='id-paciente' name='id-paciente' value='" + event.id + "'>";
                var paciente = "Nome paciente:  <b>" + event.title + "</b><br>" +
                        "Data/Hora início: <b>" + $.fullCalendar.formatDate(event.start, 'DD-MM-YYYY hh:mm') + "</b><br>" +
                        "Data/Hora fim: <b>" + $.fullCalendar.formatDate(event.end, 'DD-MM-YYYY hh:mm') + "</b><br>" +
                        "Sessão: <b>" + event.sessao + "</b>";

                $('#body-modal-paciente-selecionado').append(paciente, input);
                $('#modal-paciente-selecionado').modal("show");
            }
        });

    },

    convertData: function (data) {

        var dia = data.split("/")[0];
        var mes = data.split("/")[1];
        var ano = data.split("/")[2];

        return ano + '-' + ("0" + mes).slice(-2) + '-' + ("0" + dia).slice(-2);

    }
};
$(document).ready(function () {
    home.init();
});