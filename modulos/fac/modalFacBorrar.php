<?php
	include('../../config/setup.php');
	if(isset($_GET['id'])):
	$id=$_GET['id'];
	$consultaFac="SELECT
				nombre
			  FROM
				facturas
			  WHERE
				id = '$id'";
	$queryFac=mysqli_query($cnx,$consultaFac);
	$fac=mysqli_fetch_assoc($queryFac);
?>
 <div class="modal-dialog alert">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Esta a punto de borrar una Factura</h4>
      </div>
      <div class="modal-body">
		<p class='lead'>Esta seguro que desea borrar la Factura <?php echo $fac['nombre']; ?>?</p>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href='modulos/fac/delete.php?id=<?php echo $id; ?>' class="btn btn-success" >Borrar</a>
      </div>
    </div>
  </div>
 <?php
 endif;