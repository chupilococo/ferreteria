<?php 
$seccion =  isset( $_GET['c'] ) ? $_GET['c'] : 'index';
$titulo='Ferreteria_DEV';
$prov =  isset( $_GET['p'] ) ? $_GET['p'] : 'def';
$aPermisos=[
	'ventas',
	'facturacion',
	'clientes',
	'proveedores',
	'gastos',
	'stock',
	'cierre',
	'adminland'
];

$cnx=  mysqli_connect('localhost','root','bernardo','ferreteria_dev');

if (mysqli_connect_errno())
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

session_start();
?>
