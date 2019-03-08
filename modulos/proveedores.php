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
 
 
 if(isset ($_POST['provSearch'])){
	 $provSearch="%$_POST[provSearch]%";
 }
 else{
	 $provSearch='%%';
 };
$consulta="
	SELECT
		*
	FROM
		proveedores
	WHERE
		nombre like '$provSearch'
		or
		codigo like '$provSearch'
	LIMIT $pgs,50
		";
$query=mysqli_query($cnx,$consulta);
?>
 <div class='container'>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		<div class='pad'>
			<button data-toggle="modal" data-target="#modal" id='nuevoProv' class='form-control btn btn-primary' >Agregar</button>
		</div>
		<div class='form-group'>
			<label> Busqueda </label>	<form class='form' action="" method='POST'>
			<input class='form-control' type="text" placeholder='Busqueda de producto' autocomplete='off' name='provSearch'><input class='form-control' type="submit" />
			<!--pre><?php 
				echo $_SERVER['PHP_SELF'];
				var_dump($_POST);
			?></pre-->
			</form>
		</div>
		<div class='stockTable'>
		<table class='table derecha table-striped text-right'>
			<thead>
				<tr><th>Nombre</th><th>Codigo</th><th>acciones</th></tr>
			</thead>
			<tbody>
			<?php
			$count=0;
			while($fila=mysqli_fetch_assoc($query)){
			?>
				<tr><td><?php echo $fila['nombre']?></td><td><?php echo $fila['codigo']?></td>
				<td>
					<button data-toggle="modal" data-target="#modal" onclick='provDetalle(<?php echo $fila['id']?>)' class='btn btn-primary'>detalles</button>
					<button data-toggle="modal" data-target="#modal" onclick='provEditar(<?php echo $fila['id']?>)' class='btn btn-success'>editar</button>
					<button data-toggle="modal" data-target="#modal" onclick='provBorrar(<?php  echo$fila['id']?>)' class='btn btn-danger'>borrar</button>
				</td>
				</tr>
			<?php
			}
			?>
			</tbody>
		</table>
		</div>
		<form action="" method='POST'>
			<input type="hidden" name='provSearch' value="<?php echo str_replace("%","",$provSearch);?>" />
			<input type="hidden" name='pg' value='<?php echo ($pg-1);?>'  />
			<input type='submit' value='<< Previos' class='btn btn-primary pull-left'>
		</form>
		<form action="" method='POST'>
			<input type="hidden" name='provSearch' value="<?php echo str_replace("%","",$provSearch);?>" />
			<input type="hidden" name='pg' value='<?php echo ($pg+1);?>'  />
			<input type="submit" class='btn btn-primary pull-right' value ='Sigientes >>'>
		</form>
		</div>
		<div class="col-md-1"></div>
	</div>
 </div>
 <script src="js/proveedores.js"></script>