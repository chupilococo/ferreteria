 <?php
	include('../../config/setup.php');
	$provQuery="select id,nombre from proveedores";
	$provConsulta=mysqli_query($cnx,$provQuery);
 ?> 
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Nuevo Producto</h4>
      </div>
		<form class='form' action="modulos/stock/insert.php" method='POST'>
		<div class="modal-body">
			<label for="nombre">Nombre</label><input class='form-control' name='nombre' required autocomplete='off' type="text" />
			<label for="codigo">Codigo</label><input class='form-control' name='codigo' required autocomplete='off' type="text" />
			<label for="descripcion">descripcion</label><textarea class='form-control' name="descripcion" id="" cols="30" rows="7"></textarea>
			<label for="proveedor">Proveedor</label>
			<select class='form-control' name="proveedor" id="">
				<?php while($row=mysqli_fetch_assoc($provConsulta)):?>
				<option value="<?php echo $row['id']?>"><?php echo $row['nombre']?></option>
				<?php endwhile;?>
			</select>
			<label for="codigo">Cantidad</label><input class='form-control' name='cantidad' required autocomplete='off' type="number" />
			<label for="codigo">Precio</label><input class='form-control' name='precio' step="0.01" required autocomplete='off' type="number" />
			
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value='Agregar'>
      </div>
	</form>
    </div>
  </div>