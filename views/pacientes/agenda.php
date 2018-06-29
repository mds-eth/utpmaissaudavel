<div class="form-horizontal">   
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">                    
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="paciente">Paciente</label>
                        <div class="col-md-8">
                            <input type="hidden" id="id-paciente" name="id-paciente">
                            <input type="text" id="paciente" name="paciente" value="<?= $agenda[0]['nome_pessoa'] ?>" readonly="true" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-3 col-sm-3 col-xs-12" for="especialidade">Especialidade(s)</label>
                        <div class="col-md-8">                            
                            <input type="text" id="especialidade" name="especialidade" readonly="true"  class="form-control col-md-7 col-xs-12">
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
                                <input type="text" id="data-primeira-sessao" name="data-primeira-sessao" value="<?= $agenda[0]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-primeira-sessao" name="hora-inicio-primeira-sessao" value="<?= $agenda[0]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">                                
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-primeira-sessao" name="hora-fim-primeira-sessao" value="<?= $agenda[0]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">                                
                            </div>
                        </div>                        
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-segunda-sessao">2º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-segunda-sessao" name="data-segunda-sessao" value="<?= $agenda[1]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-segunda-sessao" name="hora-inicio-segunda-sessao" value="<?= $agenda[1]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-segunda-sessao" name="hora-fim-segunda-sessao" value="<?= $agenda[1]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-terceira-sessao">3º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-terceira-sessao" name="data-terceira-sessao" value="<?= $agenda[2]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-terceira-sessao" name="hora-inicio-terceira-sessao" value="<?= $agenda[2]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-terceira-sessao" name="hora-fim-terceira-sessao" value="<?= $agenda[2]['hora_fim'] ?>" readonly="true"  data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-quarta-sessao">4º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-quarta-sessao" name="data-quarta-sessao" value="<?= $agenda[3]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-quarta-sessao" name="hora-inicio-quarta-sessao" value="<?= $agenda[3]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-quarta-sessao" name="hora-fim-quarta-sessao" value="<?= $agenda[3]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-quinta-sessao">5º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-quinta-sessao" name="data-quinta-sessao" value="<?= $agenda[4]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-quinta-sessao" name="hora-inicio-quinta-sessao" value="<?= $agenda[4]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-quinta-sessao" name="hora-fim-quinta-sessao" value="<?= $agenda[4]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-sexta-sessao">6º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-sexta-sessao" name="data-sexta-sessao" value="<?= $agenda[5]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-sexta-sessao" name="hora-inicio-sexta-sessao"value="<?= $agenda[5]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-sexta-sessao" name="hora-fim-sexta-sessao" value="<?= $agenda[5]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-setima-sessao">7º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-setima-sessao" name="data-setima-sessao" value="<?= $agenda[6]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-setima-sessao" name="hora-inicio-setima-sessao" value="<?= $agenda[6]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-setima-sessao" name="hora-fim-setima-sessao" value="<?= $agenda[6]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-oitava-sessao">8º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-oitava-sessao" name="data-oitava-sessao" value="<?= $agenda[7]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-oitava-sessao" name="hora-inicio-oitava-sessao" value="<?= $agenda[7]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-oitava-sessao" name="hora-fim-oitava-sessao" value="<?= $agenda[7]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-nona-sessao">9º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-nona-sessao" name="data-nona-sessao" value="<?= $agenda[8]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-nona-sessao" name="hora-inicio-nona-sessao" value="<?= $agenda[8]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-nona-sessao" name="hora-fim-nona-sessao" value="<?= $agenda[8]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div> 
                    <div class="col-md-6">
                        <div class="item form-group">
                            <label class="col-md-1 col-sm-3 col-xs-12" for="data-decima-sessao">10º</label>
                            <div class="col-md-7">                            
                                <input type="text" id="data-decima-sessao" name="data-decima-sessao" value="<?= $agenda[9]['data_sessao'] ?>" readonly="true" data-inputmask="'mask' : '99/99/9999' " required="required" class="form-control col-md-7 col-xs-12">
                            </div>                    
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="item form-group">                            
                            <div class="col-md-5">                            
                                <input type="text" id="hora-inicio-decima-sessao" name="hora-inicio-decima-sessao" value="<?= $agenda[9]['hora_inicio'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                            <div class="col-md-5">                            
                                <input type="text" id="hora-fim-decima-sessao" name="hora-fim-decima-sessao" value="<?= $agenda[9]['hora_fim'] ?>" readonly="true" data-inputmask="'mask' : '99:99' " required="required" class="form-control col-md-7 col-xs-12">
                            </div> 
                        </div>
                    </div>                    
                    <div>
                        <button id="btn-editar-agenda-paciente" name="btn-editar-agenda-paciente" class='edit btn btn-success btn-xs'>Editar</button>
                        <div id="btn-salvar-alteracoes-agenda-paciente"></div>
                    </div>
                </div>                  
            </div>
        </div>        
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pacientes/pacientes.js"></script>        

