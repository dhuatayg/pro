<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        FASE
        <small>EDITAR FASE</small>
        </h3>
    </section>
    <hr>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/procesos/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Proceso -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $proceso->id_proceso;?>" id="id_proceso" name="id_proceso">
                            <div class="form-group"> 
                                <label for="abre_proceso">Código:</label>
                                <input type="text" class="form-control" id="abre_proceso" name="abre_proceso"  value="<?php echo $proceso->abre_proceso;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Proceso -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_proceso') == true ? 'has-error':''?>">
                                <label for="nombre_proceso">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_proceso" name="nombre_proceso" value="<?php echo $proceso->nombre_proceso;?>">
                                <?php echo form_error("nombre_proceso","<span class='help-block'>","</span>");?>
                            </div>
                        </div>  
                        <!-- Descripción de Área -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_proceso') == true ? 'has-error':''?>">
                                <label for="descripcion_proceso">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_proceso" name="descripcion_proceso" value="<?php echo $proceso->descripcion_proceso;?>">
                                <?php echo form_error("descripcion_proceso","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Datos del Área -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('id_area') == true ? 'has-error':''?>">
                                <label for="id_area">Área:</label>
                                <select class="form-control select2" id="buscar_area" name="id_area" style="width: 100%;">
                                    <?php foreach($areas as $area):?>                        
                                        <?php if($area->id_area== $proceso->id_area):?>
                                        <option value="<?php echo $area->id_area?>" selected><?php echo $area->nombre_area;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $area->id_area?>"><?php echo $area->nombre_area;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>                             
                                <?php echo form_error("id_area","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>mantenimiento/procesos/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>