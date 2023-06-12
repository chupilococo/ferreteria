 <?php
	include('../../config/setup.php');
	$provQuery = "
			SELECT
				a.id,
				a.nombre,
				a.descripcion,
				a.codigo,
				a.cantidad,
				a.FKproveedores,
				a.precio,
				b.nombre as proveedor
			FROM
				stock as a join proveedores as b
				on a.FKproveedores=b.id
			WHERE
				a.id = '$_GET[id]'
			LIMIT 1
	";
	$provConsulta = mysqli_query($cnx, $provQuery);
	$row = mysqli_fetch_assoc($provConsulta);
	?>
 <div class="modal-dialog">
 	<div class="modal-content">
 		<div class="modal-header">
 			<button type="button" class="close" data-dismiss="modal">&times;</button>
 			<h4 class="modal-title"><?php echo $row['nombre'] ?></h4>
 		</div>
 		<div class="modal-body">
 			<label for="nombre">Nombre</label><input class='form-control' value='<?php echo $row['nombre']; ?>' disabled type="text" />
 			<label for="codigo">Codigo</label><input class='form-control' value='<?php echo $row['codigo']; ?>' disabled type="text" />
 			<label for="descripcion">descripcion</label><textarea class='form-control' disabled id="" cols="30" rows="7"><?php echo $row['descripcion']; ?></textarea>
 			<label for="proveedor">Proveedor</label><input class='form-control' value='<?php echo $row['proveedor']; ?>' type="text" disabled value='' />
 			<label for="codigo">Cantidad</label><input class='form-control' value='<?php echo $row['cantidad']; ?>' disabled name='cantidad' type="number" />
 			<label for="codigo">Precio</label><input class='form-control' value='<?php echo $row['precio']; ?>' disabled name='precio' type="number" />

 		</div>
 		<div class="modal-footer">
 			<a href="index.php?c=stock_ventas&id=<?= $row['id'] ?>&from=<?= date('Y-m-d', strtotime('-7 days')) ?>&to=<?= date('Y-m-d') ?>" class="btn btn-warning">Ventas</a>
 			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 		</div>
 	</div>
 </div>