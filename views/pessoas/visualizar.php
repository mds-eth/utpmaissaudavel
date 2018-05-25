<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pessoas Cadastradas</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">            
            <table id="datatable-buttons" class="table table-striped table-bordered" style="text-align: center">
                <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Nome</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Perfil</th>                        
                        <th style="text-align: center">Criado Em</th>
                        <th style="text-align: center">Ações</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pessoas as $pessoa) : ?>
                        <tr>
                            <td><?= $pessoa['id_pessoa'] ?></td>
                            <td><?= $pessoa['nome_pessoa'] ?></td>
                            <td><?= $pessoa['email'] ?></td>
                            <td><?= $pessoa['nome_perfil'] ?></td>                            
                            <?php $data = $pessoa['criado_em'] ?>
                            <td><?= date('d/m/Y', strtotime($data)) ?></td>
                            <td>
                                <button id="<?= $pessoa['id_pessoa']; ?>" onclick="editar(this.id)"  class="editar btn btn-info btn-xs">Editar</button>
                                <button id="<?= $pessoa['id_pessoa']; ?>" onclick="excluir(this.id)" class="excluir btn btn-danger btn-xs">Excluir</button>
                            </td>                            
                        </tr>                    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div id="myModal" class="form-group modal fade" role="dialog">
            <div class="modal-dialog">                                                
                <div class="modal-content" style="width: 800px">
                    <div class="modal-header">
                        <p><h4>Selecione turno e disciplina, e informe na grade os dias em que ela ocorrerá</h4></p>
                        <div id="turno"></div>
                        <div id="optionDisciplines"></div>                                                            
                        <div id="quantidade"></div>
                        <div id="cont"></div>
                        <div id="ok"></div>
                    </div>
                    <div id="modal-calendario">
                        <table class="table table-bordered"> 
                            <thead>
                                <tr>
                                    <th style="text-align: center; width: 35px"><b>HORÁRIOS</b</th>
                                    <th style="text-align: center; width: 35px"><b>SEGUNDA</b</th>
                                    <th style="text-align: center; width: 35px"><b>TERÇA</b</th>
                                    <th style="text-align: center; width: 35px"><b>QUARTA</b</th>
                                    <th style="text-align: center; width: 35px"><b>QUINTA</b</th>
                                    <th style="text-align: center; width: 35px"><b>SEXTA</b></th>                                                                                                                                            
                                </tr>
                            </thead>
                            <tbody id="calendario-corpo">                                                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pessoas/pessoas.js"></script>
