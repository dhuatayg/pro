<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        CARGO
        <small>LISTAR CARGO</small>
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
                    <a href="<?php echo base_url();?>mantenimiento/cargos/add" class="btn btn-primary btn-sm">            
                    <strong>NUEVO CARGO&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></a>  
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
                        <table id="tabla-cargo" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>    
                                    <th class="text-center">Código</th>  
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($cargos)):?>             
                                    <?php foreach($cargos as $cargo):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $cargo->abre_cargo;?></td>          
                                            <td class="text-center"><?php echo $cargo->nombre_cargo;?></td>
                                            <!-- Items de Información -->
                                            <?php
                                                $datacargo = $cargo->id_cargo."*".$cargo->abre_cargo."*".$cargo->nombre_cargo;
                                            ?>
                                            <!-- Galeria de opciones -->                                  
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-primary btn-view-cargo" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacargo;?>">
                                                    <span class="fa fa-file-text-o"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>mantenimiento/cargos/edit/<?php echo $cargo->id_cargo;?>" class="btn btn-xs btn-warning">
                                                    <span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>mantenimiento/cargos/delete/<?php echo $cargo->id_cargo;?>" class="btn  btn-xs btn-danger btn-remove">
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
                <h4 class="modal-title">Información del Cargo</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

