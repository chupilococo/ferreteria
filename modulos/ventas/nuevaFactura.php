<pre>
<?php
	include('../../config/setup.php');
	$venta=$_POST;
	$error=false;
	$validFac=mysqli_query($cnx,"Select id from facturas where nombre='".trim($venta['factura'])."' and fecha='".trim($venta['fechaVenta'])."' AND estado='0'");
	
	if(mysqli_num_rows($validFac)==0){
		$inFac="INSERT INTO facturas (tipo_de_factura_id,nombre,fecha)VALUES('$venta[tipoVenta]', '".trim($venta['factura'])."', '$venta[fechaVenta]')";
		mysqli_query($cnx,$inFac);
		$FacID=mysqli_insert_id($cnx);
		echo 'se inserto la factura con el ID:'.$FacID;
	}else{
		//echo 'La factura existe';
		$FacID=mysqli_fetch_assoc($validFac)['id'];
		echo "ID de la factura:$FacID";
	};
	//echo'<hr />';
	foreach ($venta as $indice => $valor){
		if($indice!='tipoVenta'&&$indice!='factura'&&$indice!='fechaVenta'&&$indice!='ClienteId'){
			//echo "{$indice} => {$valor} <hr />";
			$producto=json_decode($valor,true);
			//var_dump($producto);
			$InStockFac="INSERT INTO
							rel_stock_clientes (
							stock_id,
							clientes_id,
							cantidad,
							precioParcial,
							facturas_id,
							precioProveedor
						)
						VALUES
						(
							'$producto[CargaId]',
							'$venta[ClienteId]',
							'$producto[CargaCantidad]',
							'$producto[CargaPrecio]',
							'$FacID',
							'$producto[CargaPrecioProv]'
						);
			";
			mysqli_query($cnx,$InStockFac);
			if(mysqli_error($cnx)){
				echo mysqli_error($cnx);
				$error=true;
			};
			
			$upStock="
				UPDATE stock
				SET cantidad = (cantidad -($producto[CargaCantidad]))
				WHERE
					id = '$producto[CargaId]'
			";
			mysqli_query($cnx,$upStock);
			if(mysqli_error($cnx)){
				echo mysqli_error($cnx);
				$error=true;
			};
		};
	};
	
	
	if($error){
		header('Location:../../index.php?c=ventas#error');
	}else{
		header('Location:../../index.php?c=ventas');
	};
	
	
	
	
?>
</pre>