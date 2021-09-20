<?php
	include('../../config/setup.php');
	if(isset($_GET['id'])):
	$id=$_GET['id'];
	$consulta="SELECT
				stock.nombre,
				venta.cantidad,
				venta.precioParcial,
				venta.precioProveedor,
				venta.stock_id,
				venta.facturas_id,
				venta.id
			  FROM
				rel_stock_clientes AS venta
			  JOIN stock
				on venta.stock_id=stock.id
			  WHERE
				facturas_id = '$id'";
	$query=mysqli_query($cnx,$consulta);
	$consultaFac="SELECT
				nombre
			  FROM
				facturas
			  WHERE
				id = '$id'";
	$queryFac=mysqli_query($cnx,$consultaFac);
	$fac=mysqli_fetch_assoc($queryFac);
	$total=0;
	$totalGastos=0;
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
				<th>precio * cantidad</th>
				<th></th>
				<th>Acciones</th>
			</tr>
			<?php while ($fila=mysqli_fetch_assoc($query)):?>
				<tr>
					<td><?php echo $fila['nombre'];?></td>
					<td><?php echo $fila['cantidad'];?></td>
					<td><?php echo $fila['precioParcial'];?></td>
					<td><?php echo $fila['precioProveedor'];?></td>
					<td><?php echo $fila['precioParcial']*$fila['cantidad'];?></td>
					<td><?php $total +=($fila['precioParcial']*$fila['cantidad']);?></td>
					<td><button onclick="elimProdFac(<?php echo $fila['id'];?>,<?php echo $fila['facturas_id'];?>,this)" class='btn btn-primary'>Eliminar</button></td>
				</tr>
			<?php endwhile; ?>
		</table>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Salir</button>
      </div>
    </div>
  </div>
 <?php
 endif;