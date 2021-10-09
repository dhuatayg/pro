</div>
        <footer class="footer">
            <div class="container">
                <br>
                <p class="text-muted text-center">Desarrollado por Angel Pool Contreras Paima | <b>Anibal Paredes Editor S.A.C v.1.0</b></p>
            </div>
        </footer>
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/export-data.js"></script>
<script src="<?php echo base_url();?>assets/template/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/template/select2/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.10.10/dist/sweetalert2.all.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.js"></script>

<script>
$(document).ready(function () {

    // URL para consultas Ajax
     var base_url= "<?php echo base_url();?>";   

    // Select 2
    $.fn.select2.defaults.set('language', 'es');
    $("#buscar_material").select2();
    $("#buscar_rol").select2();
    $("#buscar_empleado").select2();
    $("#buscar_area").select2();
    $("#buscar_cargo").select2();
    $("#buscar_maquina").select2();
    $("#buscar_proceso").select2();
    $("#buscar_proceso_2").select2();
    $("#buscar_categoria").select2();
    $("#buscar_estado").select2();
    $("#unidad_material").select2();
    $("#buscar_producto").select2();
    $("#buscar_producto_2").select2();

    // Ocultar DIVs
    $("#ur").hide();
    $("#div_resultado_productividad").hide();
    $("#div_resultado_reproceso").hide();

    // Activar reproceso
    $("#buscar_proceso_2").change(function () {
        var div_ur = document.getElementById("ur");   
        $.ajax({
            url: base_url + 'movimiento/producciones/obtenerProcesoProduccion',
            data: {
                id_proceso_produccion: $(this).val()     
            },
            type: "POST",
            dataType: "json",      
            success: function (data){
                $('#a_proceso').val(data[0]['id_proceso']);
                if(data[0]['id_proceso'] == 2){
                    div_ur.style.display = "block";
                }else{
                    div_ur.style.display = "none"; 
                }
                $('#id_proceso').val(data[0]['id_proceso']);
            }
         });
    });

    // Buscar Cliente
    $('#buscar_cliente').autocomplete({
        source: function(request,response){
            $.ajax({
                url: base_url + 'movimiento/pedidos/autocompletarCliente',
                type: "POST",
                dataType: "json", 
                data: { valor:request.term },
                success: function(data){
                    response(data);
                }
            });
        },
        minLength: 1,
        select: function(event,ui){
            $('#id_cliente').val(ui.item.id);
            $('#ndocumento_cliente').val(ui.item.doc);
            $('#telefono_cliente').val(ui.item.tel);
            $('#correo_cliente').val(ui.item.cor);
            $('#id_cliente').attr("readonly","readonly");
            $('#ndocumento_cliente').attr("readonly","readonly");
            $('#telefono_cliente').attr("readonly","readonly"); 
            $('#correo_cliente').attr("readonly","readonly"); 
        }
    });

    // Limpiar Busqueda de Clientes
    $('#buscar_cliente').keydown(function (e) {
        if (e.keyCode == 8) {
            $('#id_cliente').val('');
            $('#ndocumento_cliente').val('');
            $('#telefono_cliente').val('');
            $('#correo_cliente').val('');
            $('#id_cliente').removeAttr("readonly");
            $('#ndocumento_cliente').removeAttr("readonly");
            $('#telefono_cliente').removeAttr("readonly");
            $('#correo_cliente').removeAttr("readonly");
        }
    });

    // Buscar Producto
    $("#buscar_producto").change(function () {
        if($("#buscar_producto").val() == 0){
        }else{
            $.ajax({
                url: base_url + 'rev/productos/obtenerProducto',
                data: {
                    id_producto: $(this).val()     
                },
                type: "POST",
                dataType: "json",      
                success: function (data){
                    $('#a_producto').val(data[0]['id_producto']);
                    $('#b_producto').val(data[0]['abre_producto']);
                    $('#c_producto').val(data[0]['nombre_producto']);
                    $('#d_producto').val(data[0]['stock_producto']);
                    $('#e_producto').val(data[0]['precio_producto']);
                }
            });  
        }       
    }); 

    //Buscar Agregar Producto
    $("#buscar_producto_2").change(function () {
        if($("#buscar_producto_2").val() == 0){
        }else{
            $.ajax({
                url: base_url + 'rev/productos/obtenerMateriales',
                data: {
                    id: $(this).val()     
                },
                type: "POST",
                dataType: "json",      
                success: function (data){
                    $("#tb_pr_material tr").remove(); 
                    html = "<tr>";
                    html += "<td class='text-center'><b>Código</b></td>"; 
                    html += "<td class='text-center'><b>Nombre</b></td>";
                    html += "<td class='text-center'><b>Unidad Medida</b></td>";
                    html += "<td class='text-center'><b>Stock</b></td>";
                    html += "<td class='text-center'><b>Necesario</b></td>";
                    html += "<td class='text-center'><b>Estado</b></td>";
                    html += "</tr>";
                    $("#tb_pr_material thead").append(html); 
                    data.forEach(abc => {
                        data.forEach(def => {                     
                            html = "<tr>";
                            html += "<td class='text-center'>"+def.cod+"</td>"; 
                            html += "<td class='text-center'>"+def.nom+"</td>";
                            html += "<td class='text-center'>"+def.uni+"</td>";
                            html += "<td class='text-center'>"+def.sto+"</td>";
                            html += "<td class='text-center'>"+def.nec+"</td>";
                            if(def.nec>=def.sto){
                                html += "<td class='text-center'><small class='label label-danger'></i>NO HAY MATERIAL SUFICIENTE</small></td>";  
                            }else{
                                html += "<td class='text-center'><small class='label label-success'></i>SIN PROBLEMAS</small></td>";    
                            }
                            html += "</tr>";  
                        });
                        $("#tb_pr_material tbody").append(html); 
                    });
                    console.log(data);
                }
            });  
        }       
    }); 

    // Buscar Material
    $("#buscar_material").change(function () {
        if($("#buscar_material").val() == 0){
        }else{
            $.ajax({
                url: base_url + 'rev/materiales/obtenerMaterial',
                data: {
                    id_material: $(this).val()     
                },
                type: "POST",
                dataType: "json",      
                success: function (data){
                    console.log(data);
                    $('#a_material').val(data[0]['id_material']);
                    $('#b_material').val(data[0]['abre_material']);
                    $('#c_material').val(data[0]['nombre_material']);
                    $('#d_material').val(data[0]['descripcion_material']);
                    $('#e_material').val(data[0]['unidad_material']);
                    $('#f_material').val(data[0]['precio_material']);
                }
            });  
        }       
    });

    // Buscar Máquina
    $("#buscar_maquina").change(function () {
        if($("#buscar_maquina").val() == 0){
        }else{
            $.ajax({
                url: base_url + 'mantenimiento/maquinas/obtenerMaquina',
                data: {
                    id_maquina: $(this).val()     
                },
                type: "POST",
                dataType: "json",      
                success: function (data){
                    console.log(data);
                    $('#a_maquina').val(data[0]['id_maquina']);
                    $('#b_maquina').val(data[0]['abre_maquina']);
                    $('#c_maquina').val(data[0]['nombre_maquina']);
                    $('#d_maquina').val(data[0]['descripcion_maquina']);
                    $('#e_maquina').val(data[0]['area']);
                }
            });  
        }       
    });

    // Buscar Proceso
    $("#buscar_proceso").change(function () {
        if($("#buscar_proceso").val() == 0){
        }else{
            $.ajax({
                url: base_url + 'mantenimiento/procesos/obtenerProceso',
                data: {
                    id_proceso: $(this).val()     
                },
                type: "POST",
                dataType: "json",      
                success: function (data){
                    console.log(data);
                    $('#a_proceso').val(data[0]['id_proceso']);
                    $('#b_proceso').val(data[0]['abre_proceso']);
                    $('#c_proceso').val(data[0]['nombre_proceso']);
                    $('#d_proceso').val(data[0]['descripcion_proceso']);
                    $('#e_proceso').val(data[0]['area']);
                }
            });  
        }       
    });

    // Buscar id en Tabla Materiales
    function checkIdMaterial(id) {
        let ids = document.querySelectorAll('#tb_material td[for="id"]');
        return [].filter.call(ids, td => td.textContent === id).length === 1;
    }

    // Buscar id en Tabla Máquinas
    function checkIdMaquina(id) {
        let ids = document.querySelectorAll('#tb_maquina td[for="id"]');
        return [].filter.call(ids, td => td.textContent === id).length === 1;
    }

    // Buscar id en Tabla Procesos
    function checkIdProceso(id) {
        let ids = document.querySelectorAll('#tb_proceso td[for="id"]');
        return [].filter.call(ids, td => td.textContent === id).length === 1;
    }

    // Buscar id en Tabla Productos
    function checkIdProducto(id) {
        let ids = document.querySelectorAll('#tb_producto td[for="id"]');
        return [].filter.call(ids, td => td.textContent === id).length === 1;
    }

    // Añadir Producto
    $("#btn-añadir-producto").on("click",function(){
        // Campos
        var id_producto =  $('#a_producto').val();
        var abre_producto = $('#b_producto').val();
        var nombre_producto = $('#c_producto').val();
        var stock_producto = $('#d_producto').val();
        var precio_producto = $('#e_producto').val();
        // Condicionales
        if (id_producto == 0){
            alert("Este producto no es seleccionable");
        }else{
            if (checkIdProducto(id_producto)) {
            alert("Este producto ya se encuentra seleccionado");
            }else{
                // Generar el contenido de los Materiales
                html = "<tr>";
                html += "<td class='text-center' for='id' style='display:none;'>"+id_producto+"</td>";
                html += "<td class='text-center'><input type='hidden' name='id_producto[]' value='"+id_producto+"'>"+abre_producto+"</td>";
                html += "<td class='text-center'>"+nombre_producto+"</td>";
                html += "<td class='text-center'>"+stock_producto+"</td>";
                html += "<td class='text-center'><input type='text'  name='cantidad_detallepedido[]' value='0'  onkeypress='return soloNumeros(event);' class='cantidades'></td>";
                html += "<td class='text-center'><input type='hidden' name='precio_detallepedido[]' value='"+precio_producto+"'>"+precio_producto+"</td>";
                html += "<td class='text-center'><input type='hidden' name='restante_detallepedido[]'><p>"+0+"</p></td>";   
                html += "<td class='text-center'><input type='hidden' name='importe_detallepedido[]'><p>0.00</p></td>";        
                html += "<td class='text-center'><button type='button' class='btn btn-xs btn-danger btn-remove-producto'><span class='glyphicon glyphicon-trash'></span></button></td>";
                html += "</tr>";
                $("#tb_producto tbody").append(html);
                $("#a_producto").val(null);
                $("#b_producto").val(null);
                $("#c_producto").val(null);
                $("#d_producto").val(null);
                $("#e_producto").val(null);
                $("#buscar_producto").select2("destroy");
                $("#buscar_producto").val(0);
                $("#buscar_producto").select2();
            }
        }
    });

    // Calculo del Importe
    $(document).on("keyup","#tb_producto input.cantidades", function(){
        var cantidad = $(this).val();
        var stock = $(this).closest("tr").find("td:eq(3)").text();
        var precio = $(this).closest("tr").find("td:eq(5)").text();
        var importe = cantidad * precio;
        $(this).closest("tr").find("td:eq(7)").children("p").text(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(7)").children("input").val(importe.toFixed(2));
        $(this).closest("tr").find("td:eq(6)").children("p").text(pendiente(stock,cantidad));
        $(this).closest("tr").find("td:eq(6)").children("input").val(pendiente(stock,cantidad));
        monto_total();
    });

    // Calculo Producción pendiente
    function pendiente(stock,cantidad){
        var pendiente = cantidad - stock;
        if (pendiente < 0){
            return 0;
        }else {
            return pendiente;
        }
    }

    // Calculo del Monto Total
    function monto_total(){
        var monto = 0;
        $("#tb_producto tbody tr").each(function(){
            monto = monto + Number($(this).find("td:eq(7)").text());
        });
        $("input[name=monto_pedido]").val(monto.toFixed(2));
    }

    // Eliminar Detalle Producto
    $(document).on("click",".btn-remove-producto", function(){
        $(this).closest("tr").remove();
        monto_total();
    });

    

    function cantidad_produccion(){ 
        var cantidad = $('#produccion_estimada').val(); //4
        var total = $('#a_cantidad').val(); //10
        var planificado = 0;
        var nuevo_valor = total - cantidad;
        $("#tb_trabajo tbody tr").each(function(){
            planificado = planificado + Number($(this).find("td:eq(1)").text());
        });
        $("#a_cantidad").val(nuevo_valor);  
    }

    // Buscar fecha en Tabla Trabajo
    function checkFechaTrabajo(id) {
        let ids = document.querySelectorAll('#tb_trabajo td[for="id"]');
        return [].filter.call(ids, td => td.textContent === id).length === 1;
    }

    // Añadir Trabajo
    $("#btn-trabajo").on("click",function(){
        // Campos
        var fecha_laboral =  $('#fecha_laboral').val();
        var nempleados_trabajo = $('#nempleados_trabajo').val();
        var horas_trabajo = $('#horas_trabajo').val();
        var tasa_trabajo = $('#tasa_trabajo').val();
        var trabajo = nempleados_trabajo * horas_trabajo * tasa_trabajo;
        //Metodos
        if(nempleados_trabajo != ""){
            if(horas_trabajo != ""){
                if(tasa_trabajo != ""){
                    if (checkFechaTrabajo(fecha_laboral)) {
                        alert("Esta fecha ya fue seleccionada");
                    }else {
                        html = "<tr>";
                        html += "<td class='text-center' for='id'><input type='hidden' name='fecha_trabajo[]' value='"+fecha_laboral+"'>"+fecha_laboral+"</td>";
                        html += "<td class='text-center'><input type='hidden' name='nempleados_trabajo[]' value='"+nempleados_trabajo+"'>"+nempleados_trabajo+"</td>";
                        html += "<td class='text-center'><input type='hidden' name='nhoras_trabajo[]' value='"+horas_trabajo+"'>"+horas_trabajo+"</td>";
                        html += "<td class='text-center'><input type='hidden' name='vtasa_trabajo[]' value='"+tasa_trabajo+"'>"+tasa_trabajo+"</td>";
                        html += "<td class='text-center'><input type='hidden' name='monto_trabajo[]' value='"+trabajo+"'>"+trabajo+"</td>";
                        html += "<td class='text-center'><button type='button' class='btn btn-xs btn-danger btn-remove-trabajo'><span class='glyphicon glyphicon-trash'></span></button></td>";
                        html += "</tr>";    
                        $("#tb_trabajo tbody").append(html);
                        monto_trabajo();
                        total_programar();
                        $("#produccion_estimada").val(null);
                        $("#nempleados_trabajo").val(null);
                        $("#horas_trabajo").val(null);
                        $("#tasa_trabajo").val(null);                 
                    }
                }else{
                    alert("Tiene que llenar el campo Tasa");    
                }
            }else{
                alert("Tiene que llenar el campo Horas trabajadas");    
            }
        }else{
            alert("Tiene que llenar el campo Empleados");    
        }
    });  

    // Calculo del Trabajo
    function monto_trabajo(){
        var monto = 0;
        $("#tb_trabajo tbody tr").each(function(){
            monto = monto + Number($(this).find("td:eq(4)").text());
        });
        $("input[name=total_labor_m]").val(monto.toFixed(2));
    }

    // Confirmar Materiales
    $("#btn-confirmar").on("click",function(){
        monto_confirmar();  
        total_programar();                    
    });  

    // Calculo del Confirmar
    function monto_confirmar(){
        var monto = 0;
        $("#tb_pr_material tbody tr").each(function(){
            monto = monto + Number($(this).find("td:eq(5)").text());
        });
        $("input[name=total_material_m]").val(monto.toFixed(2));
    }

    // Eliminar Detalle Trabajo
    $(document).on("click",".btn-remove-trabajo", function(){
        $(this).closest("tr").remove();
        monto_trabajo();
    });

    // Añadir Gastos Indirectos
    $("#btn-indirecto").on("click",function(){
        // Campos
        var descripcion_indirecto =  $('#descripcion_indirecto').val();
        var valor_indirecto = $('#valor_indirecto').val();
        if (descripcion_indirecto != ""){
            if (valor_indirecto != ""){
                html = "<tr>";
                        html += "<td class='text-center' for='id'><input type='hidden' name='descripcion_gasto[]' value='"+descripcion_indirecto+"'>"+descripcion_indirecto+"</td>";
                        html += "<td class='text-center'><input type='hidden' name='valor_gasto[]' value='"+valor_indirecto+"'>"+valor_indirecto+"</td>";
                        html += "<td class='text-center'><button type='button' class='btn btn-xs btn-danger btn-remove-indirecto'><span class='glyphicon glyphicon-trash'></span></button></td>";
                        html += "</tr>";    
                        $("#tb_indirecto tbody").append(html);
                        monto_indirecto();
                        total_programar();
                        $("#valor_indirecto").val(null);
                        $("#descripcion_indirecto").val(null);
            }else {
                alert("Tiene que llenar el campo valor");
            }
        }else{
            alert("Tiene que llenar el campo descripción");
        }
    });

    // Calculo del Gasto Indirecto
    function monto_indirecto(){
        var monto = 0;
        $("#tb_indirecto tbody tr").each(function(){
            monto = monto + Number($(this).find("td:eq(1)").text());
        });
        // alert(monto);
        $("input[name=total_indirecto_m]").val(monto.toFixed(2));
    }

    function total_programar(){
        var total_material_m = $('#total_material_m').val();
        var total_labor_m = $('#total_labor_m').val();
        var total_indirecto_m = $('#total_indirecto_m').val();
        var total = parseFloat(total_material_m) + parseFloat(total_labor_m) + parseFloat(total_indirecto_m);
        $("#total_produccion_m").val(total.toFixed(2));
    }

    // Eliminar Detalle Indirecto
    $(document).on("click",".btn-remove-indirecto", function(){
        $(this).closest("tr").remove();
        monto_indirecto();
    });

    // Añadir Material
    $("#btn-añadir-material").on("click",function(){
        // Campos
        var id_material =  $('#a_material').val();
        var abre_material = $('#b_material').val();
        var nombre_material = $('#c_material').val();
        var descripcion_material = $('#d_material').val();
        var unidad_material = $('#e_material').val();
        var precio_material = $('#f_material').val();
        // Condicionales
        if (id_material == 0){
            alert("Este no es material seleccionable");
        }else{
            if (checkIdMaterial(id_material)) {
            alert("Este material ya se encuentra seleccionado");
            }else{
                // Generar el contenido de los Materiales
                html = "<tr>";
                html += "<td class='text-center' for='id' style='display:none;'>"+id_material+"</td>";
                html += "<td class='text-center'><input type='hidden' name='id_material[]' value='"+id_material+"'>"+abre_material+"</td>";
                html += "<td class='text-center'>"+nombre_material+"</td>";
                html += "<td class='text-center'>"+descripcion_material+"</td>";
                html += "<td class='text-center'><input type='hidden' name='precio_maproducto[]' value='"+precio_material+"'>"+unidad_material+"</td>";
                html += "<td class='text-center'><input type='text' name='cantidad_maproducto[]' value='1'></td>";
                html += "<td class='text-center'><button type='button' class='btn btn-xs btn-danger btn-remove-producto'><span class='glyphicon glyphicon-trash'></span></button></td>";
                html += "</tr>";
                $("#tb_material tbody").append(html);
                $("#a_material").val(null);
                $("#b_material").val(null);
                $("#c_material").val(null);
                $("#d_material").val(null);
                $("#e_material").val(null);
                $("#buscar_material").select2("destroy");
                $("#buscar_material").val(0);
                $("#buscar_material").select2();
            }
        }
    });

    // Añadir Maquina
    $("#btn-añadir-maquina").on("click",function(){
        // Campos
        var id_maquina =  $('#a_maquina').val();
        var abre_maquina = $('#b_maquina').val();
        var nombre_maquina = $('#c_maquina').val();
        var descripcion_maquina = $('#d_maquina').val();
        var area_maquina = $('#e_maquina').val();
        // Condicionales
        if (id_maquina == 0){
            alert("Este no es una máquina seleccionable");
        }else{
            if (checkIdMaquina(id_maquina)) {
            alert("Esta máquina ya se encuentra seleccionado");
            }else{
                // Generar el contenido de las Máquinas
                html = "<tr>";
                html += "<td class='text-center' for='id' style='display:none;'>"+id_maquina+"</td>";
                html += "<td class='text-center'><input type='hidden' name='id_maquina[]' value='"+id_maquina+"'>"+abre_maquina+"</td>";
                html += "<td class='text-center'>"+nombre_maquina+"</td>";
                html += "<td class='text-center'>"+descripcion_maquina+"</td>";
                html += "<td class='text-center'>"+area_maquina+"</td>";
                html += "<td class='text-center'><button type='button' class='btn btn-xs btn-danger btn-remove-producto'><span class='glyphicon glyphicon-trash'></span></button></td>";
                html += "</tr>";
                $("#tb_maquina tbody").append(html);
                $("#a_maquina").val(null);
                $("#b_maquina").val(null);
                $("#c_maquina").val(null);
                $("#d_maquina").val(null);
                $("#e_maquina").val(null);
                $("#buscar_maquina").select2("destroy");
                $("#buscar_maquina").val(0);
                $("#buscar_maquina").select2();
            }
        }
    });

    // Añadir Proceso
    $("#btn-añadir-proceso").on("click",function(){
        // Campos
        var id_proceso =  $('#a_proceso').val();
        var abre_proceso = $('#b_proceso').val();
        var nombre_proceso = $('#c_proceso').val();
        var descripcion_proceso = $('#d_proceso').val();
        var area_proceso = $('#e_proceso').val();
        // Condicionales
        if (id_proceso == 0){
            alert("Este no es un proceso seleccionable");
        }else{
            if (checkIdProceso(id_proceso)) {
            alert("Este proceso ya se encuentra seleccionado");
            }else{
                // Generar el contenido de los Procesos
                html = "<tr>";
                html += "<td class='text-center' for='id' style='display:none;'>"+id_proceso+"</td>";
                html += "<td class='text-center'><input type='hidden' name='id_proceso[]' value='"+id_proceso+"'>"+abre_proceso+"</td>";
                html += "<td class='text-center'>"+nombre_proceso+"</td>";
                html += "<td class='text-center'>"+descripcion_proceso+"</td>";
                html += "<td class='text-center'>"+area_proceso+"</td>";
                html += "<td class='text-center'><button type='button' class='btn btn-xs btn-danger btn-remove-producto'><span class='glyphicon glyphicon-trash'></span></button></td>";
                html += "</tr>";
                $("#tb_proceso tbody").append(html);
                $("#a_proceso").val(null);
                $("#b_proceso").val(null);
                $("#c_proceso").val(null);
                $("#d_proceso").val(null);
                $("#e_proceso").val(null);
                $("#buscar_proceso").select2("destroy");
                $("#buscar_proceso").val(0);
                $("#buscar_proceso").select2();
            }
        }
    });



    // Sweet Alert 2
    const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 2500,
        onOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    });

    //Metodos del Sweet Alert 2
    <?php if($this->session->flashdata("Guardar")):?>

        Toast.fire({
        icon: 'success',
        title: '<b>SE GUARDÓ EL REGISTRO CORRECTAMENTE.</b>'
        })

    <?php elseif($this->session->flashdata("Editar")):?>

        Toast.fire({
        icon: 'success',
        title: '<b>SE MODIFÍCO EL REGISTRO CORRECTAMENTE.</b>'
        })

    <?php elseif($this->session->flashdata("Eliminar")):?>

        Toast.fire({
        icon: 'success',
        title: '<b>SE ELIMINO EL REGISTRO CORRECTAMENTE.</b>'
        })

    <?php elseif($this->session->flashdata("Cancelar")):?>

        Toast.fire({
        icon: 'warning',
        title: '<b>NO SE REALIZARON CAMBIOS.</b>'
        })

    <?php elseif($this->session->flashdata("Produccion")):?>

        Toast.fire({
        icon: 'success',
        title: '<b>SE REGISTRO EL PEDIDO Y SE CREO UNA NUEVA ORDEN DE PRODUCCIÓN.</b>'
        })
    
    <?php elseif($this->session->flashdata("Excedido")):?>

        Toast.fire({
        icon: 'warning',
        title: '<b>LA CANTIDAD INGRESADA ES MAYOR A LA PROGRAMADA.</b>'
        })
    
    <?php elseif($this->session->flashdata("Llenar")):?>

        Toast.fire({
        icon: 'warning',
        title: '<b>ERROR! NO SE COMPLETARON TODOS LOS CAMPOS.</b>'
        })
    
    <?php elseif($this->session->flashdata("Producto")):?>

        Toast.fire({
        icon: 'warning',
        title: '<b>ERROR! NO SE ELIGIO NINGUN PRODUCTO.</b>'
        })

    <?php elseif($this->session->flashdata("Stock")):?>

        Toast.fire({
        icon: 'warning',
        title: '<b>ERROR! NO HAY STOCK SUFICIENTE - VERIFICAR LOS MATERIALES.</b>'
        })

    <?php elseif($this->session->flashdata("Bienvenido")):?>

        Toast.fire({
        icon: 'info',
        title: '<b>BIENVENIDO!</b>'
        })
        
    <?php endif; ?>


    // Botón Eliminar de Tabla
    $(".btn-remove").on("click", function(e){
        e.preventDefault();
        var ruta = $(this).attr("href");
        $.ajax({
            url: ruta,
            type:"POST",
            success:function(resp){    
                 window.location.href = base_url + resp;     
            }
        });
    });

    // Vista Imprimir Rol
    $(".btn-view-rol").on("click", function(){
        var estado = $(this).val(); 
        var valor = estado.split("*");
        html =  "<p><strong>Código:&nbsp</strong>"+valor[1]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+valor[2]+"</p>";
        html += "<p><strong>Descripción:&nbsp</strong>"+valor[3]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Usuario
    $(".btn-view-usuario").on("click", function(){
        var estado = $(this).val(); 
        var valor = estado.split("*");
        html =  "<p><strong>Código:&nbsp</strong>"+valor[1]+"</p>"
        html += "<p><strong>DNI:&nbsp</strong>"+valor[2]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+valor[3]+" "+valor[4]+" "+valor[5]+"</p>"
        html += "<p><strong>Usuario:&nbsp</strong>"+valor[6]+"</p>"
        html += "<p><strong>Rol:&nbsp</strong>"+valor[7]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Área
    $(".btn-view-area").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>Código:&nbsp</strong>"+i[1]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+i[2]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Cargo
    $(".btn-view-cargo").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>Código:&nbsp</strong>"+i[1]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+i[2]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Estado
    $(".btn-view-estado").on("click", function(){
        var estado = $(this).val(); 
        var valor = estado.split("*");
        html =  "<p><strong>Código:&nbsp</strong>"+valor[1]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+valor[2]+"</p>";
        html += "<p><strong>Descripción:&nbsp</strong>"+valor[3]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Cliente
    $(".btn-view-cliente").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>N. documento:&nbsp</strong>"+i[1]+"</p>";
        html += "<p><strong>Nombres:&nbsp</strong>"+i[2]+"</p>";
        html += "<p><strong>Telefono:&nbsp</strong>"+i[3]+"</p>";
        html += "<p><strong>Correo:&nbsp</strong>"+i[4]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Empleado
    $(".btn-view-empleado").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>DNI:&nbsp</strong>"+i[0]+"</p>"
        html += "<p><strong>Nombres:&nbsp</strong>"+i[1]+"</p>"
        html += "<p><strong>Apellido Paterno:&nbsp</strong>"+i[2]+"</p>"
        html += "<p><strong>Apellido Materno:&nbsp</strong>"+i[3]+"</p>"
        html += "<p><strong>Teléfono:&nbsp</strong>"+i[4]+"</p>"
        html += "<p><strong>Cargo:&nbsp</strong>"+i[5]+"</p>"
        html += "<p><strong>Área:&nbsp</strong>"+i[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Máquina
    $(".btn-view-maquina").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>Código:&nbsp</strong>"+i[1]+"</p>";
        html += "<p><strong>Nombre:&nbsp</strong>"+i[2]+"</p>";
        html += "<p><strong>Descripción:&nbsp</strong>"+i[3]+"</p>";
        html += "<p><strong>Cantidad:&nbsp</strong>"+i[4]+"</p>";
        html += "<p><strong>Area:&nbsp</strong>"+i[5]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Proceso
    $(".btn-view-proceso").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>Código:&nbsp</strong>"+i[1]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+i[2]+"</p>";
        html += "<p><strong>Descripción:&nbsp</strong>"+i[3]+"</p>";
        html += "<p><strong>Área:&nbsp</strong>"+i[4]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Imprimir Categoría
    $(".btn-view-categoria").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>Código:&nbsp</strong>"+i[1]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+i[2]+"</p>";
        html += "<p><strong>Descripción:&nbsp</strong>"+i[3]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Vista Modificar Stock Materiales
    $(".btn-edit-material").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        $('#id_material').val(i[0]);
        $('#stock_material').val(i[5]);
    });

    // Vista Imprimir Material
    $(".btn-view-material").on("click", function(){
        var x = $(this).val(); 
        var i = x.split("*");
        html = "<p><strong>Codigo:&nbsp</strong>"+i[1]+"</p>"
        html += "<p><strong>Nombre:&nbsp</strong>"+i[2]+"</p>"
        html += "<p><strong>Descripcion:&nbsp</strong>"+i[3]+"</p>"
        html += "<p><strong>Unidad:&nbsp</strong>"+i[4]+"</p>"
        html += "<p><strong>Stock:&nbsp</strong>"+i[5]+"</p>"
        html += "<p><strong>Precio:&nbsp</strong>"+i[6]+"</p>";
        $("#modal-default .modal-body").html(html);
    });

    // Datatable Estados
    $('#tabla-estado').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Estados",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Estados",
                exportOptions: {
                    columns: [ 0,1,2]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar estado",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Rol
    $('#tabla-rol').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Roles",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Roles",
                exportOptions: {
                    columns: [ 0,1,2]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar rol",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    
    // Datatable Usuario
    $('#tabla-usuario').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Usuarios",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Usuarios",
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar usuario",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Área
    $('#tabla-area').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Áreas",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Áreas",
                exportOptions: {
                    columns: [ 0,1]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar area",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Cargo
    $('#tabla-cargo').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Cargos",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Cargos",
                exportOptions: {
                    columns: [ 0,1]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar cargo",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Cliente
    $('#tabla-cliente').DataTable( {
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Clientes",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Clientes",
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar cliente",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Empleado
    $('#tabla-empleado').DataTable( {
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Empleados",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Empleados",
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar empleado",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Máquina
    $('#tabla-maquina').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Máquinas",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Máquinas",
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar máquinas",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Proceso
    $('#tabla-proceso').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Procesos",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Procesos",
                exportOptions: {
                    columns: [ 0,1,2,3]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar proceso",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Categoría
    $('#tabla-categoria').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Categorías",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Categorías",
                exportOptions: {
                    columns: [ 0,1,2]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar categoría",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Material
    $('#tabla-material').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Materiales",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Materiales",
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
                
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar material",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    
    // Datatable Producto
    $('#tabla-producto').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Productos",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Productos",
                exportOptions: {
                    columns: [ 0,1,2,3,4]
                }           
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar producto",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });
    
    // Datatable Pedido
    $('#tabla-pedido').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Listado de Pedidos",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Listado de Pedidos",
                exportOptions: {
                    columns: [ 0,1,2,3,4,5,6]
                }           
            }
        ],
        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar producto",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Datatable Producción
    $('#tabla-produccion').DataTable( {
        "order": [[ 0, "desc" ]],
        dom: "<'row'<'col-sm-6'B><'col-sm-6'f>>" +
        "<'row'<'col-sm-12'tr>>" +
        "<'row'<'col-sm-4'i><'col-sm-8'p>>",
        responsive: true,
        buttons: [
            {
                extend: 'excelHtml5',
                title: "Ordenes de Producción",
                customize: function (xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r*="1"]', sheet).attr('s', '47');
                        $('row c[r*="2"]', sheet).attr('s', '42');
                },
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
            },
            {
                extend: 'pdfHtml5',
                orientation: 'portrait',
                pageSize: 'A4',
                title: "Ordenes de Producción",
                exportOptions: {
                    columns: [ 0,1,2,3,4,5]
                }
                
            }
        ],

        language: {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron resultados en su busqueda",
            "searchPlaceholder": "Buscar registros",
            "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
            "infoEmpty": "No existen registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "search": "Buscar:",
            "paginate": {
                "first": "Primero",
                "last": "Último",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        }
    });

    // Generar Gráfico Nivel de Productividad
    $("#busqueda_productividad").on("click",function(){
        fecha_inicio = $("#inicio_busqueda").val();
        fecha_fin = $("#fin_busqueda").val();
        data_grafico_productividad(base_url,fecha_inicio,fecha_fin);
        $("#f_ini").html(fecha_inicio);
        $("#f_fin").html(fecha_fin);
        $("#div_resultado_productividad").show();
    });

    // Datos del Gráfico Nivel de Productividad
    function data_grafico_productividad(base_url,fecha_inicio,fecha_fin){    
        $.ajax({
            url: base_url + "movimiento/producciones/get_data_productividad",
            type:"POST",
            data:{
                    fecha_inicio: fecha_inicio,
                    fecha_fin: fecha_fin
                },
            dataType:"json",
            success:function(data){
                var fecha = new Array();
                var planificado = new Array();
                var producido = new Array();
                $.each(data,function(key, value){
                    fecha.push(value.fe);
                    valor_planificado = Number(value.pl);
                    valor_producido = Number(value.pr);
                    planificado.push(valor_planificado);
                    producido.push(valor_producido);
                });
                graficar_productividad(fecha,planificado,producido);
            }
        });
    }

    // Dibujar Gráfico Nivel de Productividad 
 

    // Generar Gráfico Reproceso
    $("#busqueda_reproceso").on("click",function(){
        fecha_inicio = $("#inicio_busqueda").val();
        fecha_fin = $("#fin_busqueda").val();
        data_grafico_reproceso(base_url,fecha_inicio,fecha_fin);
        $("#f_ini").html(fecha_inicio);
        $("#f_fin").html(fecha_fin);
        $("#div_resultado_reproceso").show();
    });
    
    // Datos del Gráfico Reproceso
    function data_grafico_reproceso(base_url,fecha_inicio,fecha_fin){    
        $.ajax({
            url: base_url + "movimiento/producciones/get_data_reproceso",
            type:"POST",
            data:{
                    fecha_inicio: fecha_inicio,
                    fecha_fin: fecha_fin
                },
            dataType:"json",
            success:function(data){
                var fecha = new Array();
                var producido = new Array();
                var reprocesado = new Array();
                $.each(data,function(key, value){
                    fecha.push(value.fe);
                    valor_producido = Number(value.pr);
                    valor_reprocesado = Number(value.re);
                    producido.push(valor_producido);
                    reprocesado.push(valor_reprocesado);
                });
                graficar_reproceso(fecha,producido,reprocesado);
            }
        });
    }

    // Dibujar Gráfico Reproceso
    function graficar_reproceso(fecha,producido,reprocesado){
        Highcharts.chart('dreproceso', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Nivel de Productividad'
        },
        subtitle: {     // text: 'Año: 2019'
        },
        xAxis: {
            categories: fecha,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad de Productos'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat:  '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                          '<td style="padding:0"><b>{point.y:.2f} productos</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            },series:{
            dataLabels:{
                enabled:true,
                formatter:function(){
                    return Highcharts.numberFormat(this.y,2)
                }
            }
        }
        },
        series: [{
            name: 'Unidades Producidas',
            data: producido

        }, 
        {
            name: 'Unidades Reprocesadas',
            data: reprocesado
            
        }
        ]
        });
        // Variables
        var total_producido  = 0;
        var total_reprocesado= 0;
        var indicador = 0;
        for(var i = 0; i < producido.length;i++){
            total_producido += producido[i];
        }
        for(var i = 0; i < reprocesado.length;i++){
            total_reprocesado += reprocesado[i];
        }
        indicador = (total_reprocesado/total_producido)*100;
        var valor_indicador = Number.parseFloat(indicador).toFixed(2);
        $("#r_pro").html(valor_indicador);
    }

    $(document).on("click",".btn-view-pedido",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimiento/pedidos/view",
            type:"POST",
            dataType:"html",
            data:{ valor:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });

    $(document).on("click",".btn-view-producto",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "rev/productos/view",
            type:"POST",
            dataType:"html",
            data:{ id:valor_id},
            success:function(data){
                $("#modal-default .modal-body").html(data);
            }
        });
    });

    // Botón Generar PDF
    $('.buttons-pdf').hide();
    $('#btn_pdf').click(function () {    
        $('.buttons-pdf').click();     
    });

    // Botón Generar Excel
    $('.buttons-excel').hide();
    $('#btn_excel').click(function () {  
        $('.buttons-excel').click();   });
    $('.sidebar-menu').tree();

    $(document).on("click",".btn-print",function(){
        $("#modal-default .modal-body").print();
    });

    $(document).on("click",".btn-print-produccion",function(){
        $("#modal-produccion .modal-body").print();
    });

    //Preparar orden de produccion
    $(document).on("click",".btn-view-produccion",function(){
        valor_id = $(this).val();
        $.ajax({
            url: base_url + "movimiento/producciones/view",
            type:"POST",
            dataType:"html",
            data:{ id:valor_id},
            success:function(data){
                $("#modal-produccion .modal-body").html(data);
            }
        });
    });











    



})

</script>
</body>
</html>
