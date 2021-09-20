 <?php
	include('../../config/setup.php');
	$stockQuery = "
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
	$stockConsulta = mysqli_query($cnx, $stockQuery);
	$row = mysqli_fetch_assoc($stockConsulta);
	$provQuery = "SELECT id, nombre from proveedores";
	$provConsulta = mysqli_query($cnx, $provQuery);
	$ProvIsSet = $_GET['ProvIsSet'];
	?>
 <div class="modal-dialog">
 	<div class="modal-content">
 		<div class="modal-header">
 			<button type="button" class="close" data-dismiss="modal">&times;</button>
 			<h4 class="modal-title"><?php echo $row['nombre'] ?></h4>
 		</div>
 		<form action="modulos/stock/update.php" method='POST' class="form">
 			<div class="modal-body">
 				<label for="nombre">Nombre</label><input class='form-control' name='nombre' value='<?php echo $row['nombre']; ?>' type="text" />
 				<label for="codigo">Codigo</label><input class='form-control' name='codigo' value='<?php echo $row['codigo']; ?>' type="text" />
 				<label for="descripcion">descripcion</label><textarea name='descripcion' class='form-control' cols="30" rows="7"><?php echo $row['descripcion']; ?></textarea>
 				<label for="proveedor">Proveedor</label>
 				<select class='form-control' name='proveedor' type="text">
 					<?php while ($proveedor = mysqli_fetch_assoc($provConsulta)) : ?>
 						<option value="<?php echo $proveedor['id'] ?>" <?= ($proveedor['id'] == $row['FKproveedores']) ? 'selected="selected"' : '' ?>><?php echo $proveedor['nombre'] ?></option>
 					<?php endwhile; ?>
 				</select>
 				<label for="codigo">Cantidad</label><input class='form-control' value='<?php echo $row['cantidad']; ?>' name='cantidad' type="number" />
 				<label for="codigo">Precio</label><input class='form-control' value='<?php echo $row['precio']; ?>' name='precio' step="any" type="number" />
 				<input value='<?php echo $row['id']; ?>' name='id' type="hidden" />
 				<input value='<?php echo $ProvIsSet; ?>' name='ProvIsSet' type="hidden" />
 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 				<input type="submit" value='actualizar' class="btn btn-success" />
 			</div>
 		</form>
 	</div>
 </div>