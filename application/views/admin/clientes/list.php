<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Cliente
        <small>Listado de clientes</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="#"></i>Mantenimientos</a></li>
        <li class="active">Cliente</li>
      </ol>
    </section>
    <!-- Contenido de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Header -->
            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="<?php echo base_url();?>mantenimiento/clientes/add" class="btn btn- xs bg-navy btn-flat">        
                    <span class="glyphicon glyphicon-plus"></span> &nbsp Nuevo Cliente</a>  
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
                                                    <button type="button" class="btn btn-xs btn-default btn-view-cliente" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacliente;?>">
                                                    <span class="glyphicon glyphicon-list-alt"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/clientes/edit/<?php echo $cliente->id_cliente;?>" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/clientes/delete/<?php echo $cliente->id_cliente;?>" class="btn  btn-xs btn-danger btn-remove">
                                                    <span class="glyphicon glyphicon-trash"></span></a>
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

