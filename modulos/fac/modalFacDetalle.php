<?php
include('../../config/setup.php');
if (isset($_GET['id'])) :
	$id = $_GET['id'];
	$consulta = "SELECT
				stock.nombre,
				venta.cantidad,
				venta.precioParcial,
				venta.precioProveedor,
				venta.formaPago
			  FROM
				rel_stock_clientes AS venta
			  JOIN stock
				on venta.stock_id=stock.id
			  WHERE
				facturas_id = '$id'";
	$query = mysqli_query($cnx, $consulta);
	$consultaFac = "SELECT
				nombre
			  FROM
				facturas
			  WHERE
				id = '$id'";
	$queryFac = mysqli_query($cnx, $consultaFac);
	$fac = mysqli_fetch_assoc($queryFac);
	$total = 0;
	$totalGastos = 0;
?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo $fac['nombre']; ?></h4>
			</div>
			<div class="modal-body">
				<table class="table">
					<tr>
						<th>nombre</th>
						<th>cantidad</th>
						<th>precioParcial</th>
						<th>precioProveedor</th>
						<th>Pago con tarjeta</th>
						<th>precio * cantidad</th>
						<th></th>
					</tr>
					<?php while ($fila = mysqli_fetch_assoc($query)) : ?>
						<tr>
							<td><?php echo $fila['nombre']; ?></td>
							<td><?php echo $fila['cantidad']; ?></td>
							<td><?php echo $fila['precioParcial']; ?></td>
							<td><?php echo $fila['precioProveedor']; ?></td>
							<td><?= (($fila['formaPago'] == 1) ? 'Si' : 'No'); ?></td>
							<td><?php echo $fila['precioParcial'] * $fila['cantidad']; ?></td>
							<td><?php $total += ($fila['precioParcial'] * $fila['cantidad']); ?></td>
							<?php $totalGastos += ($fila['precioProveedor'] * $fila['cantidad']); ?>
						</tr>
					<?php endwhile; ?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class=''>Total Bruto:</td>
						<td class=''><?php echo $total; ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class=''>Total Gastos:</td>
						<td class=''><?php echo $totalGastos; ?></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class='lead'>Total Neto:</td>
						<td class='lead'><?php echo ($total - $totalGastos); ?></td>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success" onclick='getPDF(<?= $id ?>)'>Descargar PDF</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
<?php
endif;
