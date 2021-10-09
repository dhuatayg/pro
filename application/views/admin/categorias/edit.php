<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Categoría
        <small>Editar categoría</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="#"></i>Administración</a></li>
        <li><a href="#"></i>Categoría</a></li>
        <li class="active">Editar categoria</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>rev/categorias/update" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">                                            
                        <!-- Codigo de Estado -->
                        <div class="col-md-12">
                            <input type="hidden" value="<?php echo $categoria->id_categoria;?>" id="id_categoria" name="id_categoria">
                            <div class="form-group"> 
                                <label for="abre_categoria">Código:</label>
                                <input type="text" class="form-control" id="abre_categoria" name="abre_categoria"  value="<?php echo $categoria->abre_categoria;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Nombre de Estado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('nombre_categoria') == true ? 'has-error':''?>">
                                <label for="nombre_categoria">Nombre:</label>
                                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" value="<?php echo $categoria->nombre_categoria;?>">
                                <?php echo form_error("nombre_categoria","<span class='help-block'>","</span>");?>
                            </div>
                        </div>
                        <!-- Descripción de Estado -->
                        <div class="col-md-12">
                            <div class="form-group <?php echo form_error('descripcion_categoria') == true ? 'has-error':''?>">
                                <label for="descripcion_categoria">Descripción:</label>
                                <input type="text" class="form-control" id="descripcion_categoria" name="descripcion_categoria" value="<?php echo $categoria->descripcion_categoria;?>">
                                <?php echo form_error("descripcion_categoria","<span class='help-block'>","</span>");?>
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
                        <a href="<?php echo base_url();?>rev/categorias/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>
                </div>
            </form>    
        </div>
    </section>
</div>