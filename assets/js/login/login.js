var login = {

    init: function () {
        $('#logar').on('click', login.logar);
        $('#cadastrar').on('click', login.validaSenhasIguais);
    },
    logar: function () {

        $.ajax({
            type: 'POST',
            url: 'login/logar',
            data: {
                email: $('#email').val(),
                senha: $('#senha').val()
            },
            success: function (result) {

                if (result === 'true') {
                    window.location = URL + '/home';
                } else if (parseInt(result) === 1) {
                    window.location = URL + '/login/novo';
                } else if (parseInt(result) === 0) {
                    swal({type: 'error', title: 'Usuário inativo no Sistema', confirmButtonText: 'OK'});
                    return;
                } else if (result === 'false') {
                    swal({type: 'warning', title: 'Email ou senha incorretos', confirmButtonText: 'OK'});
                    return;
                }
            }
        });
    },

    validaSenhasIguais: function (e) {

        e.preventDefault();

        if ($('#senha').val() !== $('#confirmar').val()) {
            swal({type: 'error', title: 'Senhas não são iguais, favor verificar', confirmButtonText: 'OK'});
            return false;
        }

        if ($('#senha').val().length < 5 && $('#confirmar').val() < 5) {
            swal({type: 'error', title: 'Senha deverá conter no minímo 5 caracteres', confirmButtonText: 'OK'});
            return false;
        }

        login.cadastrar();
    },

    cadastrar: function () {

        $.ajax({
            type: 'POST',
            url: URL + '/login/novaSenha',
            data: {
                id: $('#id').val(),
                senha: $('#senha').val()
            },
            success: function (result) {

                if (parseInt(result) === 1) {
                    window.location = URL + '/home';
                }
            }
        });
    }
};
$(document).ready(function () {
    login.init();
});
