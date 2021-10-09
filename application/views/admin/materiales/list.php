<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        MATERIAL
        <small>LISTAR MATERIAL</small>
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
                    <a href="<?php echo base_url();?>rev/materiales/add" class="btn btn-primary btn-sm">        
                    <strong>NUEVO MATERIAL&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></a>  
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
                        <table id="tabla-material" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>    
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Medida</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($materiales)):?>             
                                    <?php foreach($materiales as $material):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $material->abre_material;?></td>
                                            <td class="text-center"><?php echo $material->nombre_material;?></td>
                                            <td class="text-center"><?php echo $material->descripcion_material;?></td>
                                            <td class="text-center"><?php echo $material->unidad_material;?></td>
                                            <td class="text-center"><?php echo $material->stock_material;?></td>
                                            <td class="text-center"><?php echo $material->precio_material;?></td>
                                            <!-- Items de Información -->
                                            <?php
                                                $datamaterial = $material->id_material."*".$material->abre_material."*".$material->nombre_material."*".$material->descripcion_material."*".$material->unidad_material."*".$material->stock_material."*".$material->precio_material;
                                            ?>
                                            <!-- Galeria de opciones -->                                  
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-primary btn-view-material" data-toggle="modal" data-target="#modal-default" value="<?php echo $datamaterial;?>">
                                                    <span class="fa fa-file-text-o"></span>
                                                    </button>
                                                    <button type="button" class="btn btn-xs bg-olive btn-edit-material" data-toggle="modal" data-target="#exampleModal" value="<?php echo $datamaterial;?>">
                                                    <span class="fa fa-plus"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>rev/materiales/edit/<?php echo $material->id_material;?>" class="btn btn-xs btn-warning">
                                                    <span class="fa fa-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>rev/materiales/delete/<?php echo $material->id_material;?>" class="btn  btn-xs btn-danger btn-remove">
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
                <h4 class="modal-title">Información de los Materiales</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger btn-flat pull-left" data-dismiss="modal">
                <span class="fa fa-close"></span> &nbsp Cerrar</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Abastecimiento de Materiales-->
<div class="modal fade" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <!-- Formulario -->
                <form action="<?php echo base_url();?>rev/materiales/updatestock" method="POST">  
                    <!-- Header -->
                    <div class="box-header with-border">
                        <h3 class="box-title">Abastecimiento de materiales</h3>
                    </div>
                    <!-- Body -->
                    <div class="box-body">
                        <div class="row">                                            
                            <!-- Valores del Material -->
                                    <input type="hidden" class="form-control" id="id_material" name="id_material">
                                    <input type="hidden" class="form-control" id="stock_material" name="stock_material">
                            <!-- Nuevo Stock -->
                            <div class="col-md-12">
                                <div class="form-group <?php echo form_error('nuevo_stock_material') == true ? 'has-error':''?>">
                                    <label for="nuevo_stock_material">Cantidad:</label>
                                    <input type="text" class="form-control" id="nuevo_stock_material" name="nuevo_stock_material">
                                    <?php echo form_error("nuevo_stock_material","<span class='help-block'>","</span>");?>
                                </div>
                            </div>  
                        </div>     
                    </div>
                    <!-- Footer -->
                    <div class="box-footer">
                        <!-- Cajón de Opciones -->
                        <div class="btn-group">
                            <button type="submit" class="btn bg-green btn-flat">
                            <span class="fa fa-check"></span> &nbsp Guardar</button>
                            <a class="btn btn-danger btn-flat pull-left" data-dismiss="modal">
                            <span class="fa fa-close"></span> &nbsp Cancelar</a>
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>