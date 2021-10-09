<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        PRODUCTO
        <small>LISTAR PRODUCTO</small>
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
                    <a href="<?php echo base_url();?>rev/productos/add" class="btn btn- xs bg-navy btn-flat">        
                    <span class="glyphicon glyphicon-plus"></span> &nbsp Nuevo Producto</a>  
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
                        <table id="tabla-producto" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>    
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Categoria</th>
                                    <th class="text-center">Stock</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($productos)):?>             
                                    <?php foreach($productos as $producto):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $producto->abre_producto;?></td>
                                            <td class="text-center"><?php echo $producto->nombre_producto;?></td>
                                            <td class="text-center"><?php echo $producto->categoria;?></td>
                                            <td class="text-center"><?php echo $producto->stock_producto;?></td>
                                            <td class="text-center"><?php echo $producto->precio_producto;?></td>
                                            <!-- Items de Información -->
                                            <!-- Galeria de opciones -->                                  
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-default btn-view-producto" data-toggle="modal" data-target="#modal-default" value="<?php echo $producto->id_producto;?>">
                                                    <span class="glyphicon glyphicon-list-alt"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>rev/productos/edit/<?php echo $producto->id_producto;?>" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-pencil"></span></a>
                                                    <a href="<?php echo base_url();?>rev/productos/delete/<?php echo $producto->id_producto;?>" class="btn  btn-xs btn-danger btn-remove">
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

<!-- Modal Productos -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Información del Producto</h4>
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

