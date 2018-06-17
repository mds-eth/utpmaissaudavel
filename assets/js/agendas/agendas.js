var agendas = {

    init: function () {

        $('.segunda').unbind('click');
        $('.segunda').on('click', agendas.montarAgendaSegunda);
        $('.terca').unbind('click');
        $('.terca').on('click', agendas.montarAgendaTerca);
        $('.quarta').unbind('click');
        $('.quarta').on('click', agendas.montarAgendaQuarta);
        $('.quinta').unbind('click');
        $('.quinta').on('click', agendas.montarAgendaQuinta);
        $('.sexta').unbind('click');
        $('.sexta').on('click', agendas.montarAgendaSexta);
        $('#validar').unbind('click');
        $('#validar').on('click', agendas.validarAgendaSemanal);
        $('#btnSalvarAgendaEspecialidade').on('click', agendas.gravarAgenda);

        agendas.montarCalendario();
        agendas.buscarPacientesCadastradosSemAgendamento();

        segundaIds = [];
        segundaEspecialidades = [];
        tercaIds = [];
        tercaEspecialidades = [];
        quartaIds = [];
        quartaEspecialidades = [];
        quintaIds = [];
        quintaEspecialidades = [];
        sextaIds = [];
        sextaEspecialidades = [];
    },

    montarAgendaSegunda: function () {

        if ($(this).parent().find('input').is(':checked')) {
            segundaIds.push($(this).val());
            segundaEspecialidades.push(this.id);
        } else {
            var id = segundaIds.indexOf($(this).val());
            segundaIds.splice(id, 1);
            var especialidade = segundaEspecialidades.indexOf(this.id);
            segundaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaTerca: function () {

        if ($(this).parent().find('input').is(':checked')) {
            tercaIds.push($(this).val());
            tercaEspecialidades.push(this.id);
        } else {
            var id = tercaIds.indexOf($(this).val());
            tercaIds.splice(id, 1);
            var especialidade = tercaEspecialidades.indexOf(this.id);
            tercaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaQuarta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            quartaIds.push($(this).val());
            quartaEspecialidades.push(this.id);
        } else {
            var id = quartaIds.indexOf($(this).val());
            quartaIds.splice(id, 1);
            var especialidade = quartaEspecialidades.indexOf(this.id);
            quartaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaQuinta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            quintaIds.push($(this).val());
            quintaEspecialidades.push(this.id);
        } else {
            var id = quintaIds.indexOf($(this).val());
            quintaIds.splice(id, 1);
            var especialidade = quintaEspecialidades.indexOf(this.id);
            quintaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaSexta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            sextaIds.push($(this).val());
            sextaEspecialidades.push(this.id);
        } else {
            var id = sextaIds.indexOf($(this).val());
            sextaIds.splice(id, 1);
            var especialidade = sextaEspecialidades.indexOf(this.id);
            sextaEspecialidades.splice(especialidade, 1);
        }
    },

    validarAgendaSemanal: function () {

        if ($('#dataInicial').val() !== '' && $('#dataFinal').val() !== '') {
            if ($('#dataInicial').val() > $('#dataFinal').val()) {
                $('#dataInicial').css('border', '1px solid red');
                $('#dataFinal').css('border', '1px solid red');
                swal("Atenção!", "Data inicial não pode ser maior que a data final!", "error");
                return;
            }
        }

        if ($('#dataInicial').val() === '') {
            $('#dataInicial').css('border', '1px solid red');
            swal("Atenção!", "Informe a data de início da agenda!", "error");
            return;
        }

        if ($('#dataFinal').val() === '') {
            $('#dataFinal').css('border', '1px solid red');
            swal("Atenção!", "Informe a data final da agenda!", "error");
            return;
        }

        if (segundaIds.length === 0) {
            swal("Atenção!", "Segunda não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (tercaIds.length === 0) {
            swal("Atenção!", "Terça não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (quartaIds.length === 0) {
            swal("Atenção!", "Quarta não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (quintaIds.length === 0) {
            swal("Atenção!", "Quinta não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (sextaIds.length === 0) {
            swal("Atenção!", "Sexta não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        agendas.validaSeExisteOutraAgendaAtiva();
    },

    validaSeExisteOutraAgendaAtiva: function () {

        $.ajax({
            url: URL + '/agendamentos/validaSeExisteOutraAgendaAtiva',
            type: 'POST',
            data: {status: 1},
            success: function (result) {

                if (result) {
                    agendas.chamaModalConfirmarAgenda();
                } else {
                    swal("Atenção!", "No momento já existe outra agenda ativa para este semestre, favor verificar!", "error");
                    return;
                }
            }
        }, 'json');
    },

    chamaModalConfirmarAgenda: function () {

        $('#bodyModalAgendaEspecialidade').html("");
        var pergunta = "Deseja definir agenda semestral iniciando em <b>" + $("#dataInicial").val() + "</b> e finalizando em <b>"
                + $('#dataFinal').val() + "</b>?<br/><br/>";
        var dias = "<b>Segunda</b>: " + segundaEspecialidades + "<br/>" +
                "<b>Terça</b>: " + tercaEspecialidades + "<br/>" +
                "<b>Quarta</b>: " + quartaEspecialidades + "<br/>" +
                "<b>Quinta</b>: " + quintaEspecialidades + "<br/>" +
                "<b>Sexta</b>: " + sextaEspecialidades + "<br/>";

        $('#bodyModalAgendaEspecialidade').append(pergunta, dias);
        $('#modalAgendaEspecialidade').modal("show");
    },

    gravarAgenda: function () {

        $.ajax({
            url: URL + '/agendamentos/cadastrarAgendaPorEspecialidade',
            type: 'POST',
            data: {
                dataInicial: $("#dataInicial").val(),
                dataFinal: $('#dataFinal').val(),
                segunda: segundaIds,
                terca: tercaIds,
                quarta: quartaIds,
                quinta: quintaIds,
                sexta: sextaIds
            },
            sucess: function (result) {

                if (parseInt(result) === 1) {
                    swal({text: "Cadastro realizado com Sucesso!", type: "success", confirmButtonText: "OK"});
                    window.location = URL + '/agendamentos/listagem';
                } else {
                    swal("Atenção!", "Já há outra agenda com estas mesmas datas, favor verificar!", "error");
                    return;

                }
            }
        });
    },

    montarCalendario: function () {

        $('#vincularPacienteAgenda').fullCalendar({
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'agendaWeek, agendaDay'
            },
            defaultView: 'agendaWeek',
            hiddenDays: [0, 6],
            navLinks: true,
            editable: true,
            droppable: true,
            minTime: "08:00:00",
            maxTime: "19:00:00",
            selectable: true,
            selectHelper: true,
            events: function () {

                $.ajax({
                    url: URL + '/usuarios/buscarAlunosParaRenderizarAgenda',
                    type: 'POST',
                    dataType: 'json',
                    success: function (result) {

                        for (var i in result) {

                            var aluno = result[i];

                        }
                    }
                });
            }
        });
    },

    buscarPacientesCadastradosSemAgendamento: function () {

        $.ajax({
            url: URL + '/agendamentos/buscarPacientesCadastradosSemAgendamento',
            type: 'POST',
            dataType: 'json',
            success: function (result) {
                
                $('#pacientes').html("");

                if (result) {

                    for (var i in result) {

                        var paciente = result[i];
                        var btn = "<span class='paciente btn-warning btn-xs'><b>" + paciente.nome_pessoa + "</b></span><br>";
                        $('#pacientes').append(btn);
                    }
                } else {
                    var pacienteVazio = "<p>No momento não há novos pacientes sem agendamento!</p>";
                    $('#pacientes').append(pacienteVazio);
                }
            }
        });
    }
};
$(document).ready(function () {
    agendas.init();
});
