<div class="container-fluid">
                <div class="row">
                <nav class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>" style="font-size: 20px"><strong style="color:#41D3BD;">ANIBAL </strong><strong style="color:#ffffff;">PAREDES EDITOR S.A.C</strong></a>
                    </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-industry"></i>
                                PRODUCCIÓN </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url();?>movimiento/pedidos">Pedidos</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url();?>movimiento/producciones">Producción</a>
                                </li> 
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cubes"></i>
                                ALMACÉN </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url();?>rev/materiales">Materiales</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url();?>rev/productos">Productos</a>
                                </li> 
                            </ul>
                        </li>                 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-cog"></i>
                                MANTENIMIENTO </a>
                            <ul class="dropdown-menu">    
                                <li>
                                    <a href="<?php echo base_url();?>mantenimiento/areas">Áreas</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>rev/categorias">Categorías</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>mantenimiento/clientes">Clientes</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>mantenimiento/empleados">Empleados</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url(); ?>mantenimiento/estados">Estados</a>
                                </li> 
                                <li>
                                    <a href="<?php echo base_url();?>mantenimiento/procesos">Fase</a>
                                </li>    
                                <li>
                                    <a href="<?php echo base_url(); ?>mantenimiento/maquinas">Maquinas</a>
                                </li>                    
                                <li>
                                    <a href="<?php echo base_url();?>administracion/roles">Roles</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>administracion/usuarios">Usuarios</a>
                                </li>
                            </ul>
                        </li> 
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-area-chart"></i>
                                ESTADÍSTICA </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url();?>movimiento/producciones/productividad">Nivel de productividad</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url();?>movimiento/producciones/reproceso">Porcentaje Reprocesado</a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user"></i>
                                HOLA, <span><?php echo $this->session->userdata("nombre").' '.$this->session->userdata("paterno").' '.$this->session->userdata("materno")?></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>auth/logout">
                                        <i class="fa fa-sign-out"></i>Desconectarse</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">