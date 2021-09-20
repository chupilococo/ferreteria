<?php
include('../../config/setup.php');
$id=$_GET['id'];
$query="delete from rel_stock_clientes where facturas_id ='$id'";
$query2="delete from facturas where id ='$id'";

mysqli_query($cnx,$query);
if(mysqli_error($cnx)){
	header('Location:../../index.php?c=facturacion#error');
}else{
	mysqli_query($cnx,$query2);
	if(mysqli_error($cnx)){
		header('Location:../../index.php?c=facturacion#error');
	}else{
		header('Location:../../index.php?c=facturacion');	
	}
};