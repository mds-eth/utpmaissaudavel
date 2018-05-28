var unidades = {

    init: function () {

        $('.editar').on('click', unidades.editar);
        $('.excluir').on('click', unidades.excluir);
        $('#gravar').on('click', unidades.validar);

    },

    validar: function () {

        if ($('#unidade').val() === '') {
            $('#unidade').focus();
            $('#unidade').css('border', '1px solid red');
            return;
        } else {
            unidades.gravar();
        }
    },

    editar: function () {

        alert('aqui');

    },

    excluir: function () {

        alert('excluir');

    },

    gravar: function () {

        $.ajax({
            url: 'cadastrar',
            type: 'POST',
            contentType: "application/x-www-form-urlencoded;charset=utf-8",
            data: {unidade: $('#unidade').val()},
            success: function (retorno) {

                if (retorno) {
                    swal({
                        title: "Cadastrado com Sucesso!",
                        icon: "success"
                    });
                    setTimeout(function () {
                        window.location = URL + '/unidades/visualizar';
                    }, 1000);

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
    }

};

function editar(id) {

    alert('editar id: ' + id);

}


function excluir(id) {

    alert('excluir id: ' + id);

}

$(document).ready(function () {
    unidades.init();
});