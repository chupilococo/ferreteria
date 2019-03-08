<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 04:10 PM
 */
 if(isset($_POST['fechaDesde'])&&$_POST['fechaDesde']!=''){
	 $fechaDesde="fecha>='$_POST[fechaDesde]'";
 }else{
	 $fechaDesde="fecha>='0-0-0'";
 };

 if(isset($_POST['fechaHasta'])&&$_POST['fechaHasta']!=''){
	 $fechaHasta="fecha<='$_POST[fechaHasta]'";
 }else{
	 $fechaHasta="fecha<='3000-13-32'";
 };
 
 $query="
		SELECT
			r.cantidad,
			r.precioParcial,
			r.precioProveedor,
			r.stock_id,
			f.nombre,
			f.fecha,
			f.tipo_de_factura_id
		FROM
			rel_stock_clientes r
		JOIN facturas f ON r.facturas_id = f.id
		WHERE
			$fechaDesde
		AND $fechaHasta
		";
 $consulta=mysqli_query($cnx,$query);
 $query2="
	SELECT
		f.id,
		f.tipo_de_factura_id,
		f.nombre,
		f.fecha,
		f.estado,
		t.tipo as tipo
	FROM
		facturas f
		JOIN tipo_de_factura t
		ON f.tipo_de_factura_id=t.id
		WHERE
			$fechaDesde
		AND
			$fechaHasta
		Order by fecha desc;
	";
 $consulta2=mysqli_query($cnx,$query2);
?>
<div class="container">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-4">
			<form class='form' action="" method='post'>
			<label for="fechaDesde">Fecha Desde</label>
				<input class='form-control' name='fechaDesde' type="date" />
			<label for="fechaDesde">Fecha Hasta</label>
				<input class='form-control' name='fechaHasta' type="date" />
				<input class='form-control' type="submit" value='consultar' />
			</form>
		</div>
		<div class="col-md-6">
				<?php
				$totalBruto=0;
				$totalGasto=0;
				while($fila=mysqli_fetch_assoc($consulta)){
				$totalBruto+=$fila['cantidad']*$fila['precioParcial'];
				$totalGasto+=$fila['cantidad']*$fila['precioProveedor'];
				};
				?>
			<table class='table'><thead><th>Tipo de Factura</th><th>Nombre</th><th>Fecha</th><th>Detalle</th></thead></table>
			<div class="stockTable">
			<table class='table text-right'>
				<?php
				while($fila2=mysqli_fetch_assoc($consulta2)){
				?>
				<tr><td><?php echo $fila2['tipo'];?></td><td><?php echo $fila2['nombre'];?></td><td><?php echo $fila2['fecha'];?></td>
				<td>
					<button data-toggle="modal" data-target="#modal" onclick='facDetalle(<?php echo $fila2['id'];?>)' class='btn btn-primary'>detalles</button>
				</td>
				</tr>
				<?php
				};
				?> 
			</table>
			</div>
			<table class='table'>
				<tr class='lead'><td>Total Bruto</td><td class='text-right'>$ <?php echo $totalBruto;?></td></tr>
				<tr class='lead'><td>Total Gastos</td><td class='text-right'>$ -<?php echo $totalGasto;?></td></tr>
				<tr class='lead'><td>Total Neto</td><td class='text-right'>$ <?php echo ($totalBruto-$totalGasto);?></td></tr>
			</table>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
<script src="js/facturas.js"></script>