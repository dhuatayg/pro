<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        ROL
        <small>EDITAR ROL</small>
        </h3>
    </section>
    <hr>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>administracion/roles/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Estado -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $rol->id_rol;?>" id="id_rol" name="id_rol">
                            <div class="form-group"> 
                                <label for="abre_rol">Código:</label>
                                <input type="text" class="form-control" id="abre_rol" name="abre_rol"  value="<?php echo $rol->abre_rol;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Estado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_rol') == true ? 'has-error':''?>">
                                <label for="nombre_rol">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_rol" name="nombre_rol" value="<?php echo $rol->nombre_rol;?>">
                                <?php echo form_error("nombre_rol","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Descripción de Estado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_rol') == true ? 'has-error':''?>">
                                <label for="descripcion_rol">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_rol" name="descripcion_rol" value="<?php echo $rol->descripcion_rol;?>">
                                <?php echo form_error("descripcion_rol","<span class='help-block'>","</span>");?>
                            </div>
                        </div>    
                    </div>     
                </div>
                <br>
                <hr>
                <br>
                <!-- Footer -->
                <div class="box-footer">
                    <!-- Cajón de Opciones -->
                    <div class="btn-group">
                        <button type="submit" class="btn bg-green btn-primary">
                        <span class="fa fa-check"></span> &nbsp Guardar</button>
                        <a href="<?php echo base_url();?>administracion/roles/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>