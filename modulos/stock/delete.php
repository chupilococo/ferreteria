<pre>
<?php
include('../../config/setup.php');
$id=$_GET['id'];
$query="delete from stock where id ='$id'";
mysqli_query($cnx,$query);
if($error=mysqli_error($cnx)){
	//echo $error;
	header('Location:../../index.php?c=stock#error');
}else{
	header('Location:../../index.php?c=stock');
};

?>
</pre>