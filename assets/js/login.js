$(document).ready(function () {

    $('#formLogin').submit(function (event) {

        event.preventDefault();

        var email = $('#email').val();
        var senha = $('#senha').val();

        contentType: "charset=utf-8";

        $.ajax({

            type: 'POST',
            url: 'login/logar',
            data: {email: email, senha: senha},
            success: function (retorno) {

                if (retorno == 1) {
                    window.location.href = '/home';
                } else if (retorno === false) {
                    swal({
                        type: 'warning',
                        title: 'Email ou senha incorretos',
                        confirmButtonText: 'OK'
                    });
                } else {
                    window.location.href = '../../login/new_pass.php';
                }

            }
        });
    });
});