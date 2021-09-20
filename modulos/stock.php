<?php

/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 04:10 PM
 */
if (isset($_GET['pg']) && $_GET['pg'] > 0) {
	$pg = $_GET['pg'];
	$pgs = $pg * 50;
} else {
	$pg = 0;
	$pgs = 0;
};


//if (isset($_POST['stockSearch']) && $_POST['stockSearch'] !== '') {
// $stockSearch = "%$_POST[stockSearch]%";
//}

if (isset($_GET['stockSearch']) && $_GET['stockSearch'] !== '') {
	$stockSearch = "%$_GET[stockSearch]%";
} else {
	$stockSearch = '%%';
};



if (isset($_GET['ProvSearch']) && $_GET['ProvSearch'] !== '') {
	$ProvSearch = "$_GET[ProvSearch]";
} else {
	$ProvSearch = '%%';
};

$consulta_proveedores = 'SELECT id, nombre FROM proveedores p;';

$consulta_productos = "
	SELECT
	s.id,
	s.nombre,
	s.descripcion,
	s.codigo,
	s.FKproveedores,
	p.nombre as proveedor ,
	s.precio,
	s.cantidad
FROM
	stock s
join
	ferreteria.proveedores p 
	on p.id =s.FKproveedores 
WHERE
	(s.nombre like '$stockSearch'
	or s.codigo like '$stockSearch')
	and s.FKproveedores like '$ProvSearch'
	and s.active=1

	LIMIT $pgs,50
		";
$query_proveedores = mysqli_query($cnx, $consulta_proveedores);
$query_productos = mysqli_query($cnx, $consulta_productos);
?>
<div class='container'>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<h3>Busqueda</h3>
			<form class='' action="" method='GET'>
				<input type="hidden" name='c' value='stock'>
				<div class="row">
					<div class="col-xs-6">
						<label for="stockSearch">
							Busqueda de producto
						</label>
						<input class='form-control' type="text" placeholder='Nombre o codigo' autocomplete='off' name='stockSearch'>
					</div>
					<div class="col-xs-6">
						<label for="ProvSearch">Proveedor</label>
						<select class='form-control' name="ProvSearch" id="ProvSearch">
							<option value="">seleccione un proveedor</option>
							<?php
							while ($proveedor = mysqli_fetch_assoc($query_proveedores)) {
							?>
								<option value="<?= $proveedor['id'] ?>" <?= ($proveedor['id'] == $ProvSearch) ? 'selected="selected"' : '' ?>> <?= $proveedor['nombre'] ?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<input type="submit" class="form-control btn-primary" value="Buscar">
					</div>
				</div>
			</form>
			<br>
			<div class='stockTable'>
				<table class='table derecha text-right'>
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Codigo</th>
							<th>Proveedor</th>
							<th>acciones</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$count = 0;
						while ($fila = mysqli_fetch_assoc($query_productos)) {
						?>
							<tr class='<?php echo ($fila['cantidad'] < 2) ? 'low' : '' ?>'>
								<td><?php echo $fila['nombre'] ?></td>
								<td><?php echo $fila['codigo'] ?></td>
								<td><?php echo $fila['proveedor'] ?></td>
								<td>
									<button data-toggle="modal" data-target="#modal" onclick='stockDetalle(<?php echo $fila['id'] ?>)' class='btn btn-primary'>detalles</button>
									<button data-toggle="modal" data-target="#modal" onclick='stockEditar(<?php echo $fila['id'] ?>)' class='btn btn-success'>editar</button>
									<button data-toggle="modal" data-target="#modal" onclick='stockBorrar(<?php echo $fila['id'] ?>)' class='btn btn-danger'>borrar</button>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<form action="" method='POST'>
				<input type="hidden" name='stockSearch' value="<?php echo str_replace("%", "", $stockSearch); ?>" />
				<input type="hidden" name='ProvSearch' value="<?php echo str_replace("%", "", $ProvSearch); ?>" />
				<input type="hidden" name='pg' value='<?php echo ($pg - 1); ?>' />
				<input type='submit' value='<< Previos' class='btn btn-primary pull-left' href="index.php?c=stock&pg=<?php echo ($pg - 1); ?>">
			</form>
			<form action="" method='POST'>
				<input type="hidden" name='stockSearch' value="<?php echo str_replace("%", "", $stockSearch); ?>" />
				<input type="hidden" name='ProvSearch' value="<?php echo str_replace("%", "", $ProvSearch); ?>" />
				<input type="hidden" name='pg' value='<?php echo ($pg + 1); ?>' />
				<input type="submit" class='btn btn-primary pull-right' value='Sigientes >>'>
			</form>
			<div class='pad_up'>
				<button data-toggle="modal" data-target="#modal" id='nuevoStock' class='form-control btn btn-success'>Agregar</button>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
<script src="js/stock.js"></script>