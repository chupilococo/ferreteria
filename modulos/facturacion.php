<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 04:09 PM
 */
 $consulta="SELECT
				Fac.id,
				Fac.tipo_de_factura_id,
				Fac.nombre,
				Fac.fecha,
				Fac.estado,
				tipo.tipo
			FROM
				facturas AS Fac
			LEFT JOIN tipo_de_factura AS tipo ON Fac.tipo_de_factura_id=tipo.id
			ORDER BY Fac.estado, Fac.fecha Desc
			";
 $query=mysqli_query($cnx,$consulta);
 ?>
 <div class='container'>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
		<div class="stockTable">
		<table class='table derecha table-striped text-right'>
			<tr><th>tipo de factura</th><th>nombre</th><th>fecha</th><th>estado</th><th>acciones</th></tr>
			<?php
			while($fila=mysqli_fetch_assoc($query)){
			?>
				<tr><td><?php echo $fila['tipo'];?></td><td><?php echo $fila['nombre'];?></td><td><?php echo $fila['fecha'];?></td><td><?php echo($fila['estado']==0)?'abierta':'cerrada';?></td>
				<td>
					<button data-toggle="modal" data-target="#modal" onclick='facDetalle(<?php echo $fila['id'];?>)' class='btn btn-primary'>detalles</button>
					<button data-toggle="modal" data-target="#modal" onclick='facDetalle(<?php echo $fila['id'];?>)' class=' <?php echo($fila['estado']==0)?'':'hidden ';?>btn btn-success'>editar</button>
					<button data-toggle="modal" data-target="#modal" onclick='facBorrar(<?php echo $fila['id'];?>)' class=' <?php echo($fila['estado']==0)?'':'hidden ';?>btn btn-danger'>borrar</button>
					<button data-toggle="modal" data-target="#modal" onclick='facCerrar(<?php echo $fila['id'];?>)' class=' <?php echo($fila['estado']==0)?'':'hidden ';?> btn btn-warning'>cerrar</button>
				</td>
				</tr>
			<?php
			}
			?>
		</table>
		</div>
		</div>
		<div class="col-md-1"></div>
	</div>
 </div>
 <script src="js/facturas.js"></script>