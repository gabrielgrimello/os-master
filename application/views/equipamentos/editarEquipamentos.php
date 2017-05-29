<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-user"></i>
                </span>
                <h5>Editar Equipamento</h5>
            </div>
            <div class="widget-content nopadding">
                <?php if ($custom_error != '') {
                    echo '<div class="alert alert-danger">' . $custom_error . '</div>';
                } ?>
                <form action="<?php echo current_url(); ?>" id="formEquipamento" method="post" class="form-horizontal" >
                    <div class="control-group">
                        <?php echo form_hidden('idEquipamentos',$result->idEquipamentos) ?>
                        <label class="control-label" for="tipoEquipamento">Tipo<span class="required">*</span></label>
                        <div class="controls">
                            <select  name="tipoEquipamento" id="tipoEquipamento" <?php echo $result->tipoEquipamento; ?>>
                                <option value="Computador">Computador</option>
                                <option value="Estabilizador">Estabilizador</option>
                                <option value="Impressora Etiqueta">Impressora Etiqueta</option>
                                <option value="Impressora Fiscal">Impressora Fiscal</option>
                                <option value="Impressora Jato Tinta">Impressora Jato de tinta</option>
                                <option value="Impressora Laser">Impressora Laser</option>
                                <option value="Impressora Matricial">Impressora Matricial</option>
                                <option value="Impressora Térmica">Impressora Térmica</option>
                                <option value="Leitor Cód Barras">Leitor Cód Barras</option>
                                <option value="Monitor">Monitor</option>
                                <option value="Netbook">Netbook</option>
                                <option value="Nobreak" selected="">Nobreak</option>
                                <option value="Notebook">Notebook</option>
                                <option value="SAT">SAT</option>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="marca" class="control-label">Marca<span class="required">*</span></label>
                        <div class="controls">
                            <input id="marca" type="text" name="marca" value="<?php echo $result->marca; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="modelo" class="control-label">Modelo<span class="required">*</span></label>
                        <div class="controls">
                            <input id="modelo" type="text" name="modelo" value="<?php echo $result->modelo; ?>"  />
                        </div>
                    </div>
                    <div class="control-group">
                        <label for="serie" class="control-label">Série<span class="required">*</span></label>
                        <div class="controls">
                            <input id="serie" type="text" name="serie" value="<?php echo $result->serie; ?>"  />
                        </div>
                    </div>

                    <div class="control-group">
                        <label for="patrimonio" class="control-label">Patrimônio</label>
                        <div class="controls">
                            <input id="patrimonio" type="text" name="patrimonio" value="<?php echo $result->patrimonio; ?>"  />
                        </div>
                    </div>



                    <div class="form-actions">
                        <div class="span12">
                            <div class="span6 offset3">
                                <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                                <a href="<?php echo base_url() ?>index.php/equipamentos" id="" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<script type="text/javascript">
      $(document).ready(function(){
           $('#formEquipamento').validate({
            rules :{
                  tipo:{ required: true},
                  marca:{ required: true},
                  modelo:{ required: true},
                  serie:{ required: true}
            },
            messages:{
                  tipo :{ required: 'Campo Requerido.'},  
                  marca :{ required: 'Campo Requerido.'},
                  modelo :{ required: 'Campo Requerido.'},
                  serie:{ required: 'Campo Requerido.'}
            },

            errorClass: "help-inline",
            errorElement: "span",
            highlight:function(element, errorClass, validClass) {
                $(element).parents('.control-group').addClass('error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).parents('.control-group').removeClass('error');
                $(element).parents('.control-group').addClass('success');
            }
           });
      });
</script>

