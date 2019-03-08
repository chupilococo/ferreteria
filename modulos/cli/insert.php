<pre>
<?php
	include('../../config/setup.php');
	var_dump($_POST);
	$cliente=$_POST;
	
	$sql="
		INSERT INTO clientes (
			nombre,
			cuit,
			direccion,
			telefono,
			email,
			codigo,
			debe
			) VALUES (
			'$cliente[nombre]',
			'$cliente[cuit]',
			'$cliente[direccion]',
			'$cliente[telefono]',
			'$cliente[email]',
			'$cliente[codigo]',
			'$cliente[debe]'
			);
		";
	echo $sql;
	mysqli_query($cnx,$sql);
	if (!mysqli_error($cnx)){
		header('Location:../../index.php?c=clientes');
	}else{
		header('Location:../../index.php?c=clientes#error');
	};
?>
</pre>
<?php