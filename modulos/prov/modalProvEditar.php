 <?php
	include('../../config/setup.php');	
	$provQuery="
			SELECT
				id,
				nombre,
				codigo,
				cuit,
				email,
				telefono,
				direccion,
				if (debe=0,'NO','SI') as debe
			FROM
				proveedores
			WHERE
				id = '$_GET[id]'
			LIMIT 1
	";
	$provConsulta=mysqli_query($cnx,$provQuery);
	$row=mysqli_fetch_assoc($provConsulta);
 ?> 
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $row['nombre']?></h4>
      </div>
	  <form action="modulos/prov/update.php" method='POST' autocomplete='off' class="form">
		<div class="modal-body">
			<label for="nombre">Nombre</label><input class='form-control'  required name='nombre' value='<?php echo $row['nombre'];?>' type="text" />
			<label for="codigo">Codigo</label><input class='form-control'  required name='codigo'value='<?php echo $row['codigo'];?>' type="text" />
			<label for="cuit">cuit</label><input class='form-control' name='cuit' value='<?php echo $row['cuit'];?>' type="text" />
			<label for="email">email</label><input class='form-control' name='email' value='<?php echo $row['email'];?>' type="text"  />
			<label for="telefono">telefono</label><input class='form-control' name='telefono' value='<?php echo $row['telefono'];?>' name='telefono' type="text" />
			<label for="direccion">direccion</label><input class='form-control' name='direccion' value='<?php echo $row['direccion'];?>' name='direccion' type="text" />
			<label for="debe">debe</label>
			<select class='form-control' required name='debe' type="text">
				<option value='0'>NO</option>
				<option value='1'>SI</option>
			</select>
			<input class='hidden' name='id' value='<?php echo $row['id'];?>' type="hidden"  />	
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		<input type="submit" value='actualizar' class="btn btn-success"/>
      </div>
	  </form>
    </div>
  </div>