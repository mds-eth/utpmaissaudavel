var urls = {

    init: function () {
        $('#gravar').on('click', urls.cadastrar);
    },

    cadastrar: function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'cadastrar',
            data: {
                url: $('#url').val(),
                profile: $('#profile').val()
            },
            success: function (result) {

                alert(result);
                return;

                if (result) {
                    window.location = URL + '/urls/visualizar';
                } else {
                    swal({
                        type: 'warning',
                        title: 'URL já cadastrado com este nome',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    }
};
$(document).ready(function () {
    urls.init();
});