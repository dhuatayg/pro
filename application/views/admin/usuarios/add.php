<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h3>
        USUARIO
        <small>NUEVO USUARIO</small>
        </h3>
    </section>
    <hr>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>administracion/usuarios/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Usuario -->
                        <div class="col-md-12">
                            <div class="form-group"> 
                                <label for="abre_usuario">Código:</label>
                                <input type="text" class="form-control" id="abre_usuario" name="abre_usuario" value="<?php 
                                echo $this->Usuarios_model->GenerarIDUsuario();?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Datos del Empleado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('id_empleado') == true ? 'has-error':''?>">
                                <label for="id_empleado">Empleado:</label>
                                <select class="form-control select2" id="buscar_empleado" name="id_empleado" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    <?php foreach($empleados as $empleado):?>
                                        <option value="<?php echo $empleado->id?>"><?php echo $empleado->nombre." ".$empleado->paterno." ".$empleado->materno;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("id_empleado","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- User de Usuario -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('user_usuario') == true ? 'has-error':''?>">
                                <label for="user_usuario">Usuario:</label>
                                <input type="text" class="form-control" id="user_usuario" name="user_usuario">
                                <?php echo form_error("user_usuario","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Password de Usuario -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('password_usuario') == true ? 'has-error':''?>">
                                <label for="password_usuario">Contraseña:</label>
                                <input type="password" class="form-control" id="password_usuario" name="password_usuario">
                                <?php echo form_error("password_usuario","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Datos del Rol -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('id_rol') == true ? 'has-error':''?>">
                                <label for="id_rol">Rol:</label>
                                <select class="form-control select2" id="buscar_rol" name="id_rol" style="width: 100%;">
                                    <option value="">Seleccione</option>
                                    <?php foreach($roles as $rol):?>
                                        <option value="<?php echo $rol->id?>"><?php echo $rol->nombre;?></option>
                                    <?php endforeach;?>
                                </select>
                                <?php echo form_error("id_rol","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>administracion/usuarios/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>