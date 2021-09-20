<?php

/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 04:09 PM
 */



$consulta = "SELECT
				Fac.id,
				Fac.tipo_de_factura_id,
				Fac.nombre,
				Fac.fecha,
				Fac.estado,
				Fac.pago,
				tipo.tipo
			FROM
				facturas AS Fac
			LEFT JOIN tipo_de_factura AS tipo ON Fac.tipo_de_factura_id=tipo.id
			ORDER BY Fac.estado, Fac.fecha Desc
			";

if (isset($_GET['filtro'])) {
	if ($_GET['filtro'] == 'impagas') {
		$consulta = "SELECT
				Fac.id,
				Fac.tipo_de_factura_id,
				Fac.nombre,
				Fac.fecha,
				Fac.estado,
				Fac.pago,
				tipo.tipo
			FROM
				facturas AS Fac
			LEFT JOIN tipo_de_factura AS tipo ON Fac.tipo_de_factura_id=tipo.id
			where Fac.pago=0
			ORDER BY Fac.estado, Fac.fecha Desc
			";
	} else if ($_GET['filtro'] == 'pagas') {
		$consulta = "SELECT
				Fac.id,
				Fac.tipo_de_factura_id,
				Fac.nombre,
				Fac.fecha,
				Fac.estado,
				Fac.pago,
				tipo.tipo
			FROM
				facturas AS Fac
			LEFT JOIN tipo_de_factura AS tipo ON Fac.tipo_de_factura_id=tipo.id
			where Fac.pago=1
			ORDER BY Fac.estado, Fac.fecha Desc
			";
	}
}
$query = mysqli_query($cnx, $consulta);
?>
<div class='container'>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<form class="form" action="" method="get">
					<input type="hidden" name="c" id="inputc" class="form-control" value="facturacion">
					<div class="col-xs-6">
						<select class='form-control ' name="filtro" id="filtro">
							<?php
							$options = array( 'todo','impagas', 'pagas');

							$output = '';
							for ($i = 0; $i < count($options); $i++) {
								$output .= '<option '
									. ($_GET['filtro'] == $options[$i] ? 'selected="selected"' : '') . ' value='.$options[$i].'>'
									. $options[$i]
									. '</option>';
							}
							?>
							<?=$output?>
							<!-- <option value="impagas">impagas</option>
							<option value="pagas">pagas</option>
							<option value="todo">todo</option> -->
						</select>
					</div>
					<div class="col-xs-6">
						<input type="submit" class='form-control btn-primary ' value="filtrar">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class='container'>
	<div class="row">
		<div class="col-md-12">
			<div class="stockTable">
				<table class='table derecha table-striped text-right'>
					<tr>
						<th>tipo de factura</th>
						<th>nombre</th>
						<th>fecha</th>
						<th>estado</th>
						<th>acciones</th>
					</tr>
					<?php
					while ($fila = mysqli_fetch_assoc($query)) {
					?>
						<tr class="<?= ($fila['pago'] == 0) ? 'danger' : '' ?>">
							<td><?php echo $fila['tipo']; ?></td>
							<td><?php echo $fila['nombre']; ?></td>
							<td><?php echo $fila['fecha']; ?></td>
							<td><?php echo ($fila['estado'] == 0) ? 'abierta' : 'cerrada'; ?></td>
							<td>
								<?php
								if ($fila['pago'] == 0) {

								?>
									<button data-toggle="modal" data-target="#modal" onclick='facTogglePago(<?php echo $fila['id']; ?>)' class='btn btn-primary'>Marcar Paga</button>
								<?php
								}
								?>
								<button data-toggle="modal" data-target="#modal" onclick='facDetalle(<?php echo $fila['id']; ?>)' class='btn btn-primary'>detalles</button>
								<button data-toggle="modal" data-target="#modal" onclick='facAbrir(<?php echo $fila['id']; ?>)' class=' <?php echo ($fila['estado'] == 1) ? '' : 'hidden '; ?>btn btn-success'>abrir</button>
								<button data-toggle="modal" data-target="#modal" onclick='facEditar(<?php echo $fila['id']; ?>)' class=' <?php echo ($fila['estado'] == 0) ? '' : 'hidden '; ?>btn btn-success'>editar</button>
								<button data-toggle="modal" data-target="#modal" onclick='facBorrar(<?php echo $fila['id']; ?>)' class=' <?php echo ($fila['estado'] == 0) ? '' : 'hidden '; ?>btn btn-danger'>borrar</button>
								<button data-toggle="modal" data-target="#modal" onclick='facCerrar(<?php echo $fila['id']; ?>)' class=' <?php echo ($fila['estado'] == 0) ? '' : 'hidden '; ?> btn btn-warning'>cerrar</button>
							</td>
						</tr>
					<?php
					}
					?>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-1"></div>
</div>
</div>
<script src="js/facturas.js"></script>