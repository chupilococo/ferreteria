<?php
	include('../../config/setup.php');
	var_dump($_POST);
	$producto=$_POST;
	
	$sql="
		INSERT INTO stock (
			nombre,
			descripcion,
			codigo,
			cantidad,
			FKproveedores,
			precio
		)
		VALUES
			(
				'$producto[nombre]',
				'$producto[descripcion]',
				'$producto[codigo]',
				'$producto[cantidad]',
				'$producto[proveedor]',
				'$producto[precio]'
			);";
	echo $sql;
	mysqli_query($cnx,$sql);
	if (!mysqli_error($cnx)){
		header('Location:../../index.php?c=stock');
	}else{
		header('Location:../../index.php?c=stock#error');
	};
