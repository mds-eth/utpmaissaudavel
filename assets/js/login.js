var autentica = {
    init: function () {
        $('#logar').on('click', autentica.form);
        $('#email').on('keyup', autentica.enter);
        $('#senha').on('keyup', autentica.enter);
    },
    enter: function (e) {
        if (e.which == 13) {
            if ($('#email').val() == '') {
                alert('Informe o e-mail.');
                $('#email').focus();
                return;
            }
            if ($('#senha').val() == '') {
                alert('Informe a senha.');
                $('#senha').focus();
                return;
            }
        }
        autentica.logar();
    },
    form: function () {
        if ($('#email').val() == '') {
            alert('Informe o e-mail.');
            $('#email').focus();
            return;
        }
        if ($('#senha').val() == '') {
            alert('Informe a senha.');
            $('#senha').focus();
            return;
        }
        autentica.logar();
    },
    logar: function () {
        $.post({
            type: 'POST',
            url: 'login/logar',
            data: {
                email: $('#email').val(),
                senha: $('#senha').val()
            },
            success: function (result) {

                if (result) {
                    window.location = URL;
                } else if (result === false) {
                    swal({
                        type: 'warning',
                        title: 'Email ou senha incorretos',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    }
};
$(document).ready(function () {
    autentica.init();
});
