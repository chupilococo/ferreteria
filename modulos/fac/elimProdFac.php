<?php
include('../../config/setup.php');
$id=$_GET['id'];
$facturas_id=$_GET['facturas_id'];
$query="delete from rel_stock_clientes where id =$id and facturas_id ='$facturas_id'";

mysqli_query($cnx,$query);
if(mysqli_error($cnx)){
	header('Location:../../index.php?c=facturacion#error');
}