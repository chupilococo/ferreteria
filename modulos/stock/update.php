<?php
	include('../../config/setup.php');
	var_dump($_POST);
	$producto=$_POST;
	
	$sql="
		UPDATE stock 
		SET
			nombre='$producto[nombre]',
			descripcion='$producto[descripcion]',
			codigo='$producto[codigo]',
			cantidad='$producto[cantidad]',
			FKproveedores='$producto[proveedor]',
			precio='$producto[precio]'
		WHERE
			id='$producto[id]'
			;";
	echo $sql;
	mysqli_query($cnx,$sql);
	if (!mysqli_error($cnx)){
		if($_POST['ProvIsSet']){
			//echo 'Location:../../index.php?c=stock&ProvSearch='. $producto['proveedor'];
			header('Location:../../index.php?c=stock&ProvSearch='. $producto['proveedor']);
		}else{
			//echo 'Location:../../index.php?c=stock';
			header('Location:../../index.php?c=stock');
		}
	}else{
		header('Location:../../index.php?c=stock#error');
	};