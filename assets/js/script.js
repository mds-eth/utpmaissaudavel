var usuario = {
    init: function () {
        $('#salvar').on('click', usuario.form);
        $('#atualizar').on('click', usuario.update);
        $('#login').on('blur', usuario.valida);
        $('.btn-voltar').on('click', usuario.redirect);
    },
    redirect: function () {
        location.href = URL + '/usuarios';
    },
    valida: function () {
        $.ajax({
            type: 'POST',
            url: 'login_existe',
            data: {login: $('#login').val()},
            success: function (rs) {
                if (rs == 1) {
                    $('#login').focus();
                    $('#body').html('<center>Login já cadastrado!</center>');
                    $('#modal').modal('show');
                    setTimeout(function () {
                        $('#modal').modal('hide');
                    }, 3000);
                    return;
                }
            }
        });
    },
    form: function () {
        if ($('#nome').val() == '') {
            $('#nome').focus();
            $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o Nome.</center>');
            $('#modal').modal('show');
            setTimeout(function () {
                $('#modal').modal('hide');
            }, 3000);
            return;
        }
        if ($('#login').val() == '') {
            $('#login').focus();
            $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o Login.</center>');
            $('#modal').modal('show');
            setTimeout(function () {
                $('#modal').modal('hide');
            }, 3000);
            return;
        }
        if ($('#senha').val() == '') {
            $('#senha').focus();
            $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe a Senha.</center>');
            $('#modal').modal('show');
            setTimeout(function () {
                $('#modal').modal('hide');
            }, 3000);
            return;
        }
        if ($('#perfil').val() == '') {
            $('#perfil').focus();
            $('#body').html('<center><i class="fa fa-hand-o-right fa-lg"></i> Informe o Pefil.</center>');
            $('#modal').modal('show');
            setTimeout(function () {
                $('#modal').modal('hide');
            }, 3000);
            return;
        }
        usuario.save();
    },
    save: function () {
        $.ajax({
            type: 'POST',
            url: 'save',
            data: {
                nome: $('#nome').val(),
                login: $('#login').val(),
                senha: $('#senha').val(),
                email: $('#email').val(),
                perfil: $('#perfil').val()
            },
            success: function (result) {
                if (result == 'ok') {
                    $('#body').html('<p><i class="fa fa-thumbs-o-up fa-lg"></i> Usuário cadastrado com sucesso.</p>');
                    $('#modal').modal('show');
                    setTimeout(function () {
                        $('#modal').modal('hide');
                    }, 1000);
                    setTimeout(function () {
                        window.location = URL + '/usuarios';
                    }, 2000);
                } else {
                    $('#body').html('<p>Ocorreu um erro ao cadastrar o Usuário.</p>');
                    $('#modal').modal('show');
                    setTimeout(function () {
                        $('#modal').modal('hide');
                    }, 2000);
                }
            }
        });
    },
    update: function () {
        $.ajax({
            type: 'POST',
            url: 'edit',
            data: {
                id_usuario: $('#id_usuario').val(),
                nome: $('#nome').val(),
                senha: $('#senha').val(),
                email: $('#email').val(),
                perfil: $('#perfil').val(),
                status: $('#status').val()
            },
            success: function (result) {
                if (result == 'ok') {
                    $('#body').html('<p><i class="fa fa-thumbs-o-up fa-lg"></i> Usuário atualizado com sucesso.</p>');
                    $('#modal').modal('show');
                    setTimeout(function () {
                        $('#modal').modal('hide');
                    }, 1000);
                    setTimeout(function () {
                        window.location = URL + '/usuarios';
                    }, 2000);
                } else {
                    $('#body').html('<p>Ocorreu um erro ao atualizar o Usuário!</p>');
                    $('#modal').modal('show');
                    setTimeout(function () {
                        $('#modal').modal('hide');
                    }, 2000);
                }
            }
        });
    }
}
$(document).ready(function () {
    usuario.init();
});