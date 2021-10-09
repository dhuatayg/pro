<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        CATEGORIA
        <small>LISTAR CATEGORIA</small>
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
                    <a href="<?php echo base_url();?>rev/categorias/add" class="btn btn-primary btn-sm">         
                    <strong>NUEVA CATEGORIA&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></a>  
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
                        <table id="tabla-categoria" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>    
                                    <th class="text-center">Código</th>  
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($categorias)):?>             
                                    <?php foreach($categorias as $categoria):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $categoria->abre_categoria;?></td>          
                                            <td class="text-center"><?php echo $categoria->nombre_categoria;?></td>
                                            <td class="text-center"><?php echo $categoria->descripcion_categoria;?></td>
                                            <!-- Items de Información -->
                                            <?php
                                                $datacategoria = $categoria->id_categoria."*".$categoria->abre_categoria."*".$categoria->nombre_categoria."*".$categoria->descripcion_categoria;
                                            ?>
                                            <!-- Galeria de opciones -->                                  
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-primary btn-view-categoria" data-toggle="modal" data-target="#modal-default" value="<?php echo $datacategoria;?>">
                                                    <span class="fa fa-file-text-o"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>rev/categorias/edit/<?php echo $categoria->id_categoria;?>"  class="btn btn-xs btn-warning">
                                                    <span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>rev/categorias/delete/<?php echo $categoria->id_categoria;?>" class="btn  btn-xs btn-danger btn-remove">
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
                <h4 class="modal-title">Información del Categorías</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

