<?php
	include('../../config/setup.php');
	var_dump($_POST);
	$proveedor=$_POST;
	
	$sql="
		UPDATE proveedores 
		SET
			nombre='$proveedor[nombre]',
			cuit='$proveedor[cuit]',
			direccion='$proveedor[direccion]',
			telefono='$proveedor[telefono]',
			email='$proveedor[email]',
			codigo='$proveedor[codigo]',
			debe='$proveedor[debe]'
		WHERE
			id='$proveedor[id]';
		";
	echo $sql;
	mysqli_query($cnx,$sql);
	if (! $error=mysqli_error($cnx)){
		header('Location:../../index.php?c=proveedores');
	}else{
		echo $error;
//		header('Location:../../index.php?c=proveedores#error');
	};
