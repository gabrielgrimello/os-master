<?php if($this->permission->checkPermission($this->session->userdata('permissao'),'aEquipamento')){ ?>
    <a href="<?php echo base_url();?>index.php/equipamentos/adicionar" class="btn btn-success"><i class="icon-plus icon-white"></i> Adicionar Equipamento</a>    
<?php } ?>

<?php
if(!$results){?>

        <div class="widget-box">
        <div class="widget-title">
            <span class="icon">
                <i class="icon-user"></i>
            </span>
            <h5>Equipamentos</h5>

        </div>

        <div class="widget-content nopadding">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tipo Equipamento</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Série</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5">Nenhum Equipamento Cadastrado</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php }else{
	

?>
<div class="widget-box">
     <div class="widget-title">
        <span class="icon">
            <i class="icon-user"></i>
         </span>
        <h5>Equipamentos</h5>

     </div>

<div class="widget-content nopadding">


<table class="table table-bordered ">
    <thead>
        <tr>
            <th>#</th>
            <th>Tipo Equipamento</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Série</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $r) {
            echo '<tr>';
            echo '<td>'.$r->idEquipamentos.'</td>';
            echo '<td>'.$r->tipoEquipamento.'</td>';
            echo '<td>'.$r->marca.'</td>';
            echo '<td>'.$r->modelo.'</td>';
            echo '<td>'.$r->serie.'</td>';
            echo '<td>';
            if($this->permission->checkPermission($this->session->userdata('permissao'),'vEquipamento')){
                echo '<a href="'.base_url().'index.php/equipamentos/visualizar/'.$r->idEquipamentos.'" style="margin-right: 1%" class="btn tip-top" title="Ver mais detalhes"><i class="icon-eye-open"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'eEquipamento')){
                echo '<a href="'.base_url().'index.php/equipamentos/editar/'.$r->idEquipamentos.'" style="margin-right: 1%" class="btn btn-info tip-top" title="Editar Equipamento"><i class="icon-pencil icon-white"></i></a>'; 
            }
            if($this->permission->checkPermission($this->session->userdata('permissao'),'dEquipamento')){
                echo '<a href="#modal-excluir" role="button" data-toggle="modal" equipamento="'.$r->idEquipamentos.'" style="margin-right: 1%" class="btn btn-danger tip-top" title="Excluir Equipamento"><i class="icon-remove icon-white"></i></a>'; 
            }

              
            echo '</td>';
            echo '</tr>';
        }?>
        <tr>
            
        </tr>
    </tbody>
</table>
</div>
</div>
<?php echo $this->pagination->create_links();}?>



 
<!-- Modal -->
<div id="modal-excluir" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>index.php/equipamentos/excluir" method="post" >
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h5 id="myModalLabel">Excluir Equipamento</h5>
  </div>
  <div class="modal-body">
    <input type="hidden" id="idEquipamento" name="id" value="" />
    <h5 style="text-align: center">Deseja realmente excluir este equipamento e os dados associados a ele (OS, Vendas, Receitas)?</h5>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Cancelar</button>
    <button class="btn btn-danger">Excluir</button>
  </div>
  </form>
</div>






<script type="text/javascript">
$(document).ready(function(){


   $(document).on('click', 'a', function(event) {
        
        var equipamentos = $(this).attr('equipamentos');
        $('#idEquipamento').val(equipamentos);

    });

});

</script>
