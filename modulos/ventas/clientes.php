<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 02/01/2017
 * Time: 11:20 AM
 */
include('../../config/setup.php');
if(isset($_GET['client'])){
    $client=$_GET['client'];
}
$query="Select * from clientes WHERE codigo LIKE '%$client%' or nombre LIKE '%$client%'";
$consulta=mysqli_query($cnx,$query);


$hint='';
if(mysqli_num_rows($consulta)==0){
	$hint.='<p></p>';
}else{
	$hint='<table class=\'table\'>';
	$hint.='<tr><th>nombre</th><th>codigo</th></tr>';
	while ($row=mysqli_fetch_assoc($consulta)):
		$hint.='<tr onclick="ClienteClick(\''.$row['nombre'].'\',\''.$row['id'].'\')"><td>'.$row['nombre'].'</td><td>'.$row['codigo'].'</td></tr>';
	endwhile;
	$hint.='</table>';
}
echo $hint;