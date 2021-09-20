<?php

function averiguaUrl() {
	if (array_key_exists('HTTPS', $_SERVER)) {
		$protocolo = $_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
		return $protocolo.'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}else{
		return 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	}
};


function permisoIsSet($permiso){
	$permisos=explode(',',$_SESSION['permisos']);
	return in_array($permiso,$permisos);
};

function getPermisos(){
	$permisos=explode(',',$_SESSION['permisos']);
	return $permisos;
};

function getSection ($section){
	if (file_exists('modulos/'.$section.'.php')){
		return 'modulos/'.$section.'.php';
	};
	return 'modulos/default.php';
};
