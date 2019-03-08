<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 04:10 PM
 */
 if(isset ($_POST['pg'])&& $_POST['pg']>0){
	 $pg=$_POST['pg'];
	 $pgs=$pg*50;
 }
 else{
	 $pg=0;
	 $pgs=0;
 };
 
 
 if(isset ($_POST['stockSearch'])){
	 $stockSearch="%$_POST[stockSearch]%";
 }
 else{
	 $stockSearch='%%';
 };
$consulta="
	SELECT
		id,
		nombre,
		descripcion,
		codigo,
		FKproveedores,
		precio,
		cantidad
	FROM
		stock
	WHERE
		nombre like '$stockSearch'
		or
		codigo like '$stockSearch'
	LIMIT $pgs,50
		";
$query=mysqli_query($cnx,$consulta);
?>
 <div class='container'>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		<div class='pad'>
			<button data-toggle="modal" data-target="#modal" id='nuevoStock' class='form-control btn btn-primary' >Agregar</button>
		</div>
		<div class='form-group'>
			<label> Busqueda </label>	<form class='form' action="" method='POST'>
			<input class='form-control' type="text" placeholder='Busqueda de producto' autocomplete='off' name='stockSearch'><input class='form-control' type="submit" />
			<!--pre><?php 
				echo $_SERVER['PHP_SELF'];
				var_dump($_POST);
			?></pre-->
			</form>
		</div>
		<div class='stockTable'>
		<table class='table derecha text-right'>
			<thead>
				<tr><th>Nombre</th><th>Codigo</th><th>acciones</th></tr>
			</thead>
			<tbody>
			<?php
			$count=0;
			while($fila=mysqli_fetch_assoc($query)){
			?>
				<tr class='<?php echo ($fila['cantidad']<2)?'low':''?>'><td><?php echo $fila['nombre']?></td><td><?php echo $fila['codigo']?></td>
				<td>
					<button data-toggle="modal" data-target="#modal" onclick='stockDetalle(<?php echo $fila['id']?>)' class='btn btn-primary'>detalles</button>
					<button data-toggle="modal" data-target="#modal" onclick='stockEditar(<?php echo $fila['id']?>)' class='btn btn-success'>editar</button>
					<button data-toggle="modal" data-target="#modal" onclick='stockBorrar(<?php  echo$fila['id']?>)' class='btn btn-danger'>borrar</button>
				</td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		</div>
		<form action="" method='POST'>
			<input type="hidden" name='stockSearch' value="<?php echo str_replace("%","",$stockSearch);?>" />
			<input type="hidden" name='pg' value='<?php echo ($pg-1);?>'  />
			<input type='submit' value='<< Previos' class='btn btn-primary pull-left' href="index.php?c=stock&pg=<?php echo ($pg-1);?>">
		</form>
		<form action="" method='POST'>
			<input type="hidden" name='stockSearch' value="<?php echo str_replace("%","",$stockSearch);?>" />
			<input type="hidden" name='pg' value='<?php echo ($pg+1);?>'  />
			<input type="submit" class='btn btn-primary pull-right' value ='Sigientes >>'>
		</form>
		</div>
		<div class="col-md-1"></div>
	</div>
 </div>
 <script src="js/stock.js"></script>