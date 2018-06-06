<?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::ALUNO) : ?>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Agenda Pacientes</h2>            
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />
                <div id="calendario" style="width: 700px; "></div>
            </div>
        </div>
    </div>
<?php endif; ?>