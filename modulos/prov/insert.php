<?php
	include('../../config/setup.php');
	// var_dump($_POST);
	$proveedor=$_POST;
	
	$sql="
		INSERT INTO proveedores (
			nombre,
			cuit,
			direccion,
			telefono,
			email,
			codigo,
			debe
			) VALUES (
			'$proveedor[nombre]',
			'$proveedor[cuit]',
			'$proveedor[direccion]',
			'$proveedor[telefono]',
			'$proveedor[email]',
			'$proveedor[codigo]',
			'$proveedor[debe]'
			);
		";
	//echo $sql;
	mysqli_query($cnx,$sql);
	if (!mysqli_error($cnx)){
		header('Location:../../index.php?c=proveedores');
	}else{
		header('Location:../../index.php?c=proveedores#error');
	};
