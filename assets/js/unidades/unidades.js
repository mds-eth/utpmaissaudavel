var unidades = {

    init: function () {

        $('#gravar').on('click', unidades.validar);
        $('.editar').on('click', unidades.modalEditar);
        $('#limpar').on('click', unidades.limparCampos);
        $('.excluir').on('click', unidades.modalExcluir);
        $("#btnEditar").on('click', unidades.validarCamposEditar);
        $("#btnExcluir").on('click', unidades.validarCamposExcluir);
        $('#gravarRegional').on('click', unidades.validarCamposRegional);
    },
    validar: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $('#unidade').css('border', '1px solid red');
            return;
        }
        if ($('#regional').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#regional').css('border', '1px solid red');
            return;
        }
        unidades.gravarUnidade();
    },
    modalEditar: function () {

        $.ajax({
            url: 'buscaUnidadeParaEdicao',
            type: 'POST',
            dataType: 'json',
            data: {id: $(this).val()},
            success: function (result) {

                $("#formularioEdicao").html("");

                var input = "<div class='form-horizontal'>" +
                        "<input type='hidden' id='idUnidade' value='" + result.id_unidade_de_saude + "'>" +
                        "<label for='nome'>Unidade de Saúde <span class='required'></label>" +
                        "<input value='" + result.nome_unidade + "' type='text' id='unidade' name='unidade' class='form-control col-md-7 col-xs-12'>" +
                        "<input value='" + result.nome_regional + "' type='text' id='unidade' name='unidade' class='form-control col-md-7 col-xs-12'></div>";
                $('#formularioEdicao').append(input);
                $("#modalEdit").modal();
            }
        });
    },
    limparCampos: function () {

        $('#unidade').val("");
        $('#regional').val("");
        $('#responsavel').val("");
    },
    modalExcluir: function () {

        $.ajax({
            url: 'buscaUnidadeParaExclusao',
            type: 'POST',
            dataType: 'json',
            data: {id: $(this).val()},
            success: function (result) {

                $("#formularioExclusao").html("");
                var input = "<div data-parsley-validate class='form-horizontal form-label-left'>" +
                        "<input type='hidden' id='idUnidade' value='" + result.id_unidade_de_saude + "'>" +
                        "<p>Deseja realmente excluir " + result.nome_unidade + "?</p>";
                $('#formularioExclusao').append(input);
                $("#modalDelete").modal();
            }
        });

    },
    validarCamposEditar: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $("#unidade").css('border', '1px solid red');
            return;
        }
        unidades.editarUnidade();
    },
    validarCamposExcluir: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $("#unidade").css('border', '1px solid red');
            return;
        }
        unidades.excluirUnidade();
    },
    validarCamposRegional: function () {

        if ($('#regional').val() === '') {
            $('#regional').focus();
            $("#regional").css('border', '1px solid red');
            return;
        }
        if ($('#responsavel').val() === '') {
            $('#responsavel').focus();
            $("#responsavel").css('border', '1px solid red');
            return;
        }
        unidades.gravarRegional();
    },
    gravarRegional: function () {

        $.ajax({
            url: URL + '/unidades/cadastrarRegional',
            type: 'POST',
            data: {
                regional: $('#regional').val(),
                responsavel: $('#responsavel').val()
            },
            success: function (retorno) {
                if (retorno) {
                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    }, window.location = URL + '/unidades/visualizar');
                } else {
                    swal({
                        type: 'warning',
                        title: 'Ocorreu algum erro ao realizar o cadastro, revise todos os dados informados',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
            }
        });
    },

    gravarUnidade: function () {

        $.ajax({
            url: 'cadastrar',
            type: 'POST',
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            data: {
                unidade: $('#unidade').val(),
                idRegional: $('#regional').val()
            },
            success: function (retorno) {

                if (retorno) {
                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    }, window.location = URL + '/unidades/visualizar');
                } else {
                    swal({
                        type: 'warning',
                        title: 'Ocorreu algum erro ao realizar o cadastro, revise todos os dados informados',
                        confirmButtonText: 'OK'
                    });
                    return;
                }
            }
        }, 'json');
    },
    editarUnidade: function () {

        $.ajax({
            url: 'editar',
            type: 'POST',
            dataType: 'json',
            data: {
                unidade: $('#unidade').val(),
                idUnidade: $('#idUnidade').val()
            },
            success: function (result) {

                if (result) {
                    swal({
                        title: "Registro alterado com Sucesso!",
                        icon: "success"
                    }, window.location = URL + '/unidades/visualizar');
                }
            }
        });
    },
    excluirUnidade: function () {

        $.ajax({
            url: 'excluir',
            type: 'POST',
            dataType: 'json',
            data: {idUnidade: $('#idUnidade').val()},
            success: function (result) {

                if (result) {
                    swal({
                        title: "Registro excluido com Sucesso!",
                        icon: "success"
                    }, window.location = URL + '/unidades/visualizar');
                }
            }
        });
    }
};
$(document).ready(function () {
    unidades.init();
});