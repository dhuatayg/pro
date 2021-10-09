<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
            USUARIO
            <small>LISTAR USUARIO</small>
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
                    <a href="<?php echo base_url();?>administracion/usuarios/add" class="btn btn-primary btn-sm">        
                    <strong>NUEVO USUARIO&nbsp;&nbsp;&nbsp;</strong><span class="fa fa-plus-circle"></span></a>  
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
                        <table id="tabla-usuario" class="table table-bordered table-striped dataTable" role="grid">
                            <thead>
                                <tr>    
                                    <th class="text-center">Código</th>
                                    <th class="text-center">DNI</th> 
                                    <th class="text-center">Empleado</th>
                                    <th class="text-center">Usuario</th>
                                    <th class="text-center">Rol</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($usuarios)):?>             
                                    <?php foreach($usuarios as $usuario):?>
                                        <tr>                                  
                                            <!-- Items de la tabla -->
                                            <td class="text-center"><?php echo $usuario->abre_usuario;?></td> 
                                            <td class="text-center"><?php echo $usuario->dni;?></td>       
                                            <td class="text-center"><?php echo $usuario->nombre." ".$usuario->paterno." ".$usuario->materno;?></td>
                                            <td class="text-center"><?php echo $usuario->user_usuario;?></td>
                                            <td class="text-center"><?php echo $usuario->rol;?></td>
                                            <!-- Items de Información -->
                                            <?php
                                                $datausuario = $usuario->id_usuario."*".$usuario->abre_usuario."*".$usuario->dni."*".$usuario->nombre."*".$usuario->paterno."*".$usuario->materno."*".$usuario->user_usuario."*".$usuario->rol;
                                            ?>
                                            <!-- Galeria de opciones -->                                  
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-xs btn-default btn-view-usuario" data-toggle="modal" data-target="#modal-default" value="<?php echo $datausuario;?>">
                                                    <span class="glyphicon glyphicon-list-alt"></span>
                                                    </button>
                                                    <a href="<?php echo base_url()?>administracion/usuarios/edit/<?php echo $usuario->id_usuario;?>" class="btn btn-xs btn-warning">
                                                    <span class="glyphicon glyphicon-edit"></span></a>
                                                    <a href="<?php echo base_url();?>administracion/usuarios/delete/<?php echo $usuario->id_usuario;?>" class="btn  btn-xs btn-danger btn-remove">
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
                <h4 class="modal-title">Información del Usuario</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

