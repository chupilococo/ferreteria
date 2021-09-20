<pre>
<?php
include('../../config/setup.php');
$id = $_GET['id'];
$query = "update stock set active=0 where id ='$id'";
mysqli_query($cnx, $query);
if ($error = mysqli_error($cnx)) {
	//echo $error;
	header('Location:../../index.php?c=stock#error');
} else {
	header('Location:../../index.php?c=stock');
};

?>
</pre>