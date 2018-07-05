<div class="form-horizontal">   
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">                        
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="paciente">Paciente</label>
                        <div class="col-md-8">
                            <input type="hidden" id="id-paciente" name="id-paciente">
                            <input type="text" id="paciente" name="paciente" readonly="true" value="<?= isset($paciente[0]) ? $paciente[0]['nome_pessoa'] : '' ?>" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="responsavel" id="label-responsavel"></label>
                        <div class="col-md-8" id="input-responsavel">                                                        
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="especialidade">Especialidade(s)</label>
                        <div class="col-md-8">                            
                            <input type="text" id="especialidade" name="especialidade" value="<?= isset($paciente[0]) ? $paciente[0]['especialidade'] : '' ?>" readonly="true"  class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">                        
                        <label class="col-md-3 col-sm-3 col-xs-12" for="aluno">Alunos</label>
                        <div class="col-md-8">
                            <select class="aluno form-control" id="aluno" name="aluno">
                                <option >Selecione</option>
                                <?php foreach ($alunos as $aluno) : ?>
                                    <option value="<?= $aluno['id_pessoa'] ?>"><?= $aluno['nome_pessoa'] . ' - Quantidade pacientes -> ' . $aluno['quant_paciente'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div> 

                    <table class="table table-hover">
                        <tr>
                            <td style="text-align: center"><b>Dia Sessão</b></td>
                            <td style="text-align: center"><b>Hora Início / Hora Fim</b></td>
                        </tr>
                    </table>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-primeira-sessao">1º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-primeira-sessao" name="data-primeira-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-primeira-sessao" name="hora-inicio-primeira-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">                                
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-primeira-sessao" name="hora-fim-primeira-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">                                
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-segunda-sessao">2º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-segunda-sessao" name="data-segunda-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-segunda-sessao" name="hora-inicio-segunda-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-segunda-sessao" name="hora-fim-segunda-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-terceira-sessao">3º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-terceira-sessao" name="data-terceira-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-terceira-sessao" name="hora-inicio-terceira-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-terceira-sessao" name="hora-fim-terceira-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-quarta-sessao">4º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-quarta-sessao" name="data-quarta-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-quarta-sessao" name="hora-inicio-quarta-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-quarta-sessao" name="hora-fim-quarta-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-quinta-sessao">5º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-quinta-sessao" name="data-quinta-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-quinta-sessao" name="hora-inicio-quinta-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-quinta-sessao" name="hora-fim-quinta-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-sexta-sessao">6º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-sexta-sessao" name="data-sexta-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-sexta-sessao" name="hora-inicio-sexta-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-sexta-sessao" name="hora-fim-sexta-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-setima-sessao">7º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-setima-sessao" name="data-setima-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-setima-sessao" name="hora-inicio-setima-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-setima-sessao" name="hora-fim-setima-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-oitava-sessao">8º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-oitava-sessao" name="data-oitava-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-oitava-sessao" name="hora-inicio-oitava-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-oitava-sessao" name="hora-fim-oitava-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-nona-sessao">9º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-nona-sessao" name="data-nona-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-nona-sessao" name="hora-inicio-nona-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-nona-sessao" name="hora-fim-nona-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-decima-sessao">10º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-decima-sessao" name="data-decima-sessao" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-decima-sessao" name="hora-inicio-decima-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-decima-sessao" name="hora-fim-decima-sessao" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div> 
                    <div>
                        <button id="btn-visualizar-agenda-paciente" name="btn-visualizar-agenda-paciente" class='btn btn-success btn-xs'>Visualizar</button>
                    </div>                     
                </div>
            </div>

            <div class="x_panel">
                <div class="x_title">
                    <h5><b>Agenda semestral por especialidade</b></h5>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="x_content">
                        <?php if (isset($segunda)): ?>
                            <span><?= '<b>Início: </b> ' . $segunda[0]['data_inicio_agenda'] . '<br> <b>Fim: </b> ' . $segunda[0]['data_fim_agenda'] . '<br><b>Semestre: </b>' . $segunda[0]['semestre'] . '/' . date('Y'); ?></span><br><br><br>
                            <div class="table-responsive">
                                <span><b>Segunda</b>: </span>
                                <?php foreach ($segunda as $seg): ?>
                                    <span><?= $seg['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Terça</b>: </span>
                                <?php foreach ($terca as $ter): ?>
                                    <span><?= $ter['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Quarta</b>: </span>
                                <?php foreach ($quarta as $qua): ?>
                                    <span><?= $qua['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Quinta</b>: </span>
                                <?php foreach ($quinta as $qui): ?>
                                    <span><?= $qui['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                                <span><b>Sexta</b>: </span>
                                <?php foreach ($sexta as $sex): ?>
                                    <span><?= $sex['especialidade'] . ' |' ?></span>
                                <?php endforeach; ?><br>
                            </div>
                        <?php else: ?>
                            <h4>Agenda semestral ainda não definida!</h4>
                        <?php endif; ?>
                    </div>
                </div>                
            </div>            
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12" style="height: 100%">
            <div class="div-agenda x_panel">
                <div class="x_title">
                    <h5><b>Agenda</b></h5>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div id="vincular-paciente-agenda"></div>                                                   
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-confirmar-agenda" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">                
        <div class="modal-content" style="border-radius: 10px">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmar Agenda Paciente</h4>
            </div>
            <form id="form">
                <div class="modal-body" id="body-modal-confirmar-agenda">       
                </div>                        
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                <button id="btn-modal-confirmar-agenda-paciente" class="btn btn-success btn-xs">Salvar</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/agendas/agendas.js"></script>