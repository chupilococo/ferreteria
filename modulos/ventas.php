<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 04:08 PM
 */
?>
<div class="container-fluid">
<div class="row">
<div class="minAlt">
    <div class="col-md-1">
    </div>
    <div class="col-md-4">
        <label for="cliente">cliente</label>
            <input class="form-control" type="text" id="cliente" name="cliente" placeholder="Buscar Cliente">
            <input id="clienteCodigo" type="hidden">
            <div class="hidden minAlt" id="clixr"></div>
            <div class="minAlt" id="separator">
            </div>
            <label for="productioNombre">producto</label>
            <input class="form-control" type="text" id="productoNombre" name="productioNombre" placeholder="Buscar Producto por Nombre o Codigo">
            <input class="form-control" type="text" id="productoCodigo" name="productioCodigo" placeholder="Busqueda literal de Producto por Codigo">
            <input class="form-control" type="hidden" id="prodID" name="prodID">
            <input class="form-control" id='CargaBtn' data-toggle="modal" data-target="#modal" type="button" value=">>">
            <div class="oculto maxAlt" id="prodxr"></div>
    </div>

    <div class="col-md-6">
		<div class='tableAlt'>
            <table class="table" id='tablaVenta'>
				<thead><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Parcial</th><th><i class="fa fa-pencil-square-o" aria-hidden="true"></i></th></thead>
			</table>
		</div>
			<p class='text-right lead'>total: $<span id='totalVenta'>0</span></p>
			<form class='form-inline' id='ventasForm' action="modulos/ventas/nuevaFactura.php" method='post'>
				<div class='row'>
					<div class='row magenInterno'>
					<div class='form-group' >
						<label for="tipoVenta">Tipo</label>
						<select class='form-control' name="tipoVenta" required id="tipoVenta">
							<option></option>
							<option value="1">mostrador</option>
							<option value="2">A</option>
							<option value="3">B</option>
							<option value="4">C</option>
						</select>
					</div>
					<div class='form-group' >
						<label for="factura">Factura</label>
						<input type="text" class='form-control' required autocomplete="off" id='factura' name='factura'  />
					</div>
					<div class='form-group' >
						<label for="fechaVenta">Fecha</label>
						<input type="date" class='form-control' required name='fechaVenta' id='fechaVenta'  />
						<input type="hidden" name='ClienteId' id='ClienteId'  />
					</div>
					</div>
				<div class='row magenInterno'>
					<button class="btn btn-danger" type="button" id='ventaCancel'/>cancelar</button>
					<button class="btn btn-default" data-toggle="modal" data-target="#modal" type="button" id='presupuestarBtn' />presupuestar</button>
					<input class="btn btn-success" type="submit" value='Ejecutar' />
				</div>
			</form>
	</div>
    <div class="col-md-1"></div>
    </div>
</div>
</div>
<script src="js/ventas.js"></script>