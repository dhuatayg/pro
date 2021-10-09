<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
            ROL
            <small>LISTAR ROL</small>
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
                    <a href="<?php echo base_url(); ?>administracion/roles/add" class="btn btn-primary btn-sm">        
                    <strong>NUEVO ROL&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></a>  
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
                        <table id="tabla-rol" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>
                                    <th class="text-center">Código</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripcion</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($roles)) : ?>
                                    <?php foreach ($roles as $rol) : ?>
                                        <tr>
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $rol->abre_rol; ?></td>
                                            <td class="text-center"><?php echo $rol->nombre_rol; ?></td>
                                            <td class="text-center"><?php echo $rol->descripcion_rol; ?></td>
                                            <!-- Items de Información -->
                                            <?php
                                            $datarol = $rol->id_rol . "*" . $rol->abre_rol . "*" . $rol->nombre_rol . "*" . $rol->descripcion_rol;
                                            ?>
                                            <!-- Galeria de opciones -->
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-primary btn-view-rol" data-toggle="modal" data-target="#modal-default" value="<?php echo $datarol; ?>">
                                                        <span class="glyphicon glyphicon-list-alt"></span>
                                                    </button>
                                                    <a href="<?php echo base_url() ?>administracion/roles/edit/<?php echo $rol->id_rol; ?>" class="btn btn-xs btn-warning">
                                                        <span class="glyphicon glyphicon-edit"></span></a>
                                                    <a href="<?php echo base_url(); ?>administracion/roles/delete/<?php echo $rol->id_rol; ?>" class="btn  btn-xs btn-danger btn-remove">
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
                <h4 class="modal-title">Información del Rol</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>