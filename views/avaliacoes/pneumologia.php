<div class="form-horizontal">   
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="div-agenda x_panel">
                <div class="x_title">
                    <h4><b>Dados Paciente</b></h4>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">    
                    <div class="item form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12">Nome</label>
                        <div class="col-md-8">
                            <span><?= $paciente->nome_pessoa ?></span>                            
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12">Data Nascimento</label>
                        <div class="col-md-8">
                            <span><?= $paciente->data_nascimento ?></span>                            
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12">Sexo</label>
                        <div class="col-md-8">
                            <span><?= $paciente->sexo ?></span>                            
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-2 col-sm-3 col-xs-12">Unidade de Saúde</label>
                        <div class="col-md-8">
                            <span><?= $paciente->nome_unidade ?></span>                            
                        </div>                    
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="div-agenda x_panel">
                <div class="x_title">
                    <h4><b>Inspeção</b></h4>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">    
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Tosse</label>
                        <div class="col-md-8">
                            <select class="form-control" id="tosse" name="tosse">
                                <option>Selecione</option>
                                <option value="1">Seca</option>
                                <option value="2">Quintosa</option>
                                <option value="3">Umida Produtiva</option>
                                <option value="4">Síncope</option>
                                <option value="5">Umida Bitonal</option>
                                <option value="6">Improdutiva</option>                                
                                <option value="7">Rouca</option>                                
                                <option value="8">Reprimida</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Aspecto da Secreção</label>
                        <div class="col-md-8">
                            <select class="form-control" id="aspecto-secrecao" name="aspecto-secrecao">
                                <option>Selecione</option>
                                <option value="1">Musoca</option>
                                <option value="2">Hemoptise</option>
                                <option value="3">Serosa</option>
                                <option value="4">Vômica</option>
                                <option value="5">Purulenta</option>
                                <option value="6">Mucopurulenta</option>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Uso de Musculatura Acessoria</label>
                        <div class="col-md-8">
                            <select class="form-control" id="musculatura-acessoria" name="musculatura-acessoria">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>                        
                    </div>
                    <div id="quais-musculatura" class="form-group"></div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Batimento da Asa do Nariz</label>
                        <div class="col-md-8">
                            <select class="form-control" id="batimento-asa-nariz" name="batimento-asa-nariz">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Presença de Triagem Intercostal</label>
                        <div class="col-md-8">
                            <select class="form-control" id="presenca-triagem-intercostal" name="presenca-triagem-intercostal">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Predomínio Respiratória</label>
                        <div class="col-md-8">
                            <select class="form-control" id="predominio-respiratoria" name="predominio-respiratoria">
                                <option>Selecione</option>
                                <option value="1">Inspiração e Expiração Oral</option>
                                <option value="2">Inspiração Nasal e Expiração Oral</option>                                
                                <option value="3">Inspiração Nasal e Expiração Nasal</option>                                
                                <option value="4">Tranqueostomatizado</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Morfologia Torácica</label>
                        <div class="col-md-8">
                            <select class="form-control" id="morfologia-toracica" name="morfologia-toracica">
                                <option>Selecione</option>
                                <option value="1">DIAM. ANT POST = DIAM TRANSVERSO</option>
                                <option value="2">DIAM. ANT POST MAIOR DIAM TRANSVERSO</option>                                
                                <option value="3">DIAM. ANT POST MENOR DIAM TRANSVERSO</option>                                
                                <option value="4">PECTUS CARINATUM</option>                                
                                <option value="5">PECTUS ESCAVATUM</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Expansibilidade Torácica</label>
                        <div class="col-md-8">
                            <select class="form-control" id="expansibilidade-toracica" name="expansibilidade-toracica">
                                <option>Selecione</option>
                                <option value="1">Aumentado</option>
                                <option value="2">Diminuído</option>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Ritmo Respiratório</label>
                        <div class="col-md-8">
                            <select class="form-control" id="ritmo-respiratorio" name="ritmo-respiratorio">
                                <option>Selecione</option>
                                <option value="1">Dispineia</option>
                                <option value="2">Taquipneia</option>                                                                
                                <option value="2">Ritmo Superficial</option>                                                                
                                <option value="2">Eupneico</option>                                                                
                                <option value="2">Respiração Cheyne-Stokes</option>                                                                
                                <option value="2">Respiração Biot</option>                                                                
                                <option value="2">Respiração Kussmaul</option>                                                                
                                <option value="2">Respiração Suspirosa</option>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12" for="frequencia-respiratoria">Frequência Respiratória</label>
                        <div class="col-md-8">
                            <input type="text" id="frequencia-respiratoria" name="frequencia-respiratoria" required="required" class="form-control col-md-7 col-xs-12">
                        </div>                    
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Dispineia Escala MRC</label>
                        <div class="col-md-8">
                            <select class="form-control" id="dispineia-escala-mrc" name="dispineia-escala-mrc">
                                <option>Selecione</option>
                                <option value="1">Grandes Esforços</option>
                                <option value="2">Pequenos Esforços</option>                                                                
                                <option value="2">Ritmo Superficial</option>                                                                
                                <option value="2">Médio Esforços</option>                                                                
                                <option value="2">Dispinéia presente ao repouso</option>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Presença de Deformidades Posturais</label>
                        <div class="col-md-8">
                            <select class="form-control" id="presenca-deformidades-posturais" name="presenca-deformidades-posturais">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div>
                    <div id="quais-deformidades-posturais" class="form-group"></div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Mobilidade Torácica</label>
                        <div class="col-md-8">
                            <select class="form-control" id="mobilidade-toracica" name="dispineia-escala-mrc">
                                <option>Selecione</option>
                                <option value="1">HTxD EXPANDE MAIS</option>
                                <option value="2">HTxD EXPANDE IGUALMENTE</option>                                                                
                                <option value="3">PREDOMINIO TORACICO</option>                                                                
                                <option value="4">HTxE EXPANDE MAIS</option>                                                                
                                <option value="5">PREDOMINIO ABDOMINAL</option>                                                                
                                <option value="6">HTx D EXPANDE MAIS</option>                                                                
                            </select>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="div-agenda x_panel">
                <div class="x_title">
                    <h4><b>Palpação</b></h4>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Grau de Força (CUELLO)</label>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Diafragma</label>
                        <div class="col-md-8">
                            <select class="form-control" id="diafragma" name="diafragma">
                                <option>Selecione</option>
                                <option value="1">Direito</option>
                                <option value="2">Esquerdo</option>                                
                            </select>
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Intercostais</label>
                        <div class="col-md-8">
                            <select class="form-control" id="intercostais" name="intercostais">
                                <option>Selecione</option>
                                <option value="1">Direito</option>
                                <option value="2">Esquerdo</option>                            
                            </select>
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Cistometria Torácica</label>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Axilar</label>
                        <div class="col-md-8">
                            <select class="form-control" id="axilar" name="axilar">
                                <option>Selecione</option>
                                <option value="1">Normal</option>
                                <option value="2">Insp Max</option>                                
                                <option value="3">Exp Max</option>                                
                            </select>
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Mamilar</label>
                        <div class="col-md-8">
                            <select class="form-control" id="Mamilar" name="Mamilar">
                                <option>Selecione</option>
                                <option value="1">Normal</option>
                                <option value="2">Insp Max</option>                                
                                <option value="3">Exp Max</option>                          
                            </select>
                        </div>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Últimos Arcos Costais</label>
                        <div class="col-md-8">
                            <select class="form-control" id="Mamilar" name="Mamilar">
                                <option>Selecione</option>
                                <option value="1">Normal</option>
                                <option value="2">Insp Max</option>                                
                                <option value="3">Exp Max</option>                        
                            </select>
                        </div>
                    </div><br/> <br/> 
                    <div class="item form-group">                        
                        <div class="col-md-8">
                            <table class="table table-bordered">                                
                                <tbody>
                                    <tr>
                                        <td>
                                            <b>0</b>
                                        </td>
                                        <td>
                                            <b>Paralisia</b>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>1</b>
                                        </td>
                                        <td>
                                            <b>Tônus</b>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>2</b>
                                        </td>
                                        <td>
                                            <b>Tônus / Expande</b>
                                        </td>                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <b>3</b>
                                        </td>
                                        <td>
                                            <b>Tônus / Expande / Expulsa</b>
                                        </td>                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="div-agenda x_panel">
                <div class="x_title">
                    <h4><b>Ascultura Pulmonar</b></h4>                
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">                    
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">CPP MV</label>
                        <div class="col-md-8">
                            <select class="form-control" id="cpp-mv" name="cpp-mv">
                                <option>Selecione</option>
                                <option value="1">Presente Simétrico</option>
                                <option value="2">Presente Assimétrico</option>                                                                
                                <option value="3">Diminuído</option>                                                                
                                <option value="4">Abolido</option>                                                                
                                <option value="5">Aumentado</option>                                                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Ruídos</label>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Secos</label>
                        <div class="col-md-8">
                            <select class="form-control" id="ruidos-secos" name="ruidos-secos">
                                <option>Selecione</option>
                                <option value="1">Roncos</option>
                                <option value="2">Sibilos</option>                                
                            </select>
                        </div>
                    </div>                    
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Úmidos</label>
                        <div class="col-md-8">
                            <select class="form-control" id="ruidos-umidos" name="ruidos-umidos">
                                <option>Selecione</option>
                                <option value="1">Bolhosos</option>
                                <option value="2">Creptantes</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Motora</label>
                    </div> 
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Tônus</label>
                        <div class="col-md-8">
                            <select class="form-control" id="motora-tonus" name="motora-tonus">
                                <option>Selecione</option>
                                <option value="1">Hipotonico</option>
                                <option value="2">Hipertonico</option>                                
                                <option value="2">Eutonico</option>                                
                            </select>
                        </div>
                    </div>                    
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Trofismo</label>
                        <div class="col-md-8">
                            <select class="form-control" id="trofismo" name="trofismo">
                                <option>Selecione</option>
                                <option value="1">Hipotrofico</option>
                                <option value="2">Hipertrofico</option>                                
                            </select>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Cicatrizes</label>
                        <div class="col-md-8">
                            <select class="form-control" id="cicatrizes" name="cicatrizes">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div>
                    <div id="topografia-cicatrizes" class="form-group"></div>
                    <div id="lado-topografia-cicatrizes" class="form-group"></div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Cianose</label>
                        <div class="col-md-8">
                            <select class="form-control" id="cianose" name="cianose">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div>
                    <div id="topografia-cianose" class="form-group"></div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Hematoma</label>
                        <div class="col-md-8">
                            <select class="form-control" id="hematoma" name="hematoma">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div>
                    <div id="topografia-hematoma" class="form-group"></div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Eritema</label>
                        <div class="col-md-8">
                            <select class="form-control" id="eritema" name="eritema">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div>
                    <div id="topografia-eritema" class="form-group"></div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Edema</label>
                        <div class="col-md-8">
                            <select class="form-control" id="edema" name="edema">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div>
                    <div id="topografia-edema" class="form-group"></div>
                    <div class="item form-group">
                        <label class="col-md-4 col-sm-3 col-xs-12">Alteração de Temperatura</label>
                        <div class="col-md-8">
                            <select class="form-control" id="alteracao-temperatura" name="alteracao-temperatura">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="2">Não</option>                                
                            </select>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8" style="float: left">
                    <button id="gravar-avalicao" class="btn btn-success btn-xs">Gravar</button>
                    <button id="limpar-avalicao" class="btn btn-primary btn-xs" type="reset">Limpar</button>
                    <a href="<?php echo URL ?>/home"><button class="btn btn-danger btn-xs" type="button">Cancelar</button></a>
                </div>
            </div> 
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/avaliacoes/pneumologia.js"></script>