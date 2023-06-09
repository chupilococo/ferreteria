<?php
include('../../config/setup.php');

$isIvaExcpted = false;

if (isset($_GET['id']) && $_GET['id'] != '') :
	$id = $_GET['id'];

	$query = "Select * from stock where id=$id and active=1 limit 1";
	$consulta = mysqli_query($cnx, $query);
	$row = mysqli_fetch_assoc($consulta);

	if (strtolower($row['nombre']) == 'gasto') {
		$isIvaExcpted = true;
	}

?>


	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><?php echo $row['nombre']; ?></h4>
			</div>
			<div class="modal-body">
				<div class="form-inline">
					<?php
					if ($isIvaExcpted) {
					?>
						<input class='form-control' type="text" id='alerta' value='PRODUCTO EXCEPTUADO DE IVA' disabled='disabled' />
					<?php
					}
					?>
					<input type="hidden" value='<?php echo $row['precio']; ?>' id='CargaPrecioProvBD' disabled='disabled' />
					<input type="hidden" value='<?php echo $row['id']; ?>' id='CargaId' disabled='disabled' />
					<div>
						<label>Nombre
							<input class='form-control' type="text" id='CargaNombre' value='<?php echo $row['nombre']; ?>' disabled='disabled' />
						</label>

						<label>Descripcion
							<input class='form-control' type="text" id='CargaDesc' value='<?php echo $row['descripcion']; ?>' />
						</label>
					</div>

					<div>
						<label>Precio Proveedor
							<input class='form-control' id='CargaPrecioProv' type="number" value='<?php echo (($isIvaExcpted) ? $row['precio'] : $row['precio'] * 1.21); ?>' disabled='disabled' />
						</label>
					</div>

					<div>
						<label>Porcentaje Cliente
							<input class='form-control' id='CargaPrecioPorcentaje' onchange='CalcPersentage()' type="number" step="any" value='185' /> %
						</label>
						<label>Parcial Cliente
							<input class='form-control' id='CargaPrecio' onchange='CalcTotal()' type="number" step="any" value='<?php echo (($isIvaExcpted) ? $row['precio'] : $row['precio'] * 1.21); ?>' />
						</label>
					</div>
					<div>
						<label>Cantidad
							<input class='form-control' onchange='CalcTotal()' id='CargaCantidad' type="number" value=0 />
						</label>
					</div>
					<div>
						<label>Forma de Pago
							<select class='form-control' id='formaPago'>
								<option value="0">Efectivo</option>
								<option value="1">Tarjeta</option>
							</select>
						</label>
					</div>

					<label>TOTAL
						<input class='form-control' id='CargaTotal' type="number" step="any" />
					</label>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					<button type="button" class="btn btn-success" onclick='handleCargarTablaVenta()' data-dismiss="modal">Enviar</button>
				</div>
			</div>
		</div>

	</div>
<?php
else :
?>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">No se cargo Producto</h4>
			</div>
			<div class="modal-body">
				<p>Favor de revisar la busqueda del producto</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
<?php
endif;
