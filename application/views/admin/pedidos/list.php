<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        PEDIDO
        <small>LISTAR PEDIDO</small>
        </h3>
    </section>
    <hr>
    </section>
    <!-- Contenido de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Header -->
            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="<?php echo base_url();?>movimiento/pedidos/add" class="btn btn- xs bg-navy btn-flat">        
                    <span class="glyphicon glyphicon-plus"></span> &nbsp Nuevo Pedido</a>  
                    <button id="btn_pdf" class="btn bg-red btn-flat">             
                    <span class="fa fa-file-pdf-o"></span> &nbsp Exportar en PDF</button>                     
                    <button id="btn_excel" class="btn bg-green btn-flat">      
                    <span class="fa fa-file-excel-o"></span> &nbsp Exportar en Excel</button>
                </div>
            </div>
            <div class="box-body">
                <!-- Contenido de la caja -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabla -->
                        <table id="tabla-pedido" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>
                                    <th class="text-center">Serie</th>
                                    <th class="text-center">PEDIDO</th>
                                    <th class="text-center">Fecha Emisión</th>
                                    <th class="text-center">Fecha Entrega</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($pedidos)): ?>
                                    <?php foreach($pedidos as $pedido):?>
                                        <tr>
                                            <td class="text-center"><?php echo $pedido->abre_pedido;?></td>
                                            <td class="text-center"><?php echo $pedido->nom;?></td>
                                            <td class="text-center"><?php echo $pedido->fecha_pedido;?></td>
                                            <td class="text-center"><?php echo $pedido->entrega_pedido;?></td>
                                            <td class="text-center"><?php echo $pedido->monto_pedido;?></td>
                                            <td class="text-center">                                            
                                            <?php
                                            if($pedido->id_estado == "1"){
                                                ?>
                                                <small class="label label-success"><i class="fa fa-hand-peace-o"></i>&nbsp <?php echo $pedido->es;?></small>
                                                </td>
                                                <?php                                       
                                            }else{
                                                ?>
                                                <small class="label label-warning"><i class="fa fa-spinner"></i>&nbsp <?php echo $pedido->es;?></small>
                                                </td>
                                                <?php
                                            }
                                            ?>
                                            </td>
                                            <!-- opciones -->
                                            <td class="text-center"> 
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-default btn-view-pedido" value="<?php echo $pedido->id_pedido;?>" data-toggle="modal" data-target="#modal-default">
                                                    <span class="glyphicon glyphicon-list-alt"></span>
                                                    </button> 
                                                    </button>
                                                    <a href="<?php echo base_url()?>movimiento/pedidos/edit/<?php echo $pedido->id_pedido;?>" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>movimiento/pedidos/delete/<?php echo $pedido->id_pedido;?>" class="btn  btn-xs btn-danger btn-remove">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Información -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Información del Pedido</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <div class="btn-group">
                    <button type="button" class="btn btn-print bg-navy pull-left"><span class="glyphicon glyphicon glyphicon-print"></span>&nbsp&nbspImprimir</button>
                    <button type="button" class="btn btn-danger pull-right" data-dismiss="modal"><span class="glyphicon glyphicon glyphicon-chevron-left"></span>Volver</button>
                </div>
            </div>
        </div>
    </div>
</div>

