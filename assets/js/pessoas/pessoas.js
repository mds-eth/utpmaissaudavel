var pessoas = {

    init: function () {

        $('#gravar').on('click', pessoas.gravar);
        $('#cep').on('blur', pessoas.buscaCep);
        $('#cpf').on('blur', pessoas.validaCpf);
        $('.editar').on('click', pessoas.editar);
        $('.excluir').on('click', pessoas.excluir);
    },

    gravar: function () {

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                nome: $('#nome').val(),
                dataNascimento: $('#data_nascimento').val(),
                sexo: $('#sexo').val(),
                cpf: $('#cpf').val(),
                rg: $('#rg').val(),
                email: $('#email').val(),
                residencial: $('#residencial').val(),
                celular: $('#celular').val(),
                contato: $('#contato').val(),
                cep: $('#cep').val(),
                rua: $('#rua').val(),
                bairro: $('#bairro').val(),
                cidade: $('#cidade').val(),
                estado: $('#uf').val(),
                numero: $('#numero').val(),
                complemento: $('#complemento').val(),
                perfil: $('#perfil').val()
            },
            success: function (retorno) {

                if (retorno) {

                    setTimeout(function () {
                        swal({
                            title: "Cadastrado com Sucesso!",
                            icon: "success"
                        });
                        window.location = URL + '/pessoas/visualizar';
                    }, 4000);
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

    buscaCep: function () {

        var cep = $('#cep').val();

        $.ajax({
            url: 'buscaCep',
            type: 'GET',
            data: {cep: cep},
            dataType: 'json',
            success: function (data) {
                if (parseInt(data.sucesso) === 1) {

                    $('#rua').val(data.rua);
                    $('#bairro').val(data.bairro);
                    $('#cidade').val(data.cidade);
                    $('#uf').val(data.uf);
                    $('#numero').focus();
                }
            }
        });
    },

    validaCpf: function () {

        var cpf = $('#cpf').val();

        $.ajax({
            url: 'validaCpf',
            type: 'POST',
            data: {cpf: cpf},
            dataType: 'json',
            success: function (result) {
                console.log(result);
                return;
                if (result === false) {

                    alert('Já existe outra Pessoa cadastrada com o cpf:' + cpf + 'favor verificar');
                    $('#cpf').focus();
                    return;
                }
            }
        });
    }
};

$(document).ready(function () {
    pessoas.init();

});

function editar(id) {

    if (id !== null && id !== 'undefined') {

        $.ajax({
            url: 'buscaPessoaParaEdicao',
            type: 'POST',
            data: {id: id},
            success: function (result) {

                if (result !== null) {

                    $("#myModal").modal("show");

                }
            }
        });
    }
}

function excluir(id) {

    if (id !== null && id !== 'undefined') {

        $.ajax({
            url: 'buscaPessoaParaExclusao',
            type: 'POST',
            data: {id: id},
            success: function (result) {

            }
        });
    }
}

