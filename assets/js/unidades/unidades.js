var unidades = {

    init: function () {

        $('#gravar').on('click', unidades.validar);
        $('#limpar').on('click', unidades.limparCampos);
        $('.excluir').on('click', unidades.modalExcluir);
        $('.editar').on('click', unidades.modalEditarUnidade);
        $("#btnEditar").on('click', unidades.validarCamposEditar);
        $("#btnExcluir").on('click', unidades.validarCamposExcluir);
        $('.editarRegional').on('click', unidades.modalEditarRegional);
        $('#gravarRegional').on('click', unidades.validarCamposRegional);
        $('#btnModalEditarRegional').on('click', unidades.validaCamposEditarRegional);
    },

    validar: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $('#unidade').css('border', '1px solid red');
            swal("Atenção!", "Campo unidade não pode ficar vazio!", "error");
            return;
        }
        if ($('#regional').val() === 'Selecione') {
            swal("Atenção!", "Selecione uma opção válida!", "error");
            $('#regional').css('border', '1px solid red');
            return;
        }
        unidades.gravarUnidade();
    },

    modalEditarUnidade: function () {

        $.ajax({
            url: 'buscaUnidadeParaEdicao',
            type: 'POST',
            dataType: 'json',
            data: {id: $(this).val()},
            success: function (result) {

                $("#formularioEdicao").html("");

                var input = "<div class='form-horizontal'>" +
                        "<input type='hidden' id='idUnidade' value='" + result.unidade.id_unidade_de_saude + "'>" +
                        "<label for='nome'>Unidade de Saúde <span class='required'></label><br/>" +
                        "<input value='" + result.unidade.nome_unidade + "' type='text' id='unidade' name='unidade' class='form-control col-md-7 col-xs-12'><br/>";

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

    modalEditarRegional: function () {

        $.ajax({
            type: 'POST',
            url: URL + '/unidades/buscaRegionalParaEdicao',
            data: {id: $(this).val()},
            dataType: 'json',
            success: function (result) {

                $("#formularioEdicao").html("");

                var input = "<input type='hidden' id='idRegional' value='" + result.id_regional + "'>" +
                        "<label class='col-md-1 col-sm-3 col-xs-12' for='regionalModal'>Regional</label>" +
                        "<input type='text' class='form-control' id='regionalModal' value='" + result.nome_regional + "'><br/>" +
                        "<label for='responsavelEditModal'>Responsável Regional</label>" +
                        "<input type='text' class='form-control' id='responsavelEditModal' value='" + result.responsavel_regional + "'>";

                $('#formularioEdicao').append(input);
                $("#modalEditRegional").modal();
            }
        });
    },

    validarCamposRegional: function () {

        if ($('#regional').val() === '') {
            $('#regional').focus();
            $("#regional").css('border', '1px solid red');
            swal("Atenção!", "Campo Regional não pode ficar vazio!", "error");
            return;
        }
        if ($('#responsavel').val() === '') {
            $('#responsavel').focus();
            $("#responsavel").css('border', '1px solid red');
            swal("Atenção!", "Campo Responsavel não pode ficar vazio!", "error");
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
    },

    validaCamposEditarRegional: function () {

        if ($('#regionalModal').val() === '') {
            $('#regionalModal').focus();
            $("#regionalModal").css('border', '1px solid red');
            return;
        }

        if ($('#responsavelEditModal').val() === '') {
            $('#responsavelEditModal').focus();
            $("#responsavelEditModal").css('border', '1px solid red');
            return;
        }

        unidades.editarRegional();
    },

    editarRegional: function () {

        $.ajax({
            type: 'POST',
            url: URL + '/unidades/editarRegional',
            data: {
                id: $('#idRegional').val(),
                nomeRegional: $('#regionalModal').val(),
                responsavel: $('#responsavelEditModal').val()
            },
            success: function (result) {

                if (result) {
                    swal({
                        type: 'success',
                        title: "Registro alterado com Sucesso!"
                    });
                    setTimeout(function () {
                        window.location = URL + '/unidades/regionais';
                    }, 2000);

                }
            }
        });
    }
};
$(document).ready(function () {
    unidades.init();
});