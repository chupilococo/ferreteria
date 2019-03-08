<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 07:15 PM
 */
include('../../config/setup.php');
if(isset($_GET['client'])){
    $client=$_GET['client'];
}
$query="Select * from stock WHERE codigo LIKE '%$client%' or nombre LIKE '%$client%'";
$consulta=mysqli_query($cnx,$query);


$hint='';
if(mysqli_num_rows($consulta)==0){
	$hint.='<p></p>';
}else{
	$hint='<table class=\'table\'>';
	$hint.='<tr><th>nombre</th><th>codigo</th></tr>';
	while ($row=mysqli_fetch_assoc($consulta)):
		/** @var TYPE_NAME $row */
		$hint.='<tr onclick="ProdClick(\''.$row['nombre'].'\',\''.$row['codigo'].'\',\''.$row['id'].'\')"><td>'.$row['nombre'].'</td><td>'.$row['codigo'].'</td></tr>';
	endwhile;
	$hint.='</table>';
}
echo $hint;