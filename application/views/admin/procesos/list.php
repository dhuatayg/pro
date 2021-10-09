<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
    <h1>
        Proceso
        <small>Listado de procesos</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="#"></i>Mantenimientos</a></li>
        <li class="active">Proceso</li>
      </ol>
    </section>
    <!-- Contenido de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Header -->
            <div class="box-header with-border">
                <div class="btn-group">
                    <a href="<?php echo base_url();?>mantenimiento/procesos/add" class="btn btn- xs bg-navy btn-flat">        
                    <span class="glyphicon glyphicon-plus"></span> &nbsp Nuevo Proceso</a>  
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
                        <table id="tabla-proceso" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>    
                                    <th class="text-center">Código</th>  
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Área</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($procesos)):?>             
                                    <?php foreach($procesos as $proceso):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $proceso->abre_proceso;?></td>          
                                            <td class="text-center"><?php echo $proceso->nombre_proceso;?></td>
                                            <td class="text-center"><?php echo $proceso->descripcion_proceso;?></td>
                                            <td class="text-center"><?php echo $proceso->area;?></td>
                                            <!-- Items de Información -->
                                            <?php
                                                $dataproceso = $proceso->id_proceso."*".$proceso->abre_proceso."*".$proceso->nombre_proceso."*".$proceso->descripcion_proceso."*".$proceso->area;
                                            ?>
                                            <!-- Galeria de opciones -->                                  
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-default btn-view-proceso" data-toggle="modal" data-target="#modal-default" value="<?php echo $dataproceso;?>">
                                                    <span class="glyphicon glyphicon-list-alt"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/procesos/edit/<?php echo $proceso->id_proceso;?>" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/procesos/delete/<?php echo $proceso->id_proceso;?>" class="btn  btn-xs btn-danger btn-remove">
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
                <h4 class="modal-title">Información del Proceso</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

