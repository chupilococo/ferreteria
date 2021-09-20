<?php
	include('../../config/setup.php');
	if(isset($_GET['id'])):
	$id=$_GET['id'];
	$consultaFac="
			  UPDATE
				facturas
			  SET
				estado=1
			  WHERE
				id = '$id'";
	$queryFac=mysqli_query($cnx,$consultaFac);
 endif;
 ?>
  <div class="modal-dialog alert">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <p class='lead'>Se Cerro la Factura</p>
	  </div>
      <div class="modal-footer">
        <button type="button" onclick="location.reload()"class="btn btn-success" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>