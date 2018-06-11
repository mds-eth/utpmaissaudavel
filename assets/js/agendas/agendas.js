var agendas = {

    init: function () {

        segunda = [];
        terca = [];
        quarta = [];
        quinta = [];
        sexta = [];

        $('.segunda').unbind('click');
        $('.segunda').on('click', agendas.montaAgendaSegunda);
        $('.terca').unbind('click');
        $('.terca').on('click', agendas.montaAgendaTerca);
        $('.quarta').unbind('click');
        $('.quarta').on('click', agendas.montaAgendaQuarta);
        $('.quinta').unbind('click');
        $('.quinta').on('click', agendas.montaAgendaQuinta);
        $('.sexta').unbind('click');
        $('.sexta').on('click', agendas.montaAgendaSexta);
        $('#dataInicial').on('click', agendas.montaAgendaInicial);
        $('#dataFinal').on('click', agendas.montaAgendaFinal);
        $('#gravar').unbind('click');
        $('#gravar').on('click', agendas.validaAgendaSemanal);
    },

    montaAgendaSegunda: function () {

        if ($(this).parent().find('input').is(':checked')) {
            segunda.push($(this).val());
        } else {
            var id = segunda.indexOf($(this).val());
            segunda.splice(id, 1);
        }
    },
    montaAgendaTerca: function () {

        if ($(this).parent().find('input').is(':checked')) {
            terca.push($(this).val());
        } else {
            var id = terca.indexOf($(this).val());
            terca.splice(id, 1);
        }
    },
    montaAgendaQuarta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            quarta.push($(this).val());
        } else {
            var id = quarta.indexOf($(this).val());
            quarta.splice(id, 1);
        }
    },
    montaAgendaQuinta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            quinta.push($(this).val());
        } else {
            var id = quinta.indexOf($(this).val());
            quinta.splice(id, 1);
        }
    },
    montaAgendaSexta: function () {

        if ($(this).parent().find('input').is(':checked')) {
            sexta.push($(this).val());
        } else {
            var id = sexta.indexOf($(this).val());
            sexta.splice(id, 1);
        }
    },
    montaAgendaInicial: function () {
        $('#dataInicial').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
    },
    montaAgendaFinal: function () {
        $('#dataFinal').datepicker({
            format: 'dd/mm/yyyy',
            language: 'pt-BR'
        });
    },

    validaAgendaSemanal: function () {

        if ($('#dataInicial').val() > $('#dataFinal').val()) {
            $('#dataInicial').css('border', '1px solid red');
            $('#dataFinal').css('border', '1px solid red');
            swal("Atenção!", "Data inicial não pode ser maior que a data final!", "error");
            return;
        }

        if ($('#dataInicial').val() === '') {
            $('#dataInicial').css('border', '1px solid red');
            swal("Atenção!", "Informe a data de inicio da agenda!", "error");
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

        agendas.chamaModalConfirmarAgenda();
    },

    chamaModalConfirmarAgenda: function () {

        agendas.gravaAgenda();
    },

    gravaAgenda: function () {

        $.post({
            url: URL + '/agendamentos/cadastrarAgendaPorEspecialidade',
            type: 'POST',
            data: {
                dataInicio: $("#dataInicial").val(),
                dataFinal: $('#dataFinal').val(),
                segunda: segunda,
                terca: terca,
                quarta: quarta,
                quinta: quinta,
                sexta: sexta
            },
            sucess: function (result) {
                console.log(result);
                return false;
            }
        });
    }
};

$(document).ready(function () {
    agendas.init();
});