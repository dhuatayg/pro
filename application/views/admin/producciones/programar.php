<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Producción
        <small>Orden de Producción</small>
        </h1>
        <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Inicio</<i></li>
        <li><i class="fa fa-calendar-check-o"></i> Producción</li>
        <li class="active">Orden de Producción</li>
      </ol>
    </section>
    <!-- Cuerpo de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Formulario -->
            <form action="<?php echo base_url();?>movimiento/producciones/store" method="POST">  
                <!-- Header -->
                <div class="box-header with-border">
                    <h3 class="box-title">Items del Formulario</h3>
                </div>
                <!-- Body -->
                <div class="box-body">
                    <div class="row">  
                        <!-- Codigo de Producción -->
                        <div class="col-md-3">
                            <div class="form-group"> 
                                <label for="abre_produccion">Orden de Producción:</label>
                                <input type="hidden" name="id_produccion" value="<?php echo $produccion->id_produccion;?>">
                                <input type="text" class="form-control" id="abre_produccion" name="abre_produccion" value="<?php echo $produccion->abre_produccion;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Codigo de Pedido -->
                        <div class="col-md-3">
                            <div class="form-group"> 
                                <label for="abre_pedido">Orden de Pedido:</label>
                                <input type="hidden" name="id_pedido" value="<?php echo $produccion->id_pedido;?>">
                                <input type="text" class="form-control" id="abre_pedido" name="abre_pedido" value="<?php echo $produccion->ap;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Codigo de Producto -->
                        <div class="col-md-3">
                            <div class="form-group"> 
                                <label for="nombre_producto">Nombre de Producto:</label>
                                <input type="hidden" name="id_pedido" value="<?php echo $produccion->id_producto;?>">
                                <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $produccion->np;?>" readonly="readonly">
                            </div>
                        </div>
                        <!-- Cantidad a Producir -->
                        <div class="col-md-3">
                            <div class="form-group"> 
                                <label for="cantidad_produccion">Cantidad de Producción:</label>
                                <input type="text" class="form-control" id="cantidad_produccion" name="cantidad_produccion" value="<?php echo $produccion->cantidad_produccion;?>" readonly="readonly">
                                <input type="hidden" id="a_cantidad" value="<?php echo $produccion->cantidad_produccion;?>">
                            </div>
                        </div>
                        <!-- Inicio de Producción -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="inicio_produccion">Inicio de producción:</label>
                                <input type="date" class="form-control" id="inicio_produccion" name="inicio_produccion" min="<?php echo $pedido->inicio?>" max="<?php echo $pedido->fin?>" required value="<?php echo $pedido->inicio?>" required>
                            </div> 
                        </div>                 
                        <!-- Fin de Producción -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fin_produccion">Fin de producción:</label>
                                <input type="date" class="form-control" id="fin_produccion" name="fin_produccion" min="<?php echo $pedido->inicio?>" max="<?php echo $pedido->fin?>" required value="<?php echo $pedido->fin?>" required>
                            </div> 
                        </div>
                        <!-- Pestañas -->
                        <div class="col-md-12">
                            <!-- Pestañas de Navegación -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <!-- Pestaña Materiales -->
                                    <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">
                                    <span class="glyphicon glyphicon-tag"></span>&nbsp Materiales</a></li>
                                    <!-- Pestaña Procesos -->
                                    <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">
                                    <span class="glyphicon glyphicon-fire"></span>&nbsp Trabajo</a></li>
                                    <!-- Pestaña Maquinas -->
                                    <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">
                                    <span class="glyphicon glyphicon-random"></span>&nbsp Gastos Indirectos</a></li>
                                    <!-- Pestaña Trabajo -->
                                    <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">                        
                                    <span class="glyphicon glyphicon-repeat"></span>&nbsp Procesos</a></li> 
                                    <!-- Pestaña Gastos Indirectos -->
                                    <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">   
                                    <span class="fa fa-fire"></span>&nbsp Maquinas</a></li>                                
                                </ul>
                                <!-- Contenido de las pestañas -->
                                <div class="tab-content">
                                    <!-- Materiales -->
                                    <div class="tab-pane active" id="tab_1">
                                        <!-- Confirmar -->
                                        <div class="form-group">
                                            <div class="row">                                           
                                                <!-- Boton de Añadir -->
                                                <div class="col-md-2">
                                                    <button type="button" id="btn-confirmar" name="btn-confirmar" class="btn btn-success btn-flat">Generar Monto</button>
                                                </div>                                            
                                            </div>            
                                        </div>
                                        <!-- Tabla de Materiales -->                              
                                        <table id="tb_pr_material" class="table table-bordered table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Código</th>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Unidad Medida</th>
                                                    <th class="text-center">Necesario</th>
                                                    <th class="text-center">Stock</th>
                                                    <th class="text-center">Monto</th>
                                                    <th class="text-center">Estado</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($materiales)):?>
                                                    <?php foreach($materiales as $material):?>
                                                        <tr>
                                                            <td class="text-center"><input type="hidden" id="id_material[]"  name="id_material[]" value="<?php echo $material->id;?>"><?php echo $material->am;?></td>
                                                            <td class="text-center"><?php echo $material->nm;?></td>
                                                            <td class="text-center"><?php echo $material->um;?></td>
                                                            <!-- Cantidad Necesaria -->
                                                            <td class="text-center"><input type="hidden" id="cantidad_necesaria[]"  name="cantidad_necesaria[]" value="<?php echo $material->cm;?>"><?php echo $material->cm;?></td>   
                                                            <!-- Stock Deficiente -->
                                                            <?php if ($material->cm > $material->sm) {  ?>
                                                                <td class="text-center"><input type="hidden" id="stock_material[]"  name="stock_material[]" value="<?php echo $material->sm;?>"><b style="color:red;"><?php echo $material->sm;?></b></td>
                                                            <?php } else {  ?>
                                                                <td class="text-center"><input type="hidden" id="stock_material[]"  name="stock_material[]" value="<?php echo $material->sm;?>"><?php echo $material->sm;?></td>
                                                            <?php }  ?>
                                                            <!-- Precio -->
                                                            <td class="text-center"><?php echo $material->prma;?></td>

                                                            <!-- Resultado -->
                                                            <?php if ($material->cm > $material->sm) {  ?>
                                                                <td class="text-center"><small class="label label-danger"></i><?php echo "NO HAY MATERIAL SUFICIENTE"?></small></td>
                                                            <?php } else {  ?>
                                                                <td class="text-center"><small class="label label-success"></i><?php echo "SIN PROBLEMAS"?></small></td>
                                                            <?php }  ?>
                                                        </tr>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Procesos -->
                                    <div class="tab-pane" id="tab_4">
                                        <!-- Datos del Proceso -->
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="input-group <?php echo form_error('id_proceso') == true ? 'has-error':''?>">
                                                        <select class="form-control select2" id="buscar_proceso" name="id_proceso" style="width: 100%;">
                                                            <option value="0">Elegir Proceso</option>
                                                            <?php foreach($procesos as $proceso):?>
                                                                <option value="<?php echo $proceso->id_proceso?>"><?php echo $proceso->nombre_proceso;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                        <span class="input-group-btn">
                                                        <button type="button" id="btn-añadir-proceso" class="btn btn-success btn-flat">Agregar</button>
                                                        </span>
                                                        <?php echo form_error("id_proceso","<span class='help-block'>","</span>");?>
                                                    </div>
                                                </div>  
                                            </div>                       
                                            <!-- Inputs -->
                                            <input type="hidden" id="a_proceso" >
                                            <input type="hidden" id="b_proceso" >    
                                            <input type="hidden" id="c_proceso" >
                                            <input type="hidden" id="d_proceso" >  
                                            <input type="hidden" id="e_proceso" >           
                                        </div>
                                        <!-- Tabla de Proceso -->                              
                                        <table id="tb_proceso" class="table table-bordered table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Codigo</th>
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Descripcion</th>
                                                    <th class="text-center">Área</th>
                                                    <th class="text-center">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>                                            
                                    <!-- Maquinas -->
                                    <div class="tab-pane" id="tab_5">
                                        <table id="tab_pr_maquina" class="table table-bordered table-striped dataTable">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Código</th>   
                                                    <th class="text-center">Nombre</th>
                                                    <th class="text-center">Descripción</th>
                                                    <th class="text-center">Área</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($maquinas)):?>
                                                    <?php foreach($maquinas as $maquina):?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $maquina->cod;?></td>      
                                                            <td class="text-center"><?php echo $maquina->nom;?></td>
                                                            <td class="text-center"><?php echo $maquina->des;?></td>
                                                            <td class="text-center"><?php echo $maquina->are;?></td>
                                                        </tr>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Trabajo -->
                                    <div class="tab-pane" id="tab_2">    
                                        <div class="row">                                                    
                                            <div class="form-group">
                                                <!-- Fecha de Trabajo -->
                                                <div class="col-md-2">
                                                    <label for="fecha_laboral">Fecha:</label>     
                                                    <!-- <input type="date" class="form-control" required id="fecha_laboral" name="fecha_laboral" min="<?php echo $pedido->inicio?>" max="<?php echo $pedido->fin?>" value="<?php echo $pedido->inicio?>"> -->
                                                    <input type="date" class="form-control" required id="fecha_laboral" name="fecha_laboral" value="<?php echo $pedido->inicio?>">
                                                </div>
                                                <!-- Empleados -->
                                                <div class="col-md-2">
                                                    <label for="nempleados_trabajo">Empleados:</label> 
                                                    <input type="text" class="form-control"  id="nempleados_trabajo"  name="nempleados_trabajo" onKeyPress="return soloNumeros(event)">
                                                </div>
                                                <!-- Horas Trabajadas -->
                                                <div class="col-md-2">
                                                    <label for="horas_trabajo">Horas trabajadas:</label> 
                                                    <input type="text" class="form-control"  id="horas_trabajo"  name="horas_trabajo" onKeyPress="return soloNumeros(event)">
                                                </div>
                                                <!-- Tasa por Hora -->
                                                <div class="col-md-2">
                                                    <label for="tasa_trabajo">Tasa por hora:</label> 
                                                    <input type="text" class="form-control"  id="tasa_trabajo"  name="tasa_trabajo" onKeyPress="return soloNumeros(event)">
                                                </div>
                                                <!-- Boton de Añadir -->
                                                <div class="col-md-1">
                                                    <label for="qwer" style="color:#FFFFFF;">_</label> 
                                                    <button type="button" id="btn-trabajo" name="btn-trabajo" class="btn btn-success btn-flat">Añadir</button>
                                                </div>
                                            </div>
                                        </div>   
                                        <br>
                                        <div class="row"> 
                                            <div class="col-md-12">              
                                                <!-- Tabla de Trabajo -->
                                                <table id="tb_trabajo" class="table table-bordered table-striped dataTable" role="grid">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Fecha</th>
                                                            <th class="text-center">Empleados</th>
                                                            <th class="text-center">Horas Trabajadas</th>
                                                            <th class="text-center">Tasa por Hora</th>
                                                            <th class="text-center">Monto</th>
                                                            <th class="text-center">Eminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>    
                                        </div>                          
                                    </div> 
                                    <!-- Gastos Indirectos -->
                                    <div class="tab-pane" id="tab_3">    
                                        <div class="row">                                                    
                                            <div class="form-group">
                                                <!-- Descripción del Gasto Indirecto -->
                                                <div class="col-md-3">
                                                    <label for="descripcion_indirecto">Motivo:</label> 
                                                    <input type="text" class="form-control"  id="descripcion_indirecto"  name="descripcion_indirecto">
                                                </div>
                                                <!-- Valor del Gasto Indirecto -->
                                                <div class="col-md-3">
                                                    <label for="valor_indirecto">Valor:</label> 
                                                    <input type="number" class="form-control"  id="valor_indirecto"  name="valor_indirecto">
                                                </div>
                                                <!-- Boton de Añadir -->
                                                <div class="col-md-1">
                                                    <label for="qwer" style="color:#FFFFFF;">_</label> 
                                                    <button type="button" id="btn-indirecto" name="btn-indirecto" class="btn btn-success btn-flat">Añadir</button>
                                                </div>
                                            </div>
                                        </div>   
                                        <br>
                                        <div class="row"> 
                                            <div class="col-md-12">              
                                                <!-- Tabla de Gasto Indirecto -->
                                                <table id="tb_indirecto" class="table table-bordered table-striped dataTable" role="grid">
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">Descripción</th>
                                                            <th class="text-center">Valor</th>
                                                            <th class="text-center">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>    
                                        </div>                          
                                    </div> 
                                </div>
                            </div>                
                        </div>
                        <!-- Fin nav -->
                    </div> 
                    <!-- Resultados -->
                    <div class="form-group">
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><b>Materiales:</b></span>
                                <input type="text" class="form-control" name="total_material_m" id="total_material_m" readonly="readonly" value="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><b>Labor:</b></span>
                                <input type="text" class="form-control" name="total_labor_m" id="total_labor_m" readonly="readonly" value="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><b>Indirectos:</b></span>
                                <input type="text" class="form-control" name="total_indirecto_m" id="total_indirecto_m" readonly="readonly" value="0">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-addon"><b>Total:</b></span>
                                <input type="text" class="form-control"  name="total_produccion_m" id="total_produccion_m" readonly="readonly" value="0">
                            </div>
                        </div>                   
                    </div>     
                </div>
                <div class="box-footer">                 
                    <!-- Cajón de Opciones -->
                    <div class="btn-group"> 
                        <button type="submit" class="btn bg-green btn-flat">
                        <span class="fa fa-check"></span> &nbsp Guardar</button>
                        <a href="<?php echo base_url();?>movimiento/producciones/" class="btn btn-danger btn-flat">
                        <span class="fa fa-close"></span> &nbsp Cancelar</a>
                    </div>                       
                </div>
            </form>    
        </div>
    </section>
</div>