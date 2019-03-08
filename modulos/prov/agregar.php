<div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"> Nuevo Proveedor</h4>
      </div>
		<form class='form' action="modulos/prov/insert.php" autocomplete="off" method='POST'>
			<div class="modal-body">
				<label for="nombre">Nombre</label>
				<input class='form-control'  type="text" name='nombre' placeholder ='Nombre del proveedor' />
				<label for="codigo">Codigo</label><input class='form-control' name='codigo' autocomplete=false type="text" placeholder ='Codigo del proveedor' />
				<label for="codigo">Direccion</label><input class='form-control' name='direccion' autocomplete=false type="text" placeholder ='Direccion del proveedor' />
				<label for="cuit">cuit</label><input class='form-control' type="number" name='cuit' autocomplete=false placeholder ='Cuit Del proveedor' />
				<label for="email">email</label><input class='form-control' type="email" name='email' autocomplete=false placeholder ='Email del proveedor' />
				<label for="telefono">telefono</label><input class='form-control' name='telefono' type="phone" autocomplete=false placeholder ='Telefono Del proveedor'/>
				<label for="debe">debe</label>
				<select class='form-control' name="debe" id="debe">
					<option value="0">NO</option>
					<option value="1">SI</option>
				</select>	
			</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			<input type="submit" class="btn btn-primary" value='Agregar'>
		</div>
		</form>
    </div>
  </div>