<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        CLIENTE
        <small>LISTAR CLIENTE</small>
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
                    <a href="<?php echo base_url();?>mantenimiento/clientes/add" class="btn btn-primary btn-sm">         
                    <strong>NUEVo CLIENTE&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></a>  
                    <button id="btn_pdf" class="btn btn-danger btn-sm">             
                    <strong>REPORTE EN PDF&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-file-pdf-o"></span></button>                   
                    <button id="btn_excel" class="btn btn-success btn-sm">      
                    <strong>REPORTE EN EXCEL&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-file-excel-o"></span></button>
                </div>
            </div>
            <div class="box-body">
                <!-- Contenido de la caja -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabla -->
                        <table id="tabla-cliente" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>    
                                    <th class="text-center">Nº Documento</th>  
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($clientes)):?>             
                                    <?php foreach($clientes as $cliente):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $cliente->ndocumento_cliente;?></td>          
                                            <td class="text-center"><?php echo $cliente->nombre_cliente;?></td>
                                            <td class="text-center"><?php echo $cliente->telefono_cliente;?></td>
                                            <td class="text-center"><?php echo $cliente->correo_cliente;?></td>
                                            <!-- Items de Información -->
                                            <?php
                                                $datacliente = $cliente->id_cliente."*".$cliente->ndocumento_cliente."*".$cliente->nombre_cliente."*".$cliente->telefono_cliente."*".$cliente->correo_cliente;
                                            ?>
                                            <!-- Galeria de opciones -->                                  
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-primary btn-view-cliente" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacliente;?>">
                                                    <span class="fa fa-file-text-o"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/clientes/edit/<?php echo $cliente->id_cliente;?>" class="btn btn-xs btn-warning">
                                                    <span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/clientes/delete/<?php echo $cliente->id_cliente;?>" class="btn  btn-xs btn-danger btn-remove">
                                                    <span class="fa fa-trash"></span></a>
                                                </div>
                                            </td> 
                                        </tr>
                                    <?php 
                                        endforeach;
                                    ?>
                                <?php 
                                    endif;
                                ?>
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
                <h4 class="modal-title">Información del Cliente</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

