var agendas = {

    init: function () {

        segunda = [];
        segundaEspecialidades = [];
        terca = [];
        tercaEspecialidades = [];
        quarta = [];
        quartaEspecialidades = [];
        quinta = [];
        quintaEspecialidades = [];
        sexta = [];
        sextaEspecialidades = [];

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
    },

    montarAgendaSegunda: function () {

        if ($(this).parent().find('input').is(':checked')) {
            segunda.push($(this).val());
            segundaEspecialidades.push(this.id);
        } else {
            var id = segunda.indexOf($(this).val());
            segunda.splice(id, 1);
            var especialidade = segundaEspecialidades.indexOf(this.id);
            segundaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaTerca: function () {

        if ($(this).parent().find('input').is(':checked')) {
            terca.push($(this).val());
            tercaEspecialidades.push(this.id);
        } else {
            var id = terca.indexOf($(this).val());
            terca.splice(id, 1);
            var especialidade = tercaEspecialidades.indexOf(this.id);
            tercaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaQuarta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            quarta.push($(this).val());
            quartaEspecialidades.push(this.id);
        } else {
            var id = quarta.indexOf($(this).val());
            quarta.splice(id, 1);
            var especialidade = quartaEspecialidades.indexOf(this.id);
            quartaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaQuinta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            quinta.push($(this).val());
            quintaEspecialidades.push(this.id);
        } else {
            var id = quinta.indexOf($(this).val());
            quinta.splice(id, 1);
            var especialidade = quintaEspecialidades.indexOf(this.id);
            quintaEspecialidades.splice(especialidade, 1);
        }
    },
    montarAgendaSexta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            sexta.push($(this).val());
            sextaEspecialidades.push(this.id);
        } else {
            var id = sexta.indexOf($(this).val());
            sexta.splice(id, 1);
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

        if (segunda.length === 0) {
            swal("Atenção!", "Segunda não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (terca.length === 0) {
            swal("Atenção!", "Terça não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (quarta.length === 0) {
            swal("Atenção!", "Quarta não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (quinta.length === 0) {
            swal("Atenção!", "Quinta não possui nenhuma especialidade selecionada!", "error");
            return;
        }

        if (sexta.length === 0) {
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
        var pergunta = "Deseja definir agenda semestral iniciando em <b>" + $("#dataInicial").val() + "</b> e finalizando em <b>" + $('#dataFinal').val() + "</b>?<br/><br/>";
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
                segunda: segunda,
                terca: terca,
                quarta: quarta,
                quinta: quinta,
                sexta: sexta
            },
            sucess: function (result) {

                if (result) {
                    swal("Agenda cadastrada com Sucesso", "success");
                    window.location = URL + '/agendamentos/listagem';
                } else {

                    var erro = "Já existe outra agenda com as mesmas datas de início e fim, favor verificar!";
                    $('#bodyModalAgendaEspecialidade').append(erro);
                    return;
                }
            }
        }, 'json');
    }
};

$(document).ready(function () {
    agendas.init();
});