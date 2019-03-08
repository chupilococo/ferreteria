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
		<div class="modal-body">
			<label for="nombre">Nombre</label><input class='form-control' value='<?php echo $row['nombre'];?>' disabled type="text" />
			<label for="codigo">Codigo</label><input class='form-control' value='<?php echo $row['codigo'];?>' disabled type="text" />
			<label for="cuit">cuit</label><input class='form-control' value='<?php echo $row['cuit'];?>' type="text" disabled />
			<label for="email">email</label><input class='form-control' value='<?php echo $row['email'];?>' type="text" disabled  />
			<label for="telefono">telefono</label><input class='form-control' value='<?php echo $row['telefono'];?>' disabled name='telefono' type="text" />
			<label for="debe">debe</label><input class='form-control' value='<?php echo $row['debe'];?>' type="text" disabled  />
			<div class='text-right row'>
				<div class="col-md-12">
					<button type="button" onclick='provProd(<?php echo $row['id'];?>)' class="btn btn-success top-marg10">Productos</button>
				</div>
			</div>
			
			
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>