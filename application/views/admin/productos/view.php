<div class="row">
	<div class="col-xs-12">	

		<p><b>	Datos del Producto : </b></p>

		<table class="table table-striped">
			<tbody>
				<tr>
					<td><b>Codigo:</b></td>
					<td><?php echo $producto->abre_producto;?></td>
					<td><b>Stock:</b></td>
					<td><?php echo $producto->stock_producto;?></td>
				</tr>
				<tr>
					<td><b>Nombre:</b></td>
					<td><?php echo $producto->nombre_producto;?></td>
					<td><b>Precio:</b></td>
					<td><?php echo $producto->precio_producto;?></td>				
				</tr>
				<tr>
					<td><b>Categoria:</b></td>
					<td><?php echo $producto->categoria;?></td>
					<!-- <td><b>Estado:</b></td>
					<td><?php //echo $producto->estado_producto;?></td> -->
				</tr>
			</tbody>

		</table>

		<p><b>	Materiales : </b></p>

		<table class="table table-bordered table-striped dataTable" role="grid">
			<thead>
				<tr>
					<th class="text-center">Código</th>
					<th class="text-center">Nombre</th>
					<th class="text-center">Unidad Medida</th>
					<th class="text-center">Cantidad Necesaria</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($materiales)):?>
					<?php foreach($materiales as $material):?>
						<tr>
							<td class="text-center"><?php echo $material->cod;?></td>
							<td class="text-center"><?php echo $material->nom;?></td>
							<td class="text-center"><?php echo $material->uni;?></td>
							<td class="text-center"><?php echo $material->nec;?></td>      
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
        </table>
               
		<!-- <p><b>	Procesos : </b></p>

		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center">Código</th>                            
					<th class="text-center">Nombre</th>
					<th class="text-center">Descripcion</th>
					<th class="text-center">Area</th>
				</tr>
			</thead>
			<tbody>
				<?php if(!empty($procesos)):?>
					<?php foreach($procesos as $proceso):?>
						<tr>
							<td class="text-center"><?php echo $proceso->cod;?></td>           
							<td class="text-center"><?php echo $proceso->nom;?></td>
							<td class="text-center"><?php echo $proceso->des;?></td>
							<td class="text-center"><?php echo $proceso->are;?></td>
						</tr>
					<?php endforeach;?>
				<?php endif;?>
			</tbody>
		</table> -->

		<p><b>	Maquinas : </b></p>  

		<table class="table table-bordered table-striped dataTable" role="grid">
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
</div>
