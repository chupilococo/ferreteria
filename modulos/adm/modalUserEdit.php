 <?php
	include('../../config/setup.php');
	$provQuery = "
			SELECT
				id,
				nombre,
				password,
				tipo,
				permisos
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
 		<form action="modulos/adm/userUpdate.php" method='POST' class="form">
 			<div class="modal-body">
 				<label for="nombre">Nombre</label><input class='form-control' name="nombre" value='<?php echo $row['nombre']; ?>' type="text" />
 				<label for="codigo">Pasword</label><input class='form-control' name="password" value='<?php echo $row['password']; ?>' type="password" />
 				<label for="admin">Es Admin</label>
 				<select class='form-control' name="tipo" id="tipo">
 					<option value="0" <?= ($row['tipo'] == '0') ? 'selected="selected"' : '' ?>>NO</option>
 					<option value="1" <?= ($row['tipo'] == '1') ? 'selected="selected"' : '' ?>>SI</option>
 				</select>
 				<input value='<?php echo $row['id']; ?>' name='id' type="hidden" />
 			</div>
 			<div class="container">
 				<h3>permisos</h3>
 				<?php
				 	$user_permisos=explode(',',$row['permisos']);
					foreach ($aPermisos as $llave => $user_permiso) {
					?>
 					<label class="checkbox-inline" for="permiso_<?=$user_permiso?>">
 						<input type="checkbox" <?=(in_array($user_permiso,$user_permisos))?'checked="checked"':''?>  name="permisos[]" value="<?=$user_permiso?>" id="permiso_<?=$user_permiso?>">
 						<?= ucfirst($user_permiso)?>
 					</label>
 				<?php
					};
					?>
 			</div>
 			<div class="modal-footer">
 				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
 				<input type="submit" class="btn btn-success" value="guardar" />
 			</div>
 		</form>
 	</div>
 </div>