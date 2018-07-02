var agendas = {

    init: function () {

        horarios = [];
        checkAgenda = false;

        date = new Date;
        months = {1: '01', 2: '02', 3: '03', 4: '04', 5: '05', 6: '06', 7: '07', 8: '08', 9: '09', 10: '10', 11: '11', 11: '12'};
        currentDate = '0' + date.getDate() + '/' + months[date.getMonth() + 1] + '/' + date.getFullYear();
        finaisDeSemana = {0: 'Domingo', 6: 'Sábado'};


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

        agendas.montarCalendario();
        agendas.buscaUltimoPacienteCadastrado();

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
        $('#aluno').on('change', agendas.buscaAgendaAlunoSelecionado);
        $('#validar').unbind('click');
        $('#validar').on('click', agendas.validarAgendaSemanal);

        $('#hora-fim-primeira-sessao').on('blur', agendas.renderizaAgendaPrimeiraSessao);
        $('#hora-fim-segunda-sessao').on('blur', agendas.renderizaAgendaSegundaSessao);
        $('#hora-fim-terceira-sessao').on('blur', agendas.renderizaAgendaTerceiraSessao);
        $('#hora-fim-quarta-sessao').on('blur', agendas.renderizaAgendaQuartaSessao);
        $('#hora-fim-quinta-sessao').on('blur', agendas.renderizaAgendaQuintaSessao);
        $('#hora-fim-sexta-sessao').on('blur', agendas.renderizaAgendaSextaSessao);
        $('#hora-fim-setima-sessao').on('blur', agendas.renderizaAgendaSetimaSessao);
        $('#hora-fim-oitava-sessao').on('blur', agendas.renderizaAgendaOitavaSessao);
        $('#hora-fim-nona-sessao').on('blur', agendas.renderizaAgendaNonaSessao);
        $('#hora-fim-decima-sessao').on('blur', agendas.renderizaAgendaDecimaSessao);

        $('#btn-salvar-agenda-especialidade').on('click', agendas.gravarAgenda);
        $('#btn-visualizar-agenda-paciente').on('click', agendas.validaCamposAgendaPaciente);
        $('#btn-modal-confirmar-agenda-paciente').on('click', agendas.gravaAgendaPaciente);
    },

    errorDataMenor: function () {

        var errorDataMenor = swal("Atenção!", "Data informada menor que data atual, favor marcar sessões para dias futuros!", "error");
        return errorDataMenor;
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

    renderizaAgendaPrimeiraSessao: function () {

        if ($('#data-primeira-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-primeira-sessao').val("");
            $('#hora-inicio-primeira-sessao').val("");
            $('#hora-fim-primeira-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-primeira-sessao').val()) + " " + $('#hora-inicio-primeira-sessao').val(),
            end: agendas.convertData($('#data-primeira-sessao').val()) + " " + $('#hora-fim-primeira-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaSegundaSessao: function () {

        if ($('#data-segunda-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-segunda-sessao').val("");
            $('#hora-inicio-segunda-sessao').val("");
            $('#hora-fim-segunda-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-segunda-sessao').val()) + " " + $('#hora-inicio-segunda-sessao').val(),
            end: agendas.convertData($('#data-segunda-sessao').val()) + " " + $('#hora-fim-segunda-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaTerceiraSessao: function () {

        if ($('#data-terceira-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-terceira-sessao').val("");
            $('#hora-inicio-terceira-sessao').val("");
            $('#hora-fim-terceira-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-terceira-sessao').val()) + " " + $('#hora-inicio-terceira-sessao').val(),
            end: agendas.convertData($('#data-terceira-sessao').val()) + " " + $('#hora-fim-terceira-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaQuartaSessao: function () {

        if ($('#data-quarta-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-quarta-sessao').val("");
            $('#hora-inicio-quarta-sessao').val("");
            $('#hora-fim-quarta-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-quarta-sessao').val()) + " " + $('#hora-inicio-quarta-sessao').val(),
            end: agendas.convertData($('#data-quarta-sessao').val()) + " " + $('#hora-fim-quarta-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaQuintaSessao: function () {

        if ($('#data-quinta-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-quinta-sessao').val("");
            $('#hora-inicio-quinta-sessao').val("");
            $('#hora-fim-quinta-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-quinta-sessao').val()) + " " + $('#hora-inicio-quinta-sessao').val(),
            end: agendas.convertData($('#data-quinta-sessao').val()) + " " + $('#hora-fim-quinta-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaSextaSessao: function () {

        if ($('#data-sexta-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-sexta-sessao').val("");
            $('#hora-inicio-sexta-sessao').val("");
            $('#hora-fim-sexta-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-sexta-sessao').val()) + " " + $('#hora-inicio-sexta-sessao').val(),
            end: agendas.convertData($('#data-sexta-sessao').val()) + " " + $('#hora-fim-sexta-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaSetimaSessao: function () {

        if ($('#data-setima-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-setima-sessao').val("");
            $('#hora-inicio-setima-sessao').val("");
            $('#hora-fim-setima-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-setima-sessao').val()) + " " + $('#hora-inicio-setima-sessao').val(),
            end: agendas.convertData($('#data-setima-sessao').val()) + " " + $('#hora-fim-setima-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaOitavaSessao: function () {

        if ($('#data-oitava-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-oitava-sessao').val("");
            $('#hora-inicio-oitava-sessao').val("");
            $('#hora-fim-oitava-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-oitava-sessao').val()) + " " + $('#hora-inicio-oitava-sessao').val(),
            end: agendas.convertData($('#data-oitava-sessao').val()) + " " + $('#hora-fim-oitava-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaNonaSessao: function () {

        if ($('#data-nona-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-nona-sessao').val("");
            $('#hora-inicio-nona-sessao').val("");
            $('#hora-fim-nona-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-nona-sessao').val()) + " " + $('#hora-inicio-nona-sessao').val(),
            end: agendas.convertData($('#data-nona-sessao').val()) + " " + $('#hora-fim-nona-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    renderizaAgendaDecimaSessao: function () {

        if ($('#data-decima-sessao').val().replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3') < currentDate.replace(/(\d{2})\/(\d{2})\/(\d{4})/, '$2/$1/$3')) {
            agendas.errorDataMenor();
            $('#data-decima-sessao').val("");
            $('#hora-inicio-decima-sessao').val("");
            $('#hora-fim-decima-sessao').val("");
            return;
        }

        var horario = {

            title: $('#paciente').val(),
            start: agendas.convertData($('#data-decima-sessao').val()) + " " + $('#hora-inicio-decima-sessao').val(),
            end: agendas.convertData($('#data-decima-sessao').val()) + " " + $('#hora-fim-decima-sessao').val(),
            color: 'blue'
        };

        $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);

    },

    convertData: function (data) {

        var dia = data.split("/")[0];
        var mes = data.split("/")[1];
        var ano = data.split("/")[2];

        return ano + '-' + ("0" + mes).slice(-2) + '-' + ("0" + dia).slice(-2);

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

                if (result === true) {
                    swal({text: "Cadastro realizado com Sucesso!", type: "success", confirmButtonText: "OK"});
                    window.location = URL + '/agendamentos/listagem';
                } else {
                    swal("Atenção!", "Já há outra agenda com estas mesmas datas, favor verificar!", "error");
                    return;

                }
            }
        });
    },

    buscaAgendaAlunoSelecionado: function () {

        $.ajax({
            url: URL + '/agendamentos/buscaPacientesAlunoSelecionado',
            type: 'POST',
            data: {id: $('#aluno').val()},
            dataType: 'json',
            success: function (result) {

                if (checkAgenda) {
                    agendas.limpaAgendaNovoAluno();
                }

                for (var i in result) {

                    var paciente = result[i];
                    var horario = {

                        id: paciente.id_pessoa,
                        title: paciente.nome_pessoa,
                        start: agendas.convertData(paciente.data_sessao) + " " + paciente.hora_inicio,
                        end: agendas.convertData(paciente.data_sessao) + " " + paciente.hora_fim,
                        color: 'black'
                    };

                    horarios.push(horario.id);
                    $('#vincular-paciente-agenda').fullCalendar('renderEvent', horario, true);
                }
                checkAgenda = true;
            }
        });
    },

    limpaAgendaNovoAluno: function () {

        for (var i in horarios) {

            horario = horarios[i];
            $('#vincular-paciente-agenda').fullCalendar('removeEvents', horario);
        }
    },

    montarCalendario: function () {

        $('#vincular-paciente-agenda').fullCalendar({
            header: {
                left: 'prev, next',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            height: 'auto',
            navLinks: true,
            selectHelper: true,
            hiddenDays: [0, 6],
            minTime: "08:00:00",
            maxTime: "19:00:00",
            defaultView: 'agendaWeek'
        });
    },

    buscaUltimoPacienteCadastrado: function () {

        $.ajax({
            url: URL + '/agendamentos/buscaUltimoPacienteCadastrado',
            type: 'POST',
            dataType: 'json',
            success: function (result) {

                if (result === null) {

                    var mensagem = "<h5><b>Nenhum novo paciente cadastrado no momento</b></h5>";
                    $('#mensagem').append(mensagem);
                    $('#cabecalho').hide();

                } else {

                    var mensagem = "<h5><b>Realize o agendamento para o paciente abaixo, de acordo com sua especialidade</b></h5>";
                    $('#mensagem').append(mensagem);

                    $('#id-paciente').val(result.id_pessoa);
                    $('#paciente').val(result.nome_pessoa);
                    $('#especialidade').val(result.especialidade);

                    if (result.responsavel !== null) {

                        $('#label-responsavel').html("");
                        $('#input-responsavel').html("");

                        var label = "Responsável";
                        var responsavel = "<input type='text' id='responsavel' value='" + result.responsavel + "' name='responsavel' readonly='true' class='form-control col-md-7 col-xs-12'>";

                        $('#label-responsavel').append(label);
                        $('#input-responsavel').append(responsavel);
                    }
                }
            }
        });
    },

    validaCamposAgendaPaciente: function () {

        if ($('#data-primeira-sessao').val() === '') {
            $('#data-primeira-sessao').focus();
            $('#data-primeira-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 1º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-primeira-sessao').val() === '') {
            $('#hora-inicio-primeira-sessao').focus();
            $('#hora-inicio-primeira-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 1º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-primeira-sessao').val() === '') {
            $('#hora-fim-primeira-sessao').focus();
            $('#hora-fim-primeira-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 1º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-segunda-sessao').val() === '') {
            $('#data-segunda-sessao').focus();
            $('#data-segunda-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 2º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-segunda-sessao').val() === '') {
            $('#hora-inicio-segunda-sessao').focus();
            $('#hora-inicio-segunda-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 2º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-segunda-sessao').val() === '') {
            $('#hora-fim-segunda-sessao').focus();
            $('#hora-fim-segunda-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 2º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-terceira-sessao').val() === '') {
            $('#data-terceira-sessao').focus();
            $('#data-terceira-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 3º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-terceira-sessao').val() === '') {
            $('#hora-inicio-terceira-sessao').focus();
            $('#hora-inicio-terceira-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 3º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-terceira-sessao').val() === '') {
            $('#hora-fim-terceira-sessao').focus();
            $('#hora-fim-terceira-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 3º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-quarta-sessao').val() === '') {
            $('#data-quarta-sessao').focus();
            $('#data-quarta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 4º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-quarta-sessao').val() === '') {
            $('#hora-inicio-quarta-sessao').focus();
            $('#hora-inicio-quarta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 4º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-quarta-sessao').val() === '') {
            $('#hora-fim-quarta-sessao').focus();
            $('#hora-fim-quarta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 4º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-quinta-sessao').val() === '') {
            $('#data-quinta-sessao').focus();
            $('#data-quinta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 5º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-quinta-sessao').val() === '') {
            $('#hora-inicio-quinta-sessao').focus();
            $('#hora-inicio-quinta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 5º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-quinta-sessao').val() === '') {
            $('#hora-fim-quinta-sessao').focus();
            $('#hora-fim-quinta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 5º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-sexta-sessao').val() === '') {
            $('#data-sexta-sessao').focus();
            $('#data-sexta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data sexta 6º não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-sexta-sessao').val() === '') {
            $('#hora-inicio-sexta-sessao').focus();
            $('#hora-inicio-sexta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 6º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-sexta-sessao').val() === '') {
            $('#hora-fim-sexta-sessao').focus();
            $('#hora-fim-sexta-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 6º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-setima-sessao').val() === '') {
            $('#data-setima-sessao').focus();
            $('#data-setima-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 7º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-setima-sessao').val() === '') {
            $('#hora-inicio-setima-sessao').focus();
            $('#hora-inicio-setima-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 7º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-setima-sessao').val() === '') {
            $('#hora-fim-setima-sessao').focus();
            $('#hora-fim-setima-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 7º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-oitava-sessao').val() === '') {
            $('#data-oitava-sessao').focus();
            $('#data-oitava-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 8º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-oitava-sessao').val() === '') {
            $('#hora-inicio-oitava-sessao').focus();
            $('#hora-inicio-oitava-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 8º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-oitava-sessao').val() === '') {
            $('#hora-fim-oitava-sessao').focus();
            $('#hora-fim-oitava-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 8º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-nona-sessao').val() === '') {
            $('#data-nona-sessao').focus();
            $('#data-nona-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 9º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-nona-sessao').val() === '') {
            $('#hora-inicio-nona-sessao').focus();
            $('#hora-inicio-nona-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 9º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-nona-sessao').val() === '') {
            $('#hora-fim-nona-sessao').focus();
            $('#hora-fim-nona-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 9º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#data-decima-sessao').val() === '') {
            $('#data-decima-sessao').focus();
            $('#data-decima-sessao').css('border', '1px solid red');
            swal("Atenção!", "Data 10º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-inicio-decima-sessao').val() === '') {
            $('#hora-inicio-decima-sessao').focus();
            $('#hora-inicio-decima-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora início 10º sessão não pode ficar vazio!", "error");
            return;
        }

        if ($('#hora-fim-decima-sessao').val() === '') {
            $('#hora-fim-decima-sessao').focus();
            $('#hora-fim-decima-sessao').css('border', '1px solid red');
            swal("Atenção!", "Hora fim 10º sessão não pode ficar vazio!", "error");
            return;
        }

        agendas.visualizarAgendaPaciente();

    },

    visualizarAgendaPaciente: function () {

        $('#body-modal-confirmar-agenda').html("");

        var pergunta = "Deseja definir agenda para <b>" + $('#paciente').val() + "<br><br> ";
        var dias = "Data/Hora  1º sessão: <b>" + $('#data-primeira-sessao').val() + " - " + $('#hora-inicio-primeira-sessao').val() + " - " + $('#hora-fim-primeira-sessao').val() + "</b> <br/>" +
                "Data/Hora  2º sessão: <b>" + $('#data-segunda-sessao').val() + " - " + $('#hora-inicio-segunda-sessao').val() + " - " + $('#hora-fim-segunda-sessao').val() + "</b> <br/>" +
                "Data/Hora  3º sessão: <b>" + $('#data-terceira-sessao').val() + " - " + $('#hora-inicio-terceira-sessao').val() + " - " + $('#hora-fim-terceira-sessao').val() + "</b> <br/>" +
                "Data/Hora  4º sessão: <b>" + $('#data-quarta-sessao').val() + " - " + $('#hora-inicio-quarta-sessao').val() + " - " + $('#hora-fim-quarta-sessao').val() + "</b> <br/>" +
                "Data/Hora  5º sessão: <b>" + $('#data-quinta-sessao').val() + " - " + $('#hora-inicio-quinta-sessao').val() + " - " + $('#hora-fim-quinta-sessao').val() + "</b> <br/>" +
                "Data/Hora  6º sessão: <b>" + $('#data-sexta-sessao').val() + " - " + $('#hora-inicio-sexta-sessao').val() + " - " + $('#hora-fim-sexta-sessao').val() + "</b> <br/>" +
                "Data/Hora  7º sessão: <b>" + $('#data-setima-sessao').val() + " - " + $('#hora-inicio-setima-sessao').val() + " - " + $('#hora-fim-setima-sessao').val() + "</b> <br/>" +
                "Data/Hora  8º sessão: <b>" + $('#data-oitava-sessao').val() + " - " + $('#hora-inicio-oitava-sessao').val() + " - " + $('#hora-fim-oitava-sessao').val() + "</b> <br/>" +
                "Data/Hora  9º sessão: <b>" + $('#data-nona-sessao').val() + " - " + $('#hora-inicio-nona-sessao').val() + " - " + $('#hora-fim-nona-sessao').val() + "</b> <br/>" +
                "Data/Hora 10º sessão: <b>" + $('#data-decima-sessao').val() + " - " + $('#hora-inicio-decima-sessao').val() + " - " + $('#hora-fim-decima-sessao').val() + "</b> <br/>";

        $('#body-modal-confirmar-agenda').append(pergunta, dias);
        $('#modal-confirmar-agenda').modal("show");
    },

    gravaAgendaPaciente: function () {

        $.ajax({
            url: URL + '/agendamentos/gravaAgendaInicialPaciente',
            type: 'POST',
            data: {
                idAluno: $('#aluno').val(),
                idPaciente: $('#id-paciente').val(),
                dataPrimeiraSessao: $('#data-primeira-sessao').val(),
                horaInicioPrimeiraSessao: $('#hora-inicio-primeira-sessao').val(),
                horaFimPrimeiraSessao: $('#hora-fim-primeira-sessao').val(),
                dataSegundaSessao: $('#data-segunda-sessao').val(),
                horaInicioSegundaSessao: $('#hora-inicio-segunda-sessao').val(),
                horaFimSegundaSessao: $('#hora-fim-segunda-sessao').val(),
                dataTerceiraSessao: $('#data-terceira-sessao').val(),
                horaInicioTerceiraSessao: $('#hora-inicio-terceira-sessao').val(),
                horaFimTerceiraSessao: $('#hora-fim-terceira-sessao').val(),
                dataQuartaSessao: $('#data-quarta-sessao').val(),
                horaInicioQuartaSessao: $('#hora-inicio-quarta-sessao').val(),
                horaFimQuartaSessao: $('#hora-fim-quarta-sessao').val(),
                dataQuintaSessao: $('#data-quinta-sessao').val(),
                horaInicioQuintaSessao: $('#hora-inicio-quinta-sessao').val(),
                horaFimQuintaSessao: $('#hora-fim-quinta-sessao').val(),
                dataSextaSessao: $('#data-sexta-sessao').val(),
                horaInicioSextaSessao: $('#hora-inicio-sexta-sessao').val(),
                horaFimSextaSessao: $('#hora-fim-sexta-sessao').val(),
                dataSetimaSessao: $('#data-setima-sessao').val(),
                horaInicioSetimaSessao: $('#hora-inicio-setima-sessao').val(),
                horaFimSetimaSessao: $('#hora-fim-setima-sessao').val(),
                dataOitavaSessao: $('#data-oitava-sessao').val(),
                horaInicioOitavaSessao: $('#hora-inicio-oitava-sessao').val(),
                horaFimOitavaSessao: $('#hora-fim-oitava-sessao').val(),
                dataNonaSessao: $('#data-nona-sessao').val(),
                horaInicioNonaSessao: $('#hora-inicio-nona-sessao').val(),
                horaFimNonaSessao: $('#hora-fim-nona-sessao').val(),
                dataDecimaSessao: $('#data-decima-sessao').val(),
                horaInicioDecimaSessao: $('#hora-inicio-decima-sessao').val(),
                horaFimDecimaSessao: $('#hora-fim-decima-sessao').val()
            },
            dataType: 'json',
            success: function (result) {

                if (result === true) {
                    swal({
                        text: "Agenda paciente cadastrada com sucesso!",
                        type: "success"
                    });
                    setTimeout(function () {
                        window.location.href = URL + '/pacientes/cadastrar';
                    }, 1000);
                } else {
                    swal({
                        type: 'warning',
                        title: 'Ocorreu algum erro ao realizar o cadastro da agenda, revise todos os dados informados',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
            }
        });
    }
};
$(document).ready(function () {
    agendas.init();
});
