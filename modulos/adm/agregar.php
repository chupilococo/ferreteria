<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"> Nuevo Usuario</h4>
		</div>
		<form class='form' action="modulos/adm/insert.php" autocomplete="off" method='POST'>
			<div class="modal-body">
				<label for="nombre">Nombre</label>
				<input class='form-control' type="text" name='nombre' placeholder='Nombre del usuario' />
				<label for="debe">debe</label>
				<label for="password">password</label>
				<input class='form-control' type="password" name='password' placeholder='contraseña' />
				<label for="tipo">Es administrador?</label>
				<select class='form-control' name="tipo" id="tipo" placeholder='es administrador?'>
					<option value="0">NO</option>
					<option value="1">SI</option>
				</select>

				<div class="container">
					<h3>permisos</h3>
					<label class="checkbox-inline" for="permiso_ventas">
						<input type="checkbox" name="permisos[]" value="ventas" id="permiso_ventas">
						Ventas
					</label>
					<label class="checkbox-inline" for="permiso_facturacion">
						<input type="checkbox" name="permisos[]" value="facturacion" id="permiso_facturacion">
						Facturacion
					</label>
					<label class="checkbox-inline" for="permiso_clientes">
						<input type="checkbox" name="permisos[]" value="clientes" id="permiso_clientes">
						Clientes
					</label>
					<label class="checkbox-inline" for="permiso_proveedores">
						<input type="checkbox" name="permisos[]" value="proveedores" id="permiso_proveedores">
						Proveedores
					</label>
					<label class="checkbox-inline" for="permiso_gastos">
						<input type="checkbox" name="permisos[]" value="gastos" id="permiso_gastos">
						Gastos
					</label>
					<label class="checkbox-inline" for="permiso_stock">
						<input type="checkbox" name="permisos[]" value="stock" id="permiso_stock">
						Stock
					</label>
					<label class="checkbox-inline" for="permiso_cierre">
						<input type="checkbox" name="permisos[]" value="cierre" id="permiso_cierre">
						Cierre
					</label>
					<label class="checkbox-inline" for="permiso_adminland">
						<input type="checkbox" name="permisos[]" value="adminland" id="permiso_adminland">
						Adminland
					</label>
				</div>


			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<input type="submit" class="btn btn-primary" value='Agregar'>
			</div>
		</form>
	</div>
</div>