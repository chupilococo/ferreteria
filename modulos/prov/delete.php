<pre>
<?php
include('../../config/setup.php');
$id=$_GET['id'];
$query="delete from proveedores where id ='$id'";
mysqli_query($cnx,$query);
if($error=mysqli_error($cnx)){
	//echo $error;
	header('Location:../../index.php?c=proveedores#error');
}else{
	header('Location:../../index.php?c=proveedores');
};

?>
</pre>