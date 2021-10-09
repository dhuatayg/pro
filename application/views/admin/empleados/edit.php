<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Empleado
        <small>Editar empleado</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="#"></i>Mantenimientos</a></li>
        <li class="active">Editar Empleado</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>mantenimiento/empleados/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Dni de Empleado -->
                        <input type="hidden" value="<?php echo $empleado->id_empleado;?>" id="id_empleado" name="id_empleado">
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('dni_empleado') == true ? 'has-error':''?>">
                                <label for="dni_empleado">Dni:</label>
                                <input type="text" class="form-control" id="dni_empleado" name="dni_empleado" value="<?php echo $empleado->dni_empleado;?>">
                                <?php echo form_error("dni_empleado","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Nombres de Empleado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_empleado') == true ? 'has-error':''?>">
                                <label for="nombre_empleado">Nombres:</label>
                                <input type="text" class="form-control" id="nombre_empleado" name="nombre_empleado" value="<?php echo $empleado->nombre_empleado;?>">
                                <?php echo form_error("nombre_empleado","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Paterno de Empleado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('paterno_empleado') == true ? 'has-error':''?>">
                                <label for="paterno_empleado">Apellido Paterno:</label>
                                <input type="text" class="form-control" id="paterno_empleado" name="paterno_empleado" value="<?php echo $empleado->paterno_empleado;?>">
                                <?php echo form_error("paterno_empleado","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Materno de Empleado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('materno_empleado') == true ? 'has-error':''?>">
                                <label for="materno_empleado">Apellido Materno:</label>
                                <input type="text" class="form-control" id="materno_empleado" name="materno_empleado" value="<?php echo $empleado->materno_empleado;?>">
                                <?php echo form_error("materno_empleado","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Teléfono de Empleado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('telefono_empleado') == true ? 'has-error':''?>">
                                <label for="telefono_empleado">Teléfono:</label>
                                <input type="text" class="form-control" id="telefono_empleado" name="telefono_empleado" value="<?php echo $empleado->telefono_empleado;?>">
                                <?php echo form_error("telefono_empleado","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Datos del Área -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('id_area') == true ? 'has-error':''?>">
                                <label for="id_area">Área:</label>
                                <select class="form-control select2" id="buscar_area" name="id_area" style="width: 100%;">
                                    <?php foreach($areas as $area):?>                        
                                        <?php if($area->id_area== $empleado->id_area):?>
                                        <option value="<?php echo $area->id_area?>" selected><?php echo $area->nombre_area;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $area->id_area?>"><?php echo $area->nombre_area;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>                             
                                <?php echo form_error("id_area","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Datos del Cargo -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('id_cargo') == true ? 'has-error':''?>">
                                <label for="id_cargo">Cargo:</label>
                                <select class="form-control select2" id="buscar_cargo" name="id_cargo" style="width: 100%;">
                                    <?php foreach($cargos as $cargo):?>                        
                                        <?php if($cargo->id_cargo== $empleado->id_cargo):?>
                                        <option value="<?php echo $cargo->id_cargo?>" selected><?php echo $cargo->nombre_cargo;?></option>
                                    <?php else:?>
                                        <option value="<?php echo $cargo->id_cargo?>"><?php echo $cargo->nombre_cargo;?></option>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("id_cargo","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>mantenimiento/empleados/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>