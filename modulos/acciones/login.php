<?php
/**
 * Created by PhpStorm.
 * User: danilo
 * Date: 27/12/2016
 * Time: 04:52 PM
 */
include ('../../config/setup.php');

$nombre=$_POST['nombre'];
$password=$_POST['password'];


$query="Select * from usuario WHERE nombre= '$nombre'  and password='$password' limit 1";

$consulta=mysqli_query($cnx,$query);
$_SESSION=mysqli_fetch_assoc($consulta);

//$e=mysqli_error($cnx);
//echo '</pre>';
//var_dump($_SESSION);
//echo '<pre>';
//echo  $e;
//var_dump($_POST);
//echo "location:".$_POST['url-prev'];
header("location:".$_POST['url-prev']);