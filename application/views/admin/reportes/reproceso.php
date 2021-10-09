<!-- Contenido de la Vista -->
<div class="content-wrapper">
    <!-- Cabecera -->
    <section class="content-header">
        <h1>
        Reporte
        <small>Reproceso</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i>Inicio</a></li>
        <li><i class="fa fa-print"></i>Reporte</li>
        <li><i class="active"></i>Reproceso</li>
      </ol>
    </section>
    <!-- Contenido de la caja -->
    <section class="content">
        <div class="box box-success">
            <!-- Header -->
            <div class="box-header with-border">
                <div class="row">
                    <div class="form-group">
                        <!-- Inicio de Busqueda -->
                        <div class="col-md-2">
                            <label for="inicio_busqueda">Inicio de búsqueda:</label>
                            <input type="date" class="form-control" id="inicio_busqueda" name="inicio_busqueda" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <!-- Fin de Busqueda -->
                        <div class="col-md-2">
                            <label for="fin_busqueda">Fin de busqueda:</label>
                            <input type="date" class="form-control" id="fin_busqueda" name="fin_busqueda" value="<?php echo date("Y-m-d");?>">
                        </div>
                        <!-- Buscar -->
                        <div class="col-md-1">
                            <label for="busqueda_reproceso" style="color:#FFFFFF;">_</label> 
                            <button type="button" id="busqueda_reproceso" class="btn btn-default btn-flat">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <!-- Div Gráfico -->
                    <div class="col-md-12">              
                        <div id="dreproceso" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                    </div>
                    <!-- Div Indicador -->
                    <div class="row" id="div_resultado_reproceso">
                        <div align="center" class="col-md-12">
                            <div class="form-group">
                                <h4>En el grafico durante la fecha <strong id="f_ini"></strong> al  <strong id="f_fin"></strong> el Nivel de Productividad obtenido es <strong id="r_pro"></strong> %</h4>
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </section>
</div>
