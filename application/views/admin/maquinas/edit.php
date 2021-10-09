<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        MAQUINA
        <small>EDIATR MAQUINA</small>
        </h3>
    </section>
    <hr>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/maquinas/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Usuario -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $maquina->id_maquina;?>" id="id_maquina" name="id_maquina">
                            <div class="form-group"> 
                                <label for="abre_maquina">Código:</label>
                                <input type="text" class="form-control" id="abre_maquina" name="abre_maquina" value="<?php echo $maquina->abre_maquina;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Máquina -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_maquina') == true ? 'has-error':''?>">
                                <label for="nombre_maquina">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_maquina" name="nombre_maquina" value="<?php echo $maquina->nombre_maquina;?>">
                                <?php echo form_error("nombre_maquina","<span class='help-block'>","</span>");?>
                            </div>
                        </div> 
                        <!-- Descripción de Máquina -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_maquina') == true ? 'has-error':''?>">
                                <label for="descripcion_maquina">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_maquina" name="descripcion_maquina" value="<?php echo $maquina->descripcion_maquina;?>">
                                <?php echo form_error("descripcion_maquina","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Cantidad de Máquina -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('cantidad_maquina') == true ? 'has-error':''?>">
                                <label for="cantidad_maquina">Cantidad:</label>
                                <input type="text" class="form-control" id="cantidad_maquina" name="cantidad_maquina" value="<?php echo $maquina->cantidad_maquina;?>">
                                <?php echo form_error("cantidad_maquina","<span class='help-block'>","</span>");?>
                            </div>
                        </div> 
                        <!-- Datos del Rol -->
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <label for="id_area">Área:</label>
                                <select class="form-control select2" id="buscar_area" name="id_area" style="width: 100%;">
                                    <?php foreach($areas as $area):?>                        
                                        <?php if($area->id_area == $maquina->id_area):?>
                                        <option value="<?php echo $area->id_area?>" selected><?php echo $area->nombre_area;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $area->id_area?>"><?php echo $area->nombre_area;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
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
                        <a href="<?php echo base_url();?>mantenimiento/maquinas/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>