var pneumologia = {

    init: function () {

        $('#edema').on('change', pneumologia.abreCamposTopografiaEdema);
        $('#cicatrizes').on('change', pneumologia.abreCamposCicatrizes);
        $('#eritema').on('change', pneumologia.abreCamposTopografiaEritema);
        $('#cianose').on('change', pneumologia.abreCamposTopografiaCianose);
        $('#hematoma').on('change', pneumologia.abreCamposTopografiaHematoma);
        $('#musculatura-acessoria').on('change', pneumologia.abreCamposMusculaturaAcessoria);
        $('#topografia-cicatrizes-hidden').on('change', pneumologia.abreCamposLadoCicatrizes);
        $('#presenca-deformidades-posturais').on('change', pneumologia.abreCamposDeformidadesPosturais);
    },

    abreCamposTopografiaEdema: function () {

        if ($('#edema').val() === '1') {
            $('#topografia-edema').html('');
            var topografia = "<label class='col-md-4 col-sm-3 col-xs-12'>Topografia</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='topografia-edema-hidden' name='topografia-edema-hidden'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Torax</option>" +
                    "<option value='2'>Abdômen</option>" +
                    "<option value='3'>Membros Superiores</option>" +
                    "<option value='4'>Membros Inferiores</option>" +
                    "</select>" +
                    "</div>";
            $('#topografia-edema').append(topografia);
        } else {
            $('#topografia-edema').html('');
        }

    },

    abreCamposCicatrizes: function () {

        if ($('#cicatrizes').val() === '1') {
            $('#topografia-cicatrizes').html('');
            var topografia = "<label class='col-md-4 col-sm-3 col-xs-12'>Topografia</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='topografia-cicatrizes-hidden' name='topografia-cicatrizes-hidden'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Torax</option>" +
                    "<option value='2'>Abdômen</option>" +
                    "<option value='3'>Membros Superiores</option>" +
                    "<option value='4'>Membros Inferiores</option>" +
                    "</select>" +
                    "</div>";
            $('#topografia-cicatrizes').append(topografia);
        } else {
            $('#topografia-cicatrizes').html('');
        }
    },

    abreCamposTopografiaEritema: function () {

        if ($('#eritema').val() === '1') {
            $('#topografia-cianose').html('');
            var topografia = "<label class='col-md-4 col-sm-3 col-xs-12'>Topografia</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='topografia-eritema-hidden' name='topografia-eritema-hidden'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Torax</option>" +
                    "<option value='2'>Abdômen</option>" +
                    "<option value='3'>Membros Superiores</option>" +
                    "<option value='4'>Membros Inferiores</option>" +
                    "</select>" +
                    "</div>";
            $('#topografia-eritema').append(topografia);
        } else {
            $('#topografia-eritema').html('');
        }
    },

    abreCamposTopografiaCianose: function () {

        if ($('#cianose').val() === '1') {
            $('#topografia-cianose').html('');
            var topografia = "<label class='col-md-4 col-sm-3 col-xs-12'>Topografia</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='topografia-cianose-hidden' name='topografia-cianose-hidden'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Torax</option>" +
                    "<option value='2'>Abdômen</option>" +
                    "<option value='3'>Membros Superiores</option>" +
                    "<option value='4'>Membros Inferiores</option>" +
                    "</select>" +
                    "</div>";
            $('#topografia-cianose').append(topografia);
        } else {
            $('#topografia-cianose').html('');
        }
    },

    abreCamposTopografiaHematoma: function () {

        if ($('#hematoma').val() === '1') {
            $('#topografia-hematoma').html('');
            var topografia = "<label class='col-md-4 col-sm-3 col-xs-12'>Topografia</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='topografia-hematoma-hidden' name='topografia-hematoma-hidden'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Torax</option>" +
                    "<option value='2'>Abdômen</option>" +
                    "<option value='3'>Membros Superiores</option>" +
                    "<option value='4'>Membros Inferiores</option>" +
                    "</select>" +
                    "</div>";
            $('#topografia-hematoma').append(topografia);
        } else {
            $('#topografia-hematoma').html('');
        }

    },

    abreCamposLadoCicatrizes: function () {

        if ($('#topografia-cicatrizes-hidden').val() === '3' || $('#topografia-cicatrizes-hidden').val() === '4') {
            $('#lado-topografia-cicatrizes').html('');
            var lado = "<label class='col-md-4 col-sm-3 col-xs-12'>Lado</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='lado-topografia-cicatrizes-hidden' name='lado-topografia-cicatrizes-hidden'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Direito</option>" +
                    "<option value='2'>Esquerdo</option>" +
                    "</select>" +
                    "</div>";
            $('#lado-topografia-cicatrizes').append(lado);
        } else {
            $('#lado-topografia-cicatrizes').html('');
        }

    },

    abreCamposMusculaturaAcessoria: function () {

        if ($('#musculatura-acessoria').val() === '1') {
            $('#quais-musculatura').html('');
            var quais = "<label class='col-md-4 col-sm-3 col-xs-12'>Quais</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='quais-musculatura-acessoria' name='quais-musculatura-acessoria'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Esternocleido</option>" +
                    "<option value='2'>Escaleno</option>" +
                    "<option value='3'>Peitoral Menor</option>" +
                    "</select>" +
                    "</div>";
            $('#quais-musculatura').append(quais);
        } else {
            $('#quais-musculatura').html('');
        }
    },

    abreCamposDeformidadesPosturais: function () {

        if ($('#presenca-deformidades-posturais').val() === '1') {
            $('#quais-deformidades-posturais').html('');
            var quais = "<label class='col-md-4 col-sm-3 col-xs-12'>Quais</label>" +
                    "<div class='col-md-8'>" +
                    "<select class='form-control' id='quais-deformidades-posturais' name='quais-musculatura-acessoria'>" +
                    "<option>Selecione</option>" +
                    "<option value='1'>Escoliose em C</option>" +
                    "<option value='2'>Cifose</option>" +
                    "<option value='3'>Escoliose em S</option>" +
                    "</select>" +
                    "</div>";
            $('#quais-deformidades-posturais').append(quais);
        } else {
            $('#quais-deformidades-posturais').html('');
        }

    }
};

$(document).ready(function () {
    pneumologia.init();
});