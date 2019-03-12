<?php 
$seccion =  isset( $_GET['c'] ) ? $_GET['c'] : 'index';
$prov =  isset( $_GET['p'] ) ? $_GET['p'] : 'def';
$cnx=  mysqli_connect('52.26.64.212','wadmin','bernardo05','ferreteria');
if (mysqli_connect_errno())
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
session_start();

//echo "<pre>";
//var_dump($_GET);
//var_dump($seccion);
//echo"</pre>";
function averiguaUrl() {
	if (array_key_exists('HTTPS', $_SERVER)) {
		$protocolo = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
		return $protocolo.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}else{
		return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
};