 <?php
	include('../../config/setup.php');	
	$provQuery="
			SELECT
				s.id,
				s.nombre,
				s.descripcion,
				s.codigo,
				s.FKproveedores,
				s.precio,
				s.cantidad,
				p.nombre as provNom
			FROM
				stock s
			JOIN proveedores p ON s.FKproveedores = p.id
			WHERE
				s.FKproveedores = '$_GET[id]'
	";
	$provConsulta=mysqli_query($cnx,$provQuery);
 ?> 
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Productos del Proveedor</h4>
      </div>
		<div class="modal-body">
		<div class="stockTable">
		<table class="table">
			<thead><th>nombre</th><th>codigo</th><th>cantidad</th></thead>
		<?php while($row=mysqli_fetch_assoc($provConsulta)):?>
			<tr class='<?php echo ($row['cantidad']<2)?'low':''?>' ><td><?php echo($row['nombre']);?></td><td><?php echo($row['codigo']);?><td><?php echo($row['cantidad']);?></td></tr>
		<?php endwhile;?>
		</table>
		</div>
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>