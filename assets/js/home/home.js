var home = {

    init: function () {

        home.buscaMeusPacientes();
        home.renderizaCalendario();
    },

    renderizaCalendario: function () {

        $('#calendario').fullCalendar({
            header: {
                left: 'prev, next, today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            height: 'auto',
            defaultView: 'agendaWeek',
            hiddenDays: [0, 6],
            navLinks: true,
            minTime: "08:00:00",
            maxTime: "19:00:00",
            eventClick: function (event) {

                $('#body-modal-paciente-selecionado').html("");
                var paciente = "Nome paciente:  <b>" + event.title + "</b><br>" +
                        "Hora início: <b>" + event.start + "</b><br>" +
                        "Hora fim: <b>" + event.end + "</b>";

                $('#body-modal-paciente-selecionado').append(paciente);
                $('#modal-paciente-selecionado').modal("show");
            }
        });

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
                        color: 'red'
                    };
                    $('#calendario').fullCalendar('renderEvent', horario, true);
                }

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