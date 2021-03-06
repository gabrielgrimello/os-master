<link rel="stylesheet" href="<?php echo base_url();?>assets/js/jquery-ui/css/smoothness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-ui/js/jquery-ui-1.9.2.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.validate.js"></script>
<div class="row-fluid" style="margin-top:0">
    <div class="span12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="icon-tags"></i>
                </span>
                <h5>Cadastro de OS</h5>
            </div>
            <div class="widget-content nopadding">
                

                <div class="span12" id="divProdutosServicos" style=" margin-left: 0">
                    <ul class="nav nav-tabs">
                        <li class="active" id="tabDetalhes"><a href="#tab1" data-toggle="tab">Detalhes da OS</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">

                            <div class="span12" id="divCadastrarOs">
                                <?php if($custom_error == true){ ?>
                                <div class="span12 alert alert-danger" id="divInfo" style="padding: 1%;">Dados incompletos, verifique os campos com asterisco ou se selecionou corretamente cliente e responsável.</div>
                                <?php } ?>
                                <form action="<?php echo current_url(); ?>" method="post" id="formOs">

                                    <div class="span12" style="padding: 1%">
                                        <div class="span6">
                                            <label for="cliente">Cliente<span class="required">*</span></label>
                                            <input id="cliente" class="span12" type="text" name="cliente" value=""  />
                                            <input id="clientes_id" class="span12" type="hidden" name="clientes_id" value=""  />
                                        </div>
                                        <div class="span4">
                                            <label for="tecnico">Técnico / Responsável<span class="required">*</span></label>
                                            <input id="tecnico" class="span12" type="text" name="tecnico" value=""  />
                                            <input id="usuarios_id" class="span12" type="hidden" name="usuarios_id" value=""  />
                                        </div>
                                        <div class="span2">
                                            <label for="prioridade">Prioridade</label>
                                            <select class="span12" name="prioridade" id="prioridade" value="">
                                                <option value="Baixa">Baixa</option>
                                                <option selected value="Normal">Normal</option>
                                                <option value="Urgente">Urgente</option>
                                                <option value="Emergencial">Emergêncial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span4">
                                            <label for="status">Status<span class="required">*</span></label>
                                            <select class="span12" name="status" id="status" value="">
                                                <option value="Orçamento">Orçamento</option>
                                                <option value="Aberto">Aberto</option>
                                                <option value="Em Andamento">Em Andamento</option>
                                                <option value="Finalizado">Finalizado</option>
                                                <option value="Cancelado">Cancelado</option>
                                            </select>
                                        </div>
                                        <div class="span2">
                                            <label for="dataInicial">Data Inicial<span class="required">*</span></label>
                                            <input id="dataInicial" class="span12 datepicker" type="text" name="dataInicial" value="<?php echo date('d/m/Y'); ?>"  />
                                        </div>
                                        <div class="span2">
                                            <label for="dataPronto">Data Pronto</label>
                                            <input id="dataPronto" class="span12 datepicker" type="text" name="dataPronto" value=""  />
                                        </div>
                                        <div class="span2">
                                            <label for="dataFinal">Data Final</label>
                                            <input id="dataFinal" class="span12 datepicker" type="text" name="dataFinal" value=""  />
                                        </div>
                                        <div class="span2">
                                            <label for="garantia">Garantia</label>
                                            <select class="span12" name="garantia" id="garantia" value="">
                                                <option value="Não">Não</option>
                                                <option value="Sim">Sim</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span6">
                                            <label for="equipamento">Equipamento<span class="required">*</span></label>
                                            <input id="equipamento" class="span12" type="text" name="equipamento" value=""  />
                                            <input id="equipamentos_id" class="span12" type="hidden" name="equipamentos_id" value=""  />
                                        </div>
                                        <div class="span3">
                                            <label for="marca">Marca<span class="required">*</span></label>
                                            <input id="marca" class="span12" type="text" name="marca" value=""  />
                                        </div>
                                        <div class="span3">
                                            <label for="modelo">Modelo<span class="required">*</span></label>
                                            <input id="modelo" class="span12" type="text" name="modelo" value=""  />
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6">
                                            <label for="serie">Serie<span class="required">*</span></label>
                                            <input id="serie" type="text" class="span12" name="serie" value=""  />
                                            <br> <br>
                                            <label for="patrimonio">Patrimonio</label>
                                            <input id="patrimonio" type="text" class="span12" name="patrimonio" value=""  />
                                        </div>
                                        
                                        <div class="span6">
                                            <label for="acessorios">Acessórios</label>
                                            <textarea class="span12" name="acessorios" id="acessorios" cols="30" rows="5"></textarea>
                                        </div>
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">

                                        <div class="span6">
                                            <label for="observacoes">Observações</label>
                                            <textarea class="span12" name="observacoes" id="observacoes" cols="30" rows="5"></textarea>
                                        </div>
                                        <div class="span6">
                                            <label for="defeito">Defeito Reclamado</label>
                                            <textarea class="span12" name="defeito" id="defeito" cols="30" rows="5"></textarea>
                                        </div>

                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span12">
                                            <label for="laudoTecnico">Laudo técnico</label>
                                            <textarea class="span12" name="laudoTecnico" id="laudo" cols="30" rows="5"></textarea>
                                        </div>
                                        
                                    </div>
                                    <div class="span12" style="padding: 1%; margin-left: 0">
                                        <div class="span6 offset3" style="text-align: center">
                                            <button class="btn btn-success" id="btnContinuar"><i class="icon-share-alt icon-white"></i> Continuar</button>
                                            <a href="<?php echo base_url() ?>index.php/os" class="btn"><i class="icon-arrow-left"></i> Voltar</a>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>

                
.
             
        </div>
        
    </div>
</div>
</div>



<script type="text/javascript">
$(document).ready(function(){

      $("#cliente").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteCliente",
            minLength: 1,
            select: function( event, ui ) {

                 $("#clientes_id").val(ui.item.id);
                

            }
      });
      
      $("#equipamento").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteEquipamento",
            minLength: 1,
            select: function( event, ui ) {

                 $("#equipamentos_id").val(ui.item.id);
                

            }
      });

      $("#tecnico").autocomplete({
            source: "<?php echo base_url(); ?>index.php/os/autoCompleteUsuario",
            minLength: 1,
            select: function( event, ui ) {

                 $("#usuarios_id").val(ui.item.id);


            }
      });

      
      

      $("#formOs").validate({
          rules:{
             cliente: {required:true},
             tecnico: {required:true},
             equipamento: {required:true},
             dataInicial: {required:true}
          },
          messages:{
             cliente: {required: 'Campo Requerido.'},
             tecnico: {required: 'Campo Requerido.'},
             equipamento: {required: 'Campo Requerido.'},
             dataInicial: {required: 'Campo Requerido.'}
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

    $(".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
   
});

</script>

