<?php
	include('../../config/setup.php');
	var_dump($_POST);
	$usuario=$_POST;
	$usuario['permisos'] = implode(',', $usuario['permisos']);
	$sql="
		UPDATE usuario 
		SET
			nombre='$usuario[nombre]',
			password='$usuario[password]',
			tipo='$usuario[tipo]',
			permisos='$usuario[permisos]'
		WHERE
			id='$usuario[id]';";
	echo $sql;
	mysqli_query($cnx,$sql);
	if (!mysqli_error($cnx)){
			header('Location:../../index.php?c=adminland');
	}
    else{
		header('Location:../../index.php?c=adminland#error');
	};