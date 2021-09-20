 <?php
	include('../../config/setup.php');
	$provQuery = "
			SELECT
				id,
				nombre,
				password,
				tipo
			FROM
				usuario
			WHERE
				id = '$_GET[id]'
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
 		<form action="modulos/adm/userDel.php" method='POST' class="form">
 			<div class="modal-body">
			 <h2>Esta a punto de Borrar el usuario <?=$row['nombre']?></h2>
			<input value='<?php echo $row['id']; ?>' name='id' type="hidden" />
 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
 				<input type="submit" class="btn btn-success" value="Borrar" />
 			</div>
 		</form>
 	</div>
 </div>