<?php
include('../../config/setup.php');
// var_dump($_POST);
$usuario = $_POST;

$usuario['permisos'] = implode(',', $usuario['permisos']);

$sql = "
		INSERT INTO usuario (
			nombre,
			password,
			tipo,
			permisos
			) VALUES (
			'$usuario[nombre]',
			'$usuario[password]',
			'$usuario[tipo]',
			'$usuario[permisos]'
			);
		";
//echo $sql;
mysqli_query($cnx, $sql);
if (!mysqli_error($cnx)) {
	header('Location:../../index.php?c=adminland');
} else {
	header('Location:../../index.php?c=adminland#error');
};
