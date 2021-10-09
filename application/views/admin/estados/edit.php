<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Estado
        <small>Editar estado</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="#"></i>Mantenimientos</a></li>
        <li class="active">Editar Estado</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/estados/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Estado -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $estado->id_estado;?>" id="id_estado" name="id_estado">
                            <div class="form-group"> 
                                <label for="abre_estado">Código:</label>
                                <input type="text" class="form-control" id="abre_estado" name="abre_estado"  value="<?php echo $estado->abre_estado;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Estado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_estado') == true ? 'has-error':''?>">
                                <label for="nombre_estado">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_estado" name="nombre_estado" value="<?php echo $estado->nombre_estado;?>">
                                <?php echo form_error("nombre_estado","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Descripción de Estado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_estado') == true ? 'has-error':''?>">
                                <label for="descripcion_estado">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_estado" name="descripcion_estado" value="<?php echo $estado->descripcion_estado;?>">
                                <?php echo form_error("descripcion_estado","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>mantenimiento/estados/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>