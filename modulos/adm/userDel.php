<?php
	include('../../config/setup.php');
	var_dump($_POST);
	$usuario=$_POST;
	
	$sql="
		Delete FROM usuario
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